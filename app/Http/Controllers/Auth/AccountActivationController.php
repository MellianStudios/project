<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Support\AccountActivation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AccountActivationController extends Controller
{
    /**
     * @param string $token
     * @param AccountActivation $accountActivation
     *
     * @return RedirectResponse
     */
    public function create(string $token, AccountActivation $accountActivation): RedirectResponse
    {
        $user = User::where('active', 0)
            ->with([
                'activations' => function ($query) use ($token) {
                    $query->where('token', $token)->firstOrFail();
                }])
            ->firstOrFail();

        if ($accountActivation->complete($user)) {
            return Redirect::route('announcement')->with(['success' => 'Account activated']);
        }

        return Redirect::route('auth.resend_account_activation')->with(['error' => 'Error occurred']);
    }
}
