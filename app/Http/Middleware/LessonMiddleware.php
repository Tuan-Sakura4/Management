<?php

namespace App\Http\Middleware;

use App\Lesson;
use Carbon\Carbon;
use Closure;

class LessonMiddleware
{
    public function handle($request, Closure $next)
    {
        $lesson = Lesson::find($request->id);
        if (empty($lesson)) {
            return redirect()->back()->with('error', 'No data');
        } else {
            return $next($request);
        }
    }
}
