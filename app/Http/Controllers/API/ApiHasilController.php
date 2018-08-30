<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Users\UserClass;
use App\Http\Models\Programs\ProgramsModel;
use App\Http\Models\Programs\MapelModel;
use App\Http\Models\Programs\HasilModel as Hasil;
use App\Http\Models\Programs\SoalModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\Programs\SesiModel;
use App\Http\Controllers\Controller;

class ApiHasilController extends Controller
{
    public function create(Request $request)
    {
      $hasil = Hasil::create([
        'user_id'    => Auth::id(),
        'mapel_id'   => $request->mapel_id,
        'sesi_id'    => 1, // ganti!
        'soal_id'    => $request->soal_id,
        'jawaban'    => $request->result,
        'nilai'      => " ",
        'created_at' => date("Y-m-d H:i:s")
      ]);
      if ($hasil) {
        return redirect()->route('profile');
      } else {
        dd('Ooops');
      }
    }
}
