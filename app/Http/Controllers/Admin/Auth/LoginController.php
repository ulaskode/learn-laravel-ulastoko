<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::DASHBOARD_ADMIN;

    /**
     * Showing admin login form.
     *
     * @var string
     */

    public function showLoginForm(){
        return view('admin.auth.login');
    }

    /**
     * Submit login form.
     *
     * 
     */
    public function login(Request $request){
        // Validasi Login
        $this->validate($request, [
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|string'
        ]);

        // Mengambil data dari request
        $auth = $request->only('email', 'password');

        // Check autentikasi
        if(auth()->guard('admin')->attempt($auth)){
            return redirect()->intended(route('admin.dashboard'));
        }else{
            return redirect()->back()->with('error','Email atau password anda salah');
        }


    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Logout.
     *
     */

    public function logout(){
        auth()->guard('admin')->logout();
        return redirect(route('admin.login'));
    }
    
}
