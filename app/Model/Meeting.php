<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use ModelCommonTrait;
    
    protected $fillable = [
        'path', 'meeting_time','status',
    ];

    public function schedule(){
        return $this->belongsTo('App\Model\Schedule');
    }

    public function client(){
        return $this->belongsTo('App\Model\Client');
    }

    public function user(){
        return $this->belongsTo('App\Model\User');
    }

    public function ta(){
        return $this->hasOne('App\Model\TA');
    }
}
