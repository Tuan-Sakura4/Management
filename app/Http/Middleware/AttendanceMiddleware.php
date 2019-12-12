<?php

namespace App\Http\Middleware;

use App\Attendance;
use App\Lesson;
use Carbon\Carbon;
use Closure;

class AttendanceMiddleware
{
    public function handle($request, Closure $next)
    {
        $attendance = Attendance::where('Id_Lesson', $request->Id_Lesson);
        if (empty($attendance)) {
            return redirect()->back()->with('error', 'No data');
        } else {
            return $next($request);
        }
    }
}
