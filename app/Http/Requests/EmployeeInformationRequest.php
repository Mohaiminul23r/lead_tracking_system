<?php

namespace App\Http\Requests;
use App\Model\User;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeInformationRequest extends FormRequest
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
        $date = \Carbon\Carbon::now()->subYear(14);

        if($this->route()->getName() == 'addAddressForUser'){
            return [
                'country_id' => 'required',
                'city_id'=>'required',
                'address1'=>'required | string',
                'postal_code'=>'required',
            ];

        }

        return [
            'name' => 'required | regex:/^[a-z A-Z]+$/u | min:3',

            'email' => 'required | email',
            'phone' => array(
                        'required',
                        // 'regex:/^[+]*[(]*[0-9]{1,4}[)]*[-\s\.0-9]{9,12}$/u'
                        'regex: /(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'
                    ),
            'salary' => 'required | integer | max:99999999',
            'dob' => 'required | date | before:'.$date,
            'gender' => 'required | alpha',
            'office_id' => 'required | integer',
            'company_id' => 'required | integer',
            'department_id' => 'required | integer',
            'designation_id' => 'required | integer',
            'employee_type_id' => 'required | integer',
        ];
    }

    public function messages()
    {
        return [
            'dob.required' => 'Date of Birth is required!',
            'dob.before' => 'Age should not less than 14 years!',
            'office_id.required' => 'Office name required',
            'country_id.required' => 'Country name required',
            'city_id.required' => 'City name required',
            'address1.required' => 'Address is required',
            'company_id.required' => 'Company name required',
            'department_id.required' => 'Department name required',
            'designation_id.required' => 'Designation name required',
            'employee_type_id.required' => 'Employee type name required',
            'name.regex' => 'Name field should not contain any special character or number',
            'phone.regex' => 'Invalid phone number format',
        ];
    }

    public function withValidator($validator){
        $validator->after(function($validator){
            $formData = $this->all();

            if($this->route()->getName() == 'employees.store'){
                if( User::where('email', '=', $formData['email'])->first())
                    $validator->errors()->add('email', 'This email has already taken!');
            }

            else if($this->route()->getName() == 'employees.update'){
                $user = $this->all();
                if( User::where('email', '=', $formData['email'])->where('id', '!=', $user['user_id'])->first())
                    $validator->errors()->add('email', 'This email has already taken!');
            }

        });
    }
}
