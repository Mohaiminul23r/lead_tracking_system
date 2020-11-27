<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FollowupRequest extends FormRequest
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
        
        if($this->route()->getName() == 'followups.store'){
            return [

                'followup_time' => 'required|after:today',

            ];
        }
        
        else if($this->route()->getName() == 'followups.update'){
            $followups = $this->all();
            return [
               

            ];
        }
    }
            public function messages(){

                return [

                        'followup_time.required' => 'Followup time is required',
                ];
    }
}

