<?php

namespace ChromaMS\Http\Controllers\Auth;

use ChromaMS\User;
use ChromaMS\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{


    use AuthenticatesUsers;

    // *
    //  * Where to redirect users after login / registration.
    //  *
    //  * @var string
     
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectAfterLogout = route('auth.login');
        $this->redirectTo = route('backend.dashboard');
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }




}
