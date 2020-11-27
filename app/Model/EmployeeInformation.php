<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeInformation extends Model
{
    
    use ModelCommonTrait;

     protected $fillable = [
		'phone', 'salary', 'status',
    ];

    public function company(){
        return $this->belongsTo('App\Model\Company');
    }

    public function office(){
        return $this->belongsTo('App\Model\Office');
    }

    public function user(){
        return $this->belongsTo('App\Model\User');
    }

    public function department(){
        return $this->belongsTo('App\Model\Department');
    }

    public function designation(){
        return $this->belongsTo('App\Model\Designation');
    }

    public function employeeType(){
        return $this->belongsTo('App\Model\EmployeeType');
    }

    public function address(){
        return $this->belongsTo('App\Model\Address');
    }
}
