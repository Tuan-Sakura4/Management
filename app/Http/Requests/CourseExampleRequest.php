<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseExampleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Name'=>'required|min:5|max:255',
            'Content'=>'required',
            'Description'=>'required',
            'Total'=>'required|numeric'
        ];
    }
    public function message()
    {
        $messages=[
            'Name.required'=>'We need to know course full name!',
            'Name.min'=>'Name size must be between 5 and 255!',
            'Name.max'=>'Name size must be between 5 and 255!',
            'Content.required'=>'We need to know course content!',
            'Description.required'=>'We need to know course content!',
            'Total.required'=>'Not be empty!',
            'Total.numeric'=>'Total under validation must be numeric!',
        ];
            return $messages;
    }
}
