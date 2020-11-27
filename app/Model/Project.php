<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
      use ModelCommonTrait;
       protected $fillable = [
       'project_category_id', 'name','details','status'
    ];

public function projectCategory(){

	return $this->belongsTo('App\Model\ProjectCategory');
}


public function projectSlabs(){
  return $this->hasMany('App\Model\ProjectSlab');
}

public function callHistories(){
  return $this->hasMany('App\Model\CallHistory');
}

}
