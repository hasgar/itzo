<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Auth;
use App\Users;
class isUser
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


       if (Auth::check()) {
            $user = Sentinel::findById(Auth::user()->id);
        if ($user->inRole('user')){
          if (Users::where('user_id',Auth::user()->id)->first()["is_verified"] == 0) {
            return redirect('/userOtp');
          }
            return $next($request);
        }
        }
    return redirect('/noPermission');
    }
}
