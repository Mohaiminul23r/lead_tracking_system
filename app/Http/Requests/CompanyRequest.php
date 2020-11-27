<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        if($this->isMethod('post')){
            return [
                'name'=>'required |regex:/^[a-z A-Z]+$/u | min:3 | unique:companies,name',
            ];
        }

        else if($this->isMethod('put')){
            $user = $this->all();
            return [
                'name'=>'required |regex:/^[a-z A-Z]+$/u | min:3| unique:companies,name,'.$user['id'],
            ];
        }
    }
}
