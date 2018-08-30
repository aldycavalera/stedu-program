<?php
namespace App\Http\Models\Programs;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProgramEventsModel extends Model
{
    protected $fillable = ['accessKey', 'program_id','name', 'description','mapel','taxonomy_key', 'status'];
    protected $table = 'program_events';

    public $timestamps  = true;

}


 ?>
