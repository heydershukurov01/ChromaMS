<?php

namespace ChromaMS\Http\Controllers\Auth;

use ChromaMS\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{


    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('backend.dashboard');
        $this->middleware('guest');
    }

        protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => $password,
        ])->save();

        auth()->guard($this->getGuard())->login($user);
    }
}
