<?php
namespace App\Http\Models\Programs;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SoalModel extends Model
{
    protected $fillable = ['mapel_id', 'sesi_id','soal','status'];
    protected $table = 'cbt_soal';

    public $timestamps  = true;

    public function users()
    {
      return $this->hasMany('\App\User');
    }

}


 ?>
