<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Lang;

class Locale
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
        if (\Session::has('locale')) {
            \App::setLocale(\Session::get('locale'));
           /* you know default Language in locale is English*/
        }/*so for this middleware will change Language by Session*/
        return $next($request);
    }
}
