<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
      if($this->route()->getName() == 'projects.store'){
            return [

                'project_category_id' => 'required',
                'name' => 'required',
                'details' => 'required',
            ];
        }
        
        else if($this->route()->getName() == 'projects.update'){
            $project = $this->all();
            return [

                'name' => 'required|regex:/^[a-z A-Z]+$/u | min:3| unique:companies,name,'.$project['id'],
                'details' => 'required',
                'project_category_id' => 'required',
            ];
        }
    }

    public function messages(){

        return [
            'project_category_id.required' => 'Project category is required',
        ];
    }
}
