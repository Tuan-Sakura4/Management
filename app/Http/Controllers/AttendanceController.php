<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Http\Requests\AttendanceRequest;
use App\Lesson;
use App\Student;
use App\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendance = Attendance::latest()->get();

        $attendances = $attendance->groupBy('Id_Lesson');

        $lessons = Lesson::all();

        $students = Student::all();

        $total_attendance = $attendances->count();

        return view('attendance.index', compact('attendances', 'total_attendance', 'lessons', 'students'));
    }

    public function store(AttendanceRequest $request)
    {
        $student = Attendance::where('Id_Student', $request->Id_Student)->first();

        $lesson = Attendance::where('Id_Lesson', $request->Id_Lesson)->first();

        if ($request->Id_Student == $student && $request->Id_Lesson == $lesson || !empty($student) && !empty($lesson)) {
            return redirect()->back()->with('warning', 'Student had in lesson');
        } else {

            $listAttendance = [];
            foreach ($request->Id_Student as $item) {
                $listAttendance[] = [
                    'Id_Lesson' => $request->Id_Lesson,
                    'Id_Student' => $item,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
            Attendance::insert($listAttendance);

            return redirect()->back()->with('success', 'Successfully add');
        }
    }

    public function destroy($id)
    {
        Attendance::where('Id_Lesson', $id)->delete();

        return redirect()->Route('get.attendance')->with('success', 'Delete attendance successfully');
    }

}
