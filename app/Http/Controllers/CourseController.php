<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\CourseExampleRequest;
use App\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::paginate(10);
        return view('course.index', compact('courses'));
    }
    public function store(CourseExampleRequest $request){
        Course::create([
            'Name' => $request->Name,
            'Content' => $request->Content,
            'Description' => $request->Description,
            'Total' => $request->Total,
        ]);

        return redirect()->back()->with('success', 'Successfully add');
    }
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('course.edit', compact('course'));
    }

    public function update(CourseExampleRequest $request,$id)
    {
        $course = Course::findOrFail($id);
        $course->Name     = $request->input('Name');
        $course->Content     = $request->input('Content');
        $course->Description    = $request->input('Description');
        $course->Total    = $request->input('Total');
        $course->save();
        return redirect()->route('course.index')->with('success', 'Successfully update');

    }
    public function destroy($id)
    {
        Course::findOrFail($id)->delete();
        return redirect()->route('course.index');
    }
}
