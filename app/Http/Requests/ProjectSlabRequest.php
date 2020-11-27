<?php

namespace App\Http\Requests;
use App\Model\ProjectSlab;

use Illuminate\Foundation\Http\FormRequest;

class ProjectSlabRequest extends FormRequest
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
        if($this->route()->getName() == 'projectslabs.store'){
            return [
                'name' => 'required | regex:/^[a-z A-Z]+$/u | min:3',
                'project_id' => 'required | integer',
                'employee' => 'required | integer',
                'price' => 'required | integer',
                'support_cost' => 'required | string',
            ];
        }

        if($this->route()->getName() == 'projectslabs.update'){
             return [
                'name' => 'required | regex:/^[a-z A-Z]+$/u | min:3',
                'project_id' => 'required | integer',
                'employee' => 'required | integer',
                'price' => 'required | integer',
                'support_cost' => 'required | integer',
                'status' => 'required | integer',
            ];
        }
    }

     public function messages()
    {
        return [
            'project_id.required' => 'Project name is required',
            'company_id.required' => 'Company name is required',
            'employee.required' => 'Number of employee name is required',
            'employee.integer' => 'Number of employee will accept only integer value',
            'support_cost.required' => 'Support cost is required',
            'support_cost.integer' => 'Support cost will accept only integer value',
        ];
    }

    public function withValidator($validator){
        $validator->after(function($validator){
            $formData = $this->all();
            if(isset($formData['project_id']) && isset($formData['name'])){

                if($this->route()->getName() == 'projectslabs.store'){
                    if(ProjectSlab::where('name', '=', $formData['name'])->where('project_id', '=', $formData['project_id'])->first()){
                        $validator->errors()->add('name', 'This Projec Slab name has already taken!');
                        $validator->errors()->add('project_id', 'The Slab name for this project has already taken!');
                    }
                }

                else if($this->route()->getName() == 'projectslabs.update'){
                    $slab = $this->all();
                    if(ProjectSlab::where('name', '=', $formData['name'])->where('project_id', '=', $formData['project_id'])->where('id', '!=', $slab['id'])->first()){
                        $validator->errors()->add('name', 'This Projec Slab name has already taken!');
                        $validator->errors()->add('project_id', 'The Slab name for this project has already taken!');
                    }
                }
            }

        });
    }
}
