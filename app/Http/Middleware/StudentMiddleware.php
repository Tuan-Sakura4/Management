<?php

namespace App\Http\Middleware;

use App\Student;
use Closure;

class StudentMiddleware
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
        $student = Student::find($request->id);
        if(empty($sudent)){
            return redirect()->back()->with('error','No data');
        }else{
            return $next($request);
        }
    }
}
