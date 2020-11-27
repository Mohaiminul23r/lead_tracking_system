<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
     use ModelCommonTrait;
     protected $fillable = [
        'address1','postal_code','country_id','city_id',
    ];


    public function country(){
        return $this->belongsTo('App\Model\Country');
    }

    public function city(){
        return $this->belongsTo('App\Model\City');
    }

    public function offices(){
        return $this->hasMany('App\Model\Office');
    }
    public function employeeInformation(){
        return $this->hasMany('App\Model\EmployeeInformation');
    }
}
