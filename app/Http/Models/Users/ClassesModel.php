<?php
namespace App\Http\Models\Users;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ClassesModel extends Model
{
    protected $fillable = ['term_key', 'value', 'description', 'status'];
    protected $table = 'classes';

    public $timestamps  = false;

    public function classes()
    {
      return $this->belongsTo('\App\User');
    }
    public function userClass()
    {
      return $this->hasOne('\App\Http\Models\Users\UserClass');
    }
}


 ?>
