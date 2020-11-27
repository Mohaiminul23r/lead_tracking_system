<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
        if($this->route()->getName() == 'addresses.store'){
            return [

                'country_id' => 'required',
                'city_id'=>'required',
                'address1'=>'required | string',
                'postal_code'=>'required',
            ];
        }
        
        else if($this->route()->getName() == 'addresses.update'){
            $address1 = $this->all();
            return [
                'country_id' => 'required',
                'city_id'=>'required',
                'address1'=>'required'.$address1['id'],
                'postal_code'=>'required',
            ];
        }
    }

        public function messages(){

                return [

                        'country_id.required' => 'Country name is required',
                        'city_id.required' => 'City name is required',
                        'address1.required' => 'Address is required',
                ];
    }



}
