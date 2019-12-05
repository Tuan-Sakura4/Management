<?php

namespace App\Http\Middleware;

use App\Teacher;
use Closure;

class TeacherMiddleware
{
    public function handle($request, Closure $next)
    {
        $teacher = Teacher::find($request->id);
        if (empty($teacher)) {
            return redirect()->back()->with('error', 'No data');
        }
        else {
            return $next($request);
        }
    }
}
