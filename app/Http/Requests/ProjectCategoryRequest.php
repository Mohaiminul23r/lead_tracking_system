<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectCategoryRequest extends FormRequest
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
        if($this->route()->getName() == 'projectcategories.store'){
            return [

                'name'=>'required | regex:/^[a-z A-Z]+$/u | min:3 | unique:project_categories,name',
            ];
        }
        
        else if($this->route()->getName() == 'projectcategories.update'){
            $projectcategory = $this->all();
            return [
                'name'=>'required |regex:/^[a-z A-Z]+$/u | min:3 | unique:project_categories,name,'.$projectcategory['id'],
            ];
        }
    }
}
