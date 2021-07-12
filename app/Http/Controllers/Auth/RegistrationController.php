<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use App\Support\AccountActivation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class RegistrationController extends Controller
{
    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Registration');
    }

    /**
     * @param RegistrationRequest $request
     * @param AccountActivation $accountActivation
     *
     * @return RedirectResponse
     */
    public function store(RegistrationRequest $request, AccountActivation $accountActivation): RedirectResponse
    {
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $accountActivation->create($user);

        return Redirect::route('announcement')->with(['success' => 'Account created']);
    }
}
