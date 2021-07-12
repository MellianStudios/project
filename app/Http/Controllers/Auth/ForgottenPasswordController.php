<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgottenPasswordRequest;
use App\Models\User;
use App\Support\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ForgottenPasswordController extends Controller
{
    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Auth/ForgottenPassword');
    }

    /**
     * @param ForgottenPasswordRequest $request
     * @param PasswordReset $passwordReset
     *
     * @return RedirectResponse
     */
    public function store(ForgottenPasswordRequest $request, PasswordReset $passwordReset): RedirectResponse
    {
        $user = User::where('active', 1)
            ->where('email', $request->email)
            ->firstOrFail();

        $passwordReset->create($user);

        return Redirect::route('announcement')->with(['success' => 'Email sent']);
    }
}
