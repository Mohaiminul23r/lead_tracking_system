<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TA extends Model
{
	use ModelCommonTrait;
    protected $table = 't_a_s';

    protected $fillable = [
        'source', 'destination','cost','remarks','status',
    ];
}
