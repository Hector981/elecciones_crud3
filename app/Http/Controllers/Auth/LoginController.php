<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    // Start Class
    public function index()
    {
        return view('auth/login');
    }
    /**
    * Redirecciona al usuario a la página de Facebook para autenticarse
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /**
    * Obtiene la información de Facebook
    *
    * @return \Illuminate\Http\RedirectResponse
    */
    public function handleProviderFacebookCallback()
    {
        $auth_user = Socialite::driver('facebook')->user(); // Fetch authenticated user
        dd($auth_user);
    }
    // End Class


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/casilla';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
