<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
	use ModelCommonTrait;
	use Notifiable;
    //
     protected $fillable = [
        'name', 'company', 'email', 'phone', 'status',
    ];

    public function callHistories(){
    return $this->hasMany('App\Model\CallHistory');
}
}