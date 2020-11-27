<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use ModelCommonTrait;
    protected $fillable = [
        'name', 'phone', 'email',
    ];
}
