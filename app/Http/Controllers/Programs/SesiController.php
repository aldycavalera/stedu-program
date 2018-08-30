<?php

namespace App\Http\Controllers\Programs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Users\UserClass;
use App\Http\Models\Programs\ProgramsModel;
use App\Http\Models\Programs\MapelModel;
use App\Http\Models\Programs\SoalModel;
use App\Http\Models\Programs\SesiModel;
use App\User;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  // halaman /cbt
  public function index()
  {
    return view('Programs.cbtSesi');
  }
  public function cekSesi(Request $request)
  {
    // ambil semua sesi ditabel cbt_sesi
    $getSesi = SesiModel::all();
    //loop
    foreach ($getSesi as $sesi) {
      // jika sesi sama dengan diinput user
      if ($sesi->sesi_key == $request->sesiKey && $sesi->status=='active') {
        //redirect ke soal
        $mapel  = MapelModel::find($sesi->mapel_id)->nama_mapel;
        $soalId = SoalModel::find($sesi->soal_id)->id;
        return redirect('cbt/'.strtolower($mapel).'/'.$soalId);
      }
      return redirect()->back()->with('isError','Sesi tidak ditemukan');
    }

  }
}
