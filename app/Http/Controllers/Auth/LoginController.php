<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\userController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        if(auth()->check())
        {
            return redirect('home');
        }
        return view('auth.login');
    }

    public function check_user()
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        $email = request('email');
        $password = request('password');
        
        $auth = Auth::attempt(['email' => $email, 'password' => $password]);
        // echo $auth;
        if ($auth)
        {
            request()->session()->put('user_id', Auth::user()->id);
        }
        return $auth;
    }

    public function register()
    {
        // echo "yes";
        if(auth()->check())
        {
            return redirect('home');
        }
        return view('register');
    }
}
