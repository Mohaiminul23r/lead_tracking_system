<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use ModelCommonTrait;
    
    protected $fillable = [
        'name',
    ];

    public function office(){
        return $this->hasMany('App\Model\Office');
    }

}
