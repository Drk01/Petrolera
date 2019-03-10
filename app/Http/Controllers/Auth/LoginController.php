<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;
class LoginController extends Controller
{
    public function login(){

       $credentials = $this->validate(request(),[
            'user' => 'required|string',
            'password' => 'required|string'
        ]);

        //Comprobar si los datos del usuario coinciden en la bd y si es administrador
        $userData = DB::table('users')->select('id')->where('user','=',request('user'))->first();

        if(empty($userData)){
            return back()->withErrors(['email' => trans('auth.failed')])->withInput(request(['user']));
        }

        $userID = $userData->id;

        $isAdmin = DB::table('users_roles')->select('id')->where('users_id','=',$userID)->where('roles_id','=','1')->first();

        if(!empty($isAdmin)){
            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboard');
            }
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
