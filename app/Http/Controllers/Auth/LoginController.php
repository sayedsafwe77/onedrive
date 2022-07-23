<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function showLoginForm()
    {
        return view('auth.loginForm');
    }
    public function login(Request $request)
    {
        $guards = [
            ['guard' => 'admin','redirect' => '/signin'],
            ['guard' => 'web','redirect' => '/signin'],
        ];
        foreach($guards as $guard){
            if($this->guards($guard['guard'],$request->all())) {
                return redirect()->intended($guard['redirect']);
            }
        }
        return back()->withInput($request->only('email'));
    }
    public function guards($guard,$data)
    {
        return Auth::guard($guard)->attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ]);
    }
}
