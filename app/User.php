<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','userClass','username','location', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function userData()
    {
      return $this->hasOne('\App\Http\Models\Users\UserData');
    }
    public function userClass()
    {
      return $this->hasOne('\App\Http\Models\Users\UserClass');
    }
    public function classesModel()
    {
      return $this->hasOne('\App\Http\Models\Users\ClassesModel');
    }
    public function sesi()
    {
      return $this->hasOne('\App\Http\Models\Programs\SesiModel');
    }
    public function soal()
    {
      return $this->hasMany('\App\Http\Models\Programs\soal');
    }
    public function hasil()
    {
      return $this->hasMany('\App\Http\Models\Programs\SesiModel');
    }
}
