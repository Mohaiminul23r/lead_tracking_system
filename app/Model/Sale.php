<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    
    use ModelCommonTrait;

    protected $fillable = [
        'price','remarks','ststus',
    ];

     public function user(){
        return $this->belongsTo('App\Model\User');
    }
     public function project(){
        return $this->belongsTo('App\Model\Project');
    }
     public function projectSlab(){
        return $this->belongsTo('App\Model\ProjectSlab');
    }

    public function client(){
        return $this->belongsTo('App\Model\Client');
    }

    public function meeting(){
        return $this->belongsTo('App\Model\Meeting');
    }

}
