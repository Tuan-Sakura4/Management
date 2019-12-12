<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher.index', compact('teachers'));
    }

    public function store(Request $request)
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
        return view('admin::show');
    }

    public function edit($id)
    {
        return view('admin::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
