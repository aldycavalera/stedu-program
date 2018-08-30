<?php
namespace App\Http\Models\Programs;

use App\User;
use Illuminate\Database\Eloquent\Model;

class MapelModel extends Model
{
    protected $fillable = ['class_key', 'kode_mapel','nama_mapel', 'KKM'];
    protected $table = 'cbt_mapel';

    public $timestamps  = true;

    public function soal()
    {
      return $this->belongsTo('\App\Http\Models\Programs\SoalModel', 'mapel_id');
    }
    public function sesi()
    {
      return $this->belongsTo('\App\Http\Models\Programs\SesiModel');
    }
}


 ?>
