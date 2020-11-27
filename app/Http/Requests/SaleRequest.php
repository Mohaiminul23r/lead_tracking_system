<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\Sale;

class SaleRequest extends FormRequest
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
        if($this->route()->getName() == 'sales.store'){
            $date = \Carbon\Carbon::now()->subDay(7);
            return [
                'user_id' => 'required',
                'meeting_id' => 'required',
                'price' => 'required|integer',
                'project_slab_id' => 'required',

            ];
        }

        else if($this->route()->getName() == 'sales.update'){
            return [

            ];
        }
    }


    public function messages(){

      return [
        'project_slab_id.required' => 'Project Slab is required',   

      ];
    }

    public function withValidator($validator){
            $validator->after(function($validator){
                $formData = $this->all();

                if($this->route()->getName() == 'sales.store'){
                    if( Sale::where('user_id', '=', $formData['user_id'])->where('meeting_id', '=', $formData['meeting_id'])->first())
                        $validator->errors()->add('already', 'This records has already added!');
                }

            });
        }
}
