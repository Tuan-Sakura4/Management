<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Name' => 'required|max:255',
            'Phone'=>'required|max:11',
            'Address'=>'required|max:255',
            'Mail'=>'required|email|max:255',
        ];
    }

    public function messages()
    {
        return [
            'Name.required' => 'Please enter the user name.',
            'Phone.required' => 'Please enter the phone number.',
            'Address.required' => 'Please enter the address.',
            'Mail.required' => 'Please enter the email.',
            'Name.max' => 'Over limit.',
            'Phone.max' => 'Over limit.',
            'Address.max' => 'Over limit.',
            'Email.max' => 'Over limit.',
            'Email.email'=>'You enter the correct email again',
        ];
    }
}
