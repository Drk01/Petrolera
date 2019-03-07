<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(){

       $credentials = $this->validate(request(),[
            'user' => 'required|string',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email'=> trans('auth.failed')])->withInput(request(['user']));
    }

    public function showLoginForm()
    {
        return view('index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/");
    }
}
