<?php

namespace App\Http\Requests;

use App\Model\Meeting;
use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
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
        if($this->route()->getName() == 'meetings.store'){
            $date = \Carbon\Carbon::now()->subDay(7);
            return [
                'user_id' => 'required',
                'client_id' => 'required',
                'schedule_id' => 'required',
                'source' => 'required|string',
                'destination'   => 'required|string',
                'cost'   => 'required|integer',
                'meeting_time'   => 'required|before:tomorrow|after:'.$date,
                'status'   => 'required',
                'file'   => 'required|file|mimes:jpeg,png,jpg,zip,pdf,pptx,docx|max:2048',

            ];
        }

        else if($this->route()->getName() == 'meetings.update'){
            return [

            ];
        }
    }

    public function withValidator($validator){
            $validator->after(function($validator){
                $formData = $this->all();

                if($this->route()->getName() == 'meetings.store'){
                    if( Meeting::where('user_id', '=', $formData['user_id'])->where('schedule_id', '=', $formData['schedule_id'])->first())
                        $validator->errors()->add('source', 'This records has already added!');
                }

            });
        }

}
