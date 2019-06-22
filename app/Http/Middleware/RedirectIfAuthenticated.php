<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $UserID = auth()->user()->id;
            $roles_id = DB::table('role_user')->select(['role_id'])
                ->where('user_id','=',$UserID)
                ->where('role_id','!=','3')->first();

            if( $roles_id){
                return redirect('/dashboard');
            }
            session()->flush();
            return redirect()->back()->with(['flash' => trans('auth.void')]);
        }
        return $next($request);
    }
}
