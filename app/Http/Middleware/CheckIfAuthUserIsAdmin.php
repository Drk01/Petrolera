<?php

namespace App\Http\Middleware;

use Closure;
use DB;

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
        $UserID = Auth()->user()->id;
        $roles_id = DB::table('users_roles')->select(['roles_id'])
        ->where('users_id','=',$UserID)
        ->where('roles_id','=','1')->first();

        if($roles_id){
            return $next($request);
        }
        return redirect()->back();
    }
}
