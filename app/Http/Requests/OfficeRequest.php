<?php
namespace App\Http\Requests;
use App\Model\Office;

use Illuminate\Foundation\Http\FormRequest;


class OfficeRequest extends FormRequest
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
            'name' => 'required | regex:/^[a-z A-Z]+$/u | min:3',
            'email' => 'required | email | unique:offices,email',
            'phone' => array(
                    'required',
                    // 'regex:/^[+]*[(]*[0-9]{1,4}[)]*[-\s\.0-9]{9,12}$/u'
                    'regex: /(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/',
                    'unique:offices,phone'
                ),
            'country_id' => 'required | integer',
            'company_id' => 'required | integer',
            'city_id' => 'required | integer',
            'address1' => 'required | string',
            'postal_code' => 'required',
        ];
    }

     public function messages()
    {
        return [
            'country_id.required' => 'Country name is required',
            'company_id.required' => 'Company name is required',
            'city_id.required' => 'City name is required',
            'address1.required' => 'Address field is required',

            'name.regex' => 'Name field should not contain any special character or number',
            'phone.regex' => 'Invalid phone nummber format',
            'phone.unique' => 'Phone number already taken',
            'email.unique' => 'Email address already taken',
        ];
    }

    public function withValidator($validator){
        $validator->after(function($validator){
            $formData = $this->all();
            if(isset($formData['name']) && isset($formData['company_id'])){

                if($this->route()->getName() == 'offices.store'){
                    if(Office::where('name', '=', $formData['name'])->where('company_id', '=', $formData['company_id'])->first()){
                        $validator->errors()->add('name', 'This office name has already taken!');
                        $validator->errors()->add('company_id', 'The office name for this company has already taken!');
                    }
                }

                else if($this->route()->getName() == 'offices.update'){
                    $office = $this->all();
                    if(Office::where('name', '=', $formData['name'])->where('company_id', '=', $formData['company_id'])->where('id', '!=', $office['id'])->first()){
                        $validator->errors()->add('name', 'This office name has already taken!');
                        $validator->errors()->add('company_id', 'The office name for this company has already taken!');
                    }
                }
            }

        });
    }

}
