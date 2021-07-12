<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResendAccountActivationRequest;
use App\Models\User;
use App\Support\AccountActivation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ResendAccountActivationController extends Controller
{
    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Auth/ResendAccountActivation');
    }

    /**
     * @param ResendAccountActivationRequest $request
     * @param AccountActivation $accountActivation
     *
     * @return RedirectResponse
     */
    public function store(ResendAccountActivationRequest $request, AccountActivation $accountActivation): RedirectResponse
    {
        $user = User::where('active', 0)
            ->where('email', $request->email)
            ->firstOrFail();

        $accountActivation->resend($user);

        return Redirect::route('announcement')->with(['success' => 'Email sent']);
    }
}
