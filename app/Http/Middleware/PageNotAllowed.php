<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PageNotAllowed
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

        return response('<h1>Page not allowed!</h1>');
    }
}
