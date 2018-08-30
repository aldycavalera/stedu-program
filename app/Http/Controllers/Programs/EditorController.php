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
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
      $getSoal   = SoalModel::find($soalId);
      $getMapel  = MapelModel::find($getSoal->mapel_id);
      $userClass = UserClass::find(Auth::id());

      $returnData = array(
        'Soal'   => json_decode($getSoal),
        'Mapel'  => $mapel,
        'MapelId'=> $getMapel->id,
        'SoalId' => $soalId
      );
      if ($userClass->status == '0') {
        return redirect()->route('classes')->with('from', 'uhbk');
      }
        return view('Programs.editor', $returnData);
    }
}
