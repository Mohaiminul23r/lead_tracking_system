<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
     use ModelCommonTrait;
     protected $fillable = [
        'name','status',
    ];
}
