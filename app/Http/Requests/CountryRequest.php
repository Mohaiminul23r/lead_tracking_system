<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
      
        if($this->route()->getName() == 'countries.store'){
            return [
                'name'=>'required | regex:/^[a-z A-Z]+$/u | min:3 | unique:countries,name',
            ];
        }
        
        else if($this->route()->getName() == 'countries.update'){
            $country = $this->all();
            return [
                'name'=>'required |regex:/^[a-z A-Z]+$/u | min:3 | unique:countries,name,'.$country['id'],
            ];
        }
    }
}
