<?php

namespace App\Http\Middleware;

use App\Course;
use Closure;

class CourseMiddleware
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
        $course = Course::find($request->id);
        if(empty($course)){
            return redirect()->back()->with('error','No data');
        }else{
        return $next($request);
        }
    }
}
