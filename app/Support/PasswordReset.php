<?php

namespace App\Support;

use App\Jobs\SendPasswordResetLink;
use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class PasswordReset
{
    /**
     * @param User $user
     *
     * @return void
     */
    public function create(User $user): void
    {
        $token = $user->passwordResets()->create([
            'user_id' => $user->id,
            'type' => Token::TYPE_PASSWORD_RESET,
            'token' => Str::uuid(),
            'expiration' => Carbon::now()->addSeconds(Config::get('tokens.account.password_reset.expiration')),
        ]);

        $user->setRelation('passwordResets', $token);

        SendPasswordResetLink::dispatch($user);
    }
}
