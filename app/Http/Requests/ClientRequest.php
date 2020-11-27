<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        if($this->route()->getName() == 'clients.store'){
            return [

                'name' => 'required | regex:/^[a-z A-Z]+$/u | min:3',
                'company'=>'required | regex:/^[a-z A-Z]+$/u | min:3',
                'phone' => array(
                    'required',
                    // 'regex:/^[+]*[(]*[0-9]{1,4}[)]*[-\s\.0-9]{9,12}$/u'
                    'regex: /(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/',
                    'unique:clients,phone'
                ),
                'email' => 'required | email | unique:clients,email',


            ];
        }
        
        else if($this->route()->getName() == 'clients.update'){
            $client = $this->all();
            return [
               
                'name' => 'required | regex:/^[a-z A-Z]+$/u | min:3',
                'company'=>'required | regex:/^[a-z A-Z]+$/u | min:3',
                'phone' => array(
                    'required',
                    // 'regex:/^[+]*[(]*[0-9]{1,4}[)]*[-\s\.0-9]{9,12}$/u'
                       'regex: /(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/',
                    
                ),
                 'email' => 'required | email | unique:clients,email,'.$client['id'],
            ];
        }
    }

        public function messages(){

                return [

                        'country_id.required' => 'Country name is required',
                        'city_id.required' => 'City name is required',
                        'address1.required' => 'Address is required',
                        'phone.regex' => 'Invalid mobile number format',
                        'phone.unique' => 'Phone number already taken',
                        'email.unique' => 'Email address already taken',

                ];
    }


}
