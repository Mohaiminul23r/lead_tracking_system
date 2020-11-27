<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    use ModelCommonTrait;
    protected $fillable = [
        'name','country_id',
    ];

    public function country(){
    	return $this->belongsTo('App\Model\Country');
    }
}
