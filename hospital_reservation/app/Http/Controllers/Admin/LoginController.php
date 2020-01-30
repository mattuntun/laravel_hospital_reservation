<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    //初期状態
    //protected $redirectTo = '/admin/home';


    protected $redirectTo = '/admin/index'; // ログイン後のリダイレクト先



    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout'); //変更
    }


    
 
    //ログイン画面
    public function showLoginForm()
    {
        return view('admin.login');  //管理者ﾛｸﾞｲﾝﾍﾟｰｼﾞのﾃﾝﾌﾟﾚｰﾄ
    }
 
    protected function guard()
    {
        return Auth::guard('admin');  //管理者認証のguardを指定
    }
    
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();  
        $request->session()->flush();
        $request->session()->regenerate();
        //$request->session()->invalidate();

        return redirect('/admin/login'); //ログアウト後のリダイレクト先
     }
}
