<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class StudentExampleRequest extends FormRequest
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
            'Name'=>'required|min:5|max:30',
            'Sex'=>'required',
            'Mail'=>'required|email',
            'Phone'=>['required', new PhoneNumber],
            'Birth'=>'date_format:Y-m-d|before:today|nullable',
            'Address'=>'required|min:3|max:255',
            'Id_Language'=>'required',
            'Id_Bu'=>'required'
        ];
    }
    public  function message()
    {
        $messages=[
            'Name.required'=>'We need to know course full name!',
            'Name.min'=>'Name size must be between 5 and 30!',
            'Name.max'=>'Name size must be between 5 and 30!',
            'Mail.required'=>'We need to know your email!',
            'Mail.email'=>'Wrong format!',
            'Phone.required'=>'We need to know your phone!',
            'Birth.date_format'=>'Wrong format!',
            'Birth.before'=>'The date of birth must be less than the current date!',
            'Address.required'=>'We need to know your address!',
            'Address.min'=>'Address size must be between 3 and 255!',
            'Id_Language.required'=>'Not be empty!',
            'Id_Bu.required'=>'Not be empty!',
        ];
        return $messages;
    }
}
