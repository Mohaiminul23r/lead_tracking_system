<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeType extends Model
{
     use ModelCommonTrait;
     protected $fillable = [
        'name',
    ];
}
