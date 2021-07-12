<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PasswordResetRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class PasswordResetController extends Controller
{
    /**
     * @param string $token
     *
     * @return Response
     */
    public function create(string $token): Response
    {
        return Inertia::render('Auth/PasswordReset', [
            'token' => $token,
        ]);
    }

    /**
     * @param string $token
     * @param PasswordResetRequest $request
     *
     * @return RedirectResponse
     */
    public function store(string $token, PasswordResetRequest $request): RedirectResponse
    {
        $user = User::with([
            'passwordResets' => function ($query) use ($token) {
                $query->where('token', $token)->firstOrFail();
            }])->firstOrFail();

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return Redirect::route('auth.login')->with(['success' => 'Password changed']);
    }
}
