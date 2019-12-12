<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Id_Lesson' => 'required',
            'Id_Student'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'Id_Lesson.required' => 'Please select a lesson.',
            'Id_Student.required' => 'Please select a student.',
            'Id_Student.unique' => 'Student were there in attendance',
        ];
    }
}
