<?php
namespace App\Http\Models\Users;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserClass extends Model
{
    protected $fillable = ['user_id','class_id'];
    protected $table = 'user_class';

    public $timestamps  = false;

    public function user()
    {
      return $this->belongsTo('\App\User');
    }
    public function classes()
    {
      return $this->belongsTo('\App\Http\Models\Users\ClassesModel');
    }
}


 ?>
