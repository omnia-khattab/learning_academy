<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class isApiAdmin
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
        /*if(isset($request->access_token) && $request->access_token!=null)
        {
            $user=User::where('access_token',$request->access_token)->where('is_admin',1)->first();
            if($user!=null)
                return $next($request);
        }
        else{
            return response()->json(['error'=>'not valid request']);
        }*/
        return $next($request);
    }
}
