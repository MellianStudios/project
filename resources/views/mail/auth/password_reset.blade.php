{{ route('auth.password_reset', $user->passwordResets()->latest()->first()->token) }}
