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

        $total_teacher = $teachers->count();

        return view('teacher.index', compact('teachers', 'total_teacher'));
    }

    public function store(TeacherRequest $request)
    {
        $file['name'] = "";
        if ($request->hasFile('Image')) {
            $file = upload_image('Image');
        }

        Teacher::create([
            'Name' => $request->Name,
            'Sex' => $request->Sex,
            'Image' => $file['name'],
            'Phone' => $request->Phone,
            'Mail' => $request->Mail,
            'Address' => $request->Address,
        ]);

        return redirect()->back()->with('success', 'Successfully add');
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);

        return view('teacher.edit', compact('teacher'));
    }

    public function update(TeacherRequest $request, $id)
    {
        $teacher = Teacher::find($id);

        $file['name'] = null;
        if ($request->hasFile('Image')) {
            $file = upload_image('Image');
        }

        $teacher->update([
            'Name' => $request->Name,
            'Sex' => $request->Sex,
            'Image' => $file['name'],
            'Phone' => $request->Phone,
            'Mail' => $request->Mail,
            'Address' => $request->Address,
        ]);

        return redirect()->Route('get.teacher')->with('success', 'Update teacher successfully');
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        if ($teacher->lessons->count() > 0) {
            return redirect()->back()->with('warning', 'Teacher still has lesson, you cannot delete!!!');
        } else {
            $teacher->delete();
            return redirect()->Route('get.teacher')->with('success', 'Delete teacher successfully');
        }
    }
}
