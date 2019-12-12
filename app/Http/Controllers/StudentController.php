<?php

namespace App\Http\Controllers;

use App\Bu;
use App\Http\Requests\StudentExampleRequest;
use App\Language;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students= Student::paginate(10);
        $bus=Bu::all();
        $languages=Language::all();
        return view('student.index', compact('students','bus','languages'));

    }
    public function store(StudentExampleRequest $request){
        $file['name'] = "";
        if ($request->hasFile('Image')) {
            $file = upload_image('Image');
        }
        Student::create([
            'Name'=>$request->Name,
            'Sex'=>$request->Sex,
            'Mail'=>$request->Mail,
            'Image'=>$file['name'],
            'Phone'=>$request->Phone,
            'Address'=>$request->Address,
            'Birth'=>$request->Birth,
            'Id_Language'=>$request->Id_Language,
            'Id_Bu'=>$request->Id_Bu,
            ]);
        return redirect()->back()->with('success','Successfully add');
    }
    public  function edit($id){
        $student = Student::findOrFail($id);
        $bus = Bu::all();
        $languages = Language::all();
        return view('student.edit',compact('student','bus','languages'));
    }
    public function update(StudentExampleRequest $request, $id){
        $file['name'] = "";
        if ($request->hasFile('Image')) {
            $file = upload_image('Image');
        }
        $student = Student::findOrFail($id);
        $student->Name = $request->input('Name');
        $student->Sex = $request->input('Sex');
        $student->Image = $file['name'];
        $student->Mail=$request->input('Mail');
        $student->Phone = $request->input('Phone');
        $student->Address = $request->input('Address');
        $student->Birth = $request->input('Birth');
        $student->Id_Language = $request->input('Id_Language');
        $student->Id_Bu = $request->input('Id_Bu');
        $student->save();
        return redirect()->route('student.index')->with('success', 'Successfully update');
    }
    public function destroy($id){
        Student::findOrFail($id)->delete();
        return redirect()->route('student.index');
    }
}
