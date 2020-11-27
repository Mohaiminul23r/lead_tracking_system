<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectSlab extends Model
{
    use ModelCommonTrait;
    protected $fillable = [
       'projects_id', 'name', 'price', 'employee','support_cost','status',
    ];

    public function project(){
    	return $this->belongsTo('App\Model\Project');
    }
}
