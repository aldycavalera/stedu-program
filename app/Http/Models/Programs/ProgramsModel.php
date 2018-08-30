<?php
namespace App\Http\Models\Programs;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProgramsModel extends Model
{
    protected $fillable = ['name', 'taxonomy_key', 'status'];
    protected $table = 'programs';

    public $timestamps  = true;

}


 ?>
