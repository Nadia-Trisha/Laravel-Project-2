<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // echo "User Authentication is working";
        // print_r($request);

        $user = Auth::user();
        echo $user->role;

        if ($user->role == 1) {
            return redirect('admin');
            // return $next($request);

        } else if ($user->role == 2) {
            return redirect('teacher');
            // return $next($request);
            
        } else if ($user->role == 3) {
            return redirect('student');
        }

        return $next($request);
    }
}
