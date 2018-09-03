<?php
namespace App\Http\Models\Programs;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SesiModel extends Model
{
    protected $fillable = ['mapel_id', 'class_id','sesi_key','soal_id','status'];
    protected $table = 'cbt_sesi';

    public $timestamps  = true;

    public function users()
    {
      return $this->hasMany('\App\User');
    }
    public function soal()
    {
      return $this->hasMany('\App\Http\Models\Programs\SoalModel');
    }
    public function mapel()
    {
      return $this->hasMany('\App\Http\Models\Programs\MapelModel');
    }
}


 ?>
