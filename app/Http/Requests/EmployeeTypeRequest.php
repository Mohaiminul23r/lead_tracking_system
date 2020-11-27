<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeTypeRequest extends FormRequest
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
        if($this->route()->getName() == 'employeetypes.store'){
            return [
                'name'=>'required | regex:/^[a-z A-Z]+$/u | min:3 | unique:employee_types,name',
            ];
        }

        else if($this->route()->getName() == 'employeetypes.update'){
            $emp_type = $this->all();
            return [
                'name'=>'required | regex:/^[a-z A-Z]+$/u | min:3 | unique:employee_types,name,'.$emp_type['id'],
                'status' => 'required | integer',
            ];
        }
    }
}
