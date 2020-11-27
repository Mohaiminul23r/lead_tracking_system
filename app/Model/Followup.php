<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    use ModelCommonTrait;

    protected $fillable = [
        'followupable_type',
    ];

}
