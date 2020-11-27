<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
        if($this->route()->getName() == 'departments.store'){
            return [
                'name'=>'required | unique:departments,name',
            ];
        }

        else if($this->route()->getName() == 'departments.update'){
            $dept = $this->all();
            return [
                'name'=>'required | unique:departments,name,'.$dept['id'],
            ];
        }
    }
}
