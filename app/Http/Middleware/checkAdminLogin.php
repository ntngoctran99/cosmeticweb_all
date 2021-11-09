<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class checkAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if ($user->type == 0) {
                return redirect('/');
            }else{
                return $next($request);
            }
        } else {
            return \Redirect::route('login')
                ->with([
                    'flashLevel' => 'warning',
                    'flashMes'   => 'You must log in first.'
                ]);
        }
    }
}
