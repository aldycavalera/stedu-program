<?php
namespace App\Http\Models\Users;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $fillable = ['user_id', 'currentLoc'];

    protected $table = 'user_data';

    public function user()
    {
      return $this->belongsTo('\App\User');
    }
}


 ?>
