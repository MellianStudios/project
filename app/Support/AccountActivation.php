<?php

namespace App\Support;

use App\Events\UserRegistered;
use App\Jobs\ResendAccountActivation;
use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class AccountActivation
{
    /**
     * @param User $user
     *
     * @return void
     */
    public function create(User $user): void
    {
        UserRegistered::dispatch($this->createRelation($user));
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function check(User $user): bool
    {
        $now = Carbon::now();

        if ($now->lessThanOrEqualTo($user->activations()->latest()->first()->expiration)) {
            return true;
        }

        return false;
    }

    /**
     * @param User $user
     *
     * @return void
     */
    public function resend(User $user): void
    {
        if (!$this->check($user)) {
            $user = $this->createRelation($user);
        }

        ResendAccountActivation::dispatch($user);
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function complete(User $user): bool
    {
        if ($this->check($user)) {
            $user->update(['active' => 1]);

            return true;
        }

        return false;
    }

    /**
     * @param User $user
     *
     * @return User
     */
    private function createRelation(User $user): User
    {
        $activation = $user->activations()->create([
            'user_id' => $user->id,
            'type' => Token::TYPE_ACTIVATION,
            'token' => Str::uuid(),
            'expiration' => Carbon::now()->addSeconds(Config::get('tokens.account.activation.expiration')),
        ]);

        $user->setRelation('activations', $activation);

        return $user;
    }
}
