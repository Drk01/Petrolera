<?php

namespace App\Http\Middleware;

use Closure;
use app\User;
use app\Role;

class CheckIfAuthUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userRole = User::where('id',auth()->user()->id)->first()->roles()->get();

        if($userRole->contains(Role::where('name','Administrador')->first())){
            return $next($request);
        }
        return redirect()->back();
    }
}
