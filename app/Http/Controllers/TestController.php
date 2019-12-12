<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\TestExampleRequest;
use App\Student;
use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $tests = Test::paginate(10);
        $courses = Course::all();
        $students = Student::all();
        return view('test.index', compact('tests', 'students', 'courses'));
    }
    public function store(TestExampleRequest $request){
        $test = new Test();
        $test->Point=$request->input('Point');
        $test->Date=$request->input('Date');
        $test->Id_Student=$request->input('Id_Student');
        $test->Id_Course=$request->input('Id_Course');
        $test->save();
//
//        Test::create([
//            'Point' => $request->Point,
//            'Date'=>$request->Date,
//            'Id_Student' => $request->Id_Student,
//            'Id_Course' => $request->Id_Course,
//        ]);

        return redirect()->back()->with('success', 'Successfully add');
    }
    public function edit($id){
        $test = Test::findOrFail($id);
        $courses = Course::all();
        $students = Student::all();
        return view('test.edit', compact('test', 'students', 'courses'));
    }
    public function update(TestExampleRequest $request, $id)
    {
        $test = Test::findOrFail($id);
        $test->Point = $request->input('Point');
        $test->Date = $request->input('Date');
        $test->Id_Student = $request->input('Id_Student');
        $test->Id_Course = $request->input('Id_Course');
        $test->save();
        return redirect()->route('test.index')->with('success', 'Successfully update ');
    }
    public function destroy($id){
        Test::findOrFail($id)->delete();
        return redirect()->route('test.index');
    }

}
