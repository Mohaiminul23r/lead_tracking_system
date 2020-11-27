<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CallHistory extends Model
{
    use ModelCommonTrait;

    protected $fillable = [
        'status',
    ];

    public function project(){

	return $this->belongsTo('App\Model\Project');
	}

	 public function client(){
    	
	return $this->belongsTo('App\Model\Client');
	}

	 public function user(){
    	
	return $this->belongsTo('App\Model\User');
	}
}
