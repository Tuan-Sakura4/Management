<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Date' => 'required|unique:lessons,Date',
            'Id_Teacher'=>'required',
            'Id_Course'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'Date.required' => 'Please enter date.',
            'Date.unique' => 'The day had a lesson',
            'Id_Teacher.required' => 'Please select a teacher.',
            'Id_Course.required' => 'Please select a course.',
        ];
    }
}
