<?php
namespace App\Http\Models\Programs;

use App\User;
use Illuminate\Database\Eloquent\Model;

class HasilModel extends Model
{
    protected $fillable = ['user_id', 'mapel_id','sesi_id', 'soal_id','jawaban','nilai','created_at'];
    protected $table = 'cbt_hasil';

    public $timestamps  = true;

    public function soal()
    {
      return $this->hasMany('\App\Http\Models\Programs\soal');
    }
    public function users()
    {
      return $this->hasMany('\App\User');
    }
}


 ?>
