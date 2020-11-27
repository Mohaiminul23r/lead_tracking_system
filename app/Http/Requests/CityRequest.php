<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
        if($this->route()->getName() == 'cities.store'){
            return [

                'country_id' => 'required',
                'name'=>'required | regex:/^[a-z A-Z]+$/u | min:3 | unique:cities,name',
            ];
        }
        
        else if($this->route()->getName() == 'cities.update'){
            $city = $this->all();
            return [
                'country_id' => 'required',
                'name'=>'required |regex:/^[a-z A-Z]+$/u | min:3 | unique:cities,name,'.$city['id'],
            ];
        }
    }

    public function messages(){

        return [

                'country_id.required' => 'Country name is required',
        ];
    }
}
