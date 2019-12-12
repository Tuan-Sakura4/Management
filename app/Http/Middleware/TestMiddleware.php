<?php

namespace App\Http\Middleware;

use App\Test;
use Closure;

class TestMiddleware
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
        $test = Test::find($request->id);
        if(empty($test)){
            return redirect()->back()->with('error', 'No data');
        }
        else{
            return $next($request);
        }
    }
}
