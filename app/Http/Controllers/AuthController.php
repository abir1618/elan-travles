<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function loginForm(){ return view('auth.login'); }
    public function login(Request $request){
        $credentials=$request->validate(['email'=>'required|email','password'=>'required|string']);
        $credentials['is_admin']=true;
        if(Auth::attempt($credentials,true)){
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }
        return back()->withErrors(['email'=>'The credentials could not be verified.'])->withInput();
    }
    public function logout(Request $request){ Auth::logout(); $request->session()->invalidate(); $request->session()->regenerateToken(); return redirect('/admin/login'); }
}