<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

    class ScheduleRequest extends FormRequest
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
      if($this->route()->getName() == 'schedules.store'){
        return [

          'address1' => 'required',
          'city_id'   => 'required',
          'country_id'   => 'required',
          'postal_code'   => 'required',

          'schedule_time'   => 'required|date_format:Y-m-d H:i:s|after:3 hours',
          'call_history_id'   => 'required',

        ];
      }

      else if($this->route()->getName() == 'schedules.update'){
        return [
          'address1' => 'required',
          'city_id'   => 'required',
          'country_id'   => 'required',
          'postal_code'   => 'required',

          'schedule_time'   => 'required|date_format:Y-m-d H:i:s|after:3 hours',
          'call_history_id'   => 'required',

        ];
      }
    }

    public function messages(){

      return [
        'schedule_time.after' => 'Schedule time must be at least after 3 hour from now !',
        'address1.required' => 'Address is required',   
        'city_id.required' => 'City name is required',  
        'country_id.required' => 'Country name is required',
        'postal_code.required' => 'Postal code is required',


      ];
    }


}
