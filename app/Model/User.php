<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use KawsarJoy\RolePermission\Permissible;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use ModelCommonTrait;
    use Permissible;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function employee_information(){
        return $this->hasOne('App\Model\EmployeeInformation');
    }

    public function callHistories(){
    return $this->hasMany('App\Model\CallHistory');
}
   
}
