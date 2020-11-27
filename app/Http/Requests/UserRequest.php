<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Hash;
use Auth;

class UserRequest extends FormRequest
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

        if($this->route()->getName() == 'cngPassword'){
            return [
                'old_password' => 'required',
                'new_password' => 'required|min:6',
                'confirm_password' => 'required|same:new_password',
            ];

        }
    }

    public function withValidator($validator){
        $validator->after(function($validator){
            $formData = $this->all();

            if (!(Hash::check($formData['old_password'] , Auth::user()->password))) {
                $validator->errors()->add('old_password', 'Old password does not match!');
            }

        });
    }
}
