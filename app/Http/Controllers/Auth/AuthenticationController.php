<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        
    }

    /**
     * Login view
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function login()
    {
        if(Auth::check()){
            return Redirect::intended(route('dashboard.index'));
        }
        return view('login');
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(AuthenticationRequest $request): \Illuminate\Http\RedirectResponse
    {
        //Set variable
        $userName = $request->input('userName');
        $password = $request->input('password');
        $rememberMe = (bool) $request->input('remember');

        //Check authentication and return message
        if (Auth::attempt(['UserName' => $userName, 'password' => $password, 'IsActive' => 1], $rememberMe)) {
            $request->session()->flash('message-success', 'Đăng nhập thành công!!!');
            return Redirect::intended(route('dashboard.index'));
        }
        $request->session()->flash('message-error','Email hoặc mật khẩu không chính xác. Vui lòng kiểm tra và truy cập lại!!!');
        return Redirect::intended(route('auth.login'));
    }

    /**
     * Logout
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::route('auth.login');
    }

}
