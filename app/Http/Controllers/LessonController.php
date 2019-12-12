<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\LessonRequest;
use App\Http\Requests\TeacherRequest;
use App\Lesson;
use App\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::oldest('Date')->get();

        $teachers = Teacher::all();

        $courses = Course::all();

        $total_lesson = $lessons->count();

        return view('lesson.index', compact('lessons', 'total_lesson', 'teachers', 'courses'));
    }

    public function store(LessonRequest $request)
    {
        if ($request->Date < date_format(Carbon::now(), 'Y-m-d')) {
            return redirect()->back()->with('warning', 'You cannot create lessons after the current time, please create again!!!');
        } else {
            Lesson::create([
                'Date' => $request->Date,
                'Id_Teacher' => $request->Id_Teacher,
                'Id_Course' => $request->Id_Course,
            ]);
        }

        return redirect()->back()->with('success', 'Successfully add');
    }

    public function edit($id)
    {
        $lesson = Lesson::find($id);

        $teachers = Teacher::all();

        $courses = Course::all();

        return view('lesson.edit', compact('lesson', 'teachers', 'courses'));
    }


    public function update(LessonRequest $request, $id)
    {
        $lesson = Lesson::find($id);

        $lesson->update([
            'Date' => $request->Date,
            'Id_Teacher' => $request->Id_Teacher,
            'Id_Course' => $request->Id_Course,
        ]);

        return redirect()->Route('get.lesson')->with('success', 'Update lesson successfully');
    }

    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        if ($lesson->Date > date_format(Carbon::now(), 'Y-m-d')) {
            return redirect()->back()->with('warning', 'Lesson is still in effect, you cannot delete!!!');
        } else {
            $lesson->delete();
            return redirect()->Route('get.lesson')->with('success', 'Delete lesson successfully');
        }
    }
}
