<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // public function index()
    // {
    //     return view('login.index', [
    //         'title' => 'Login',
    //         'active' => 'login'
    //     ]);
    // }
    // public function authenticate(Request $request)
    // {
    //     $request->validate([
    //         'username' => 'required',
    //         'password' => 'required'
    //     ]);
        
    //     $kredensial=$request->only('username', 'password');

    //     if(Auth::attempt($kredensial)){
    //         $request->session()->regenerate();
    //         return redirect()->intended('/');
    //     }
    //     return back()->with('loginError', 'Login failed!');
    // }
    // public function logout()
    // {
    //     Auth::logout();

    //     request()->session()->invalidate();
    
    //     request()->session()->regenerateToken();
    
    //     return redirect('/');
    // }
    public function index()
    {
        if (Auth::user()){
            // if($user->level == '1'){
            //     return redirect()->intended('/');
            // }elseif($user->level == '2'){
            //     return redirect()->intended('guru');
            // }
            return redirect()->intended('home');
        }
        return view('login.index',[
            'title' => 'login',
            'active' => 'login'
        ]); 
    }
    public function proses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],
        [
            'username.required' => 'Username tidak boleh kosong',
        ]
    );

    $kredensial=$request->only('username', 'password');

    if(Auth::attempt($kredensial)){
        $request->session()->regenerate();    
        $user = Auth::user();
        // if($user->level == '1'){
        //         return redirect()->intended('beranda');
        //     }elseif($user->level == '2'){
        //         return redirect()->intended('guru');
        //     }
        if($user){
            return redirect()->intended('/home');
        }

        return redirect()->intended('/');
    }
        return back()->withErrors([
            'username' => 'Maaf username atau password anda salah',
        ])->onlyInput('username');
    }
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/login');
    }
}
