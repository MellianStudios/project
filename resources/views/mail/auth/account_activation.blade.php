{{ route('auth.account_activation', $user->activations()->latest()->first()->token) }}
