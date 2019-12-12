<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestExampleRequest extends FormRequest
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
            'Date'=>'required',
            'Point'=>'required|numeric|min:0|max:10',
            'Id_Course'=>'required',
            'Id_Student'=>'required'
        ];
    }
    public function message(){
        $messages =[
            'Date.required'=>'Not be empty!',
            'Point.required'=>'Point not be empty!',
            'Point.number'=>'Point under validation must be numeric!',
            'Point.min'=>'Point size must be between 0 and 10!',
            'Point.max'=>'Point size must be between 0 and 10!',
            'Id_Course.required'=>'Not be empty!',
            'Id_Student.required'=>'Not be empty!'
        ];
        return $messages;
    }
}
