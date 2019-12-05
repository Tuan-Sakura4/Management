<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher.index', compact('teachers'));
    }

    public function store(TeacherRequest $request)
    {
        Teacher::create([
            'Name' => $request->Name,
            'Sex' => $request->Sex,
            'Phone' => $request->Phone,
            'Mail' => $request->Mail,
            'Address' => $request->Address,
        ]);

        return redirect()->back()->with('success', 'Successfully add');
    }

    public function show($id)
    {
        $teacher = Teacher::find($id);
        return view('admin::show', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return view('teacher.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->update([
            'Name' => $request->Name,
            'Sex' => $request->Sex,
            'Phone' => $request->Phone,
            'Mail' => $request->Mail,
            'Address' => $request->Address,
        ]);

        return redirect()->Route('get.teacher')->with('success', 'Update teacher successfully');
    }

    public function destroy($id)
    {
        Teacher::find($id)->delete();
        
        return redirect()->Route('get.teacher')->with('success', 'Delete teacher successfully');
    }
}
