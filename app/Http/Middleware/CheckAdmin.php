<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //自訂middleware 會員的權限必須為1才能進入頁面
    public function handle($request, Closure $next)
    {
        if (Auth::user()->permission != 1 ) {
            return redirect('/');
        }
        return $next($request);
    }
}
