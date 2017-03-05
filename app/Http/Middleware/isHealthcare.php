<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Auth;
use App\Healthcare;

class isHealthcare
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
        if ($user->inRole('healthcare')){
          if (Healthcare::where('user_id',Auth::user()->id)->first()["is_verified"] == 0) {
            return redirect('/healthcareOtp');
          }
          if (Healthcare::where('user_id',Auth::user()->id)->first()["payment_done"] == 0) {
            return redirect('/paymentPending');
          }
            return $next($request);
        }
        }
    return redirect('/noPermission');
    }
}
