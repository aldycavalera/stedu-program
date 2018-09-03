<?php

namespace App\Http\Controllers\Programs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Users\UserClass;
use App\Http\Models\Programs\ProgramsModel;
use App\Http\Models\Programs\MapelModel;
use App\Http\Models\Programs\SoalModel;
use App\Http\Models\Programs\SesiModel;
use App\Http\Models\Programs\HasilModel;
use App\User;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CBTControllers extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($mapel, $soalId)
    {
      $userClass = UserClass::find( Auth::id() );
      $soalCollect = App::make('\App\Http\Controllers\API\SoalApiController');
      $mapels = MapelModel::all();
      foreach ($mapels as $mapelId) {
        if (strtolower($mapelId->nama_mapel) == $mapel) {
          $mapel_id = $mapelId->id;
        }
      }

      $hasil = HasilModel::all();
      foreach ($hasil as $res) {
        // jika user sudah mengisi soal sebelumnya
        if ($res->user_id==Auth::id() && $res->soal_id==$soalId)
          $wasDoing = true;
        else
          $wasDoing = false;
      }
      if (!isset($wasDoing))
        $wasDoing = false;
      // ambil soal
      $getSoal = $soalCollect->getSoal($mapel, $soalId);
      // jika soal tidak ada, isi dengan json default
      if (!$getSoal) {
        $getSoal = '{"pages": [{"name": "page1"}],"questionStartIndex": "1"}';
      }
      $returnData = array(
        'wasDoing' => $wasDoing,
        'Mapel'  => $mapel,
        'SoalId' => $soalId,
        'MapelId' => $mapel_id,
        'Soal'   => $getSoal
      );
      if ($userClass->status == '0') {
        return redirect()->route('classes')->with('from', 'cbt');
      }
        return view('Programs.cbt', $returnData);
    }
}
