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
    * Untuk halaman editor jika mapel & soalId belum dibuat
    * Route : /editor
    */
    public function index()
    {
        return view('Programs.editorIndex');
    }

    /**
     * untuk halaman editor jika mapel & soalId sudah dibuat
     *
     * @return \Illuminate\Http\Response
     */
    public function show($mapel, $soalId)
    {
      $getSoal   = SoalModel::find($soalId);
      $getMapel  = MapelModel::all();
      foreach ($getMapel as $gMapel) {
        if (strtolower($gMapel['nama_mapel']) == $mapel) {
          $mapelId = $gMapel->id;
        }
      }
      $userClass = UserClass::find(Auth::id());
      $returnData = array(
        'Soal'   => json_decode($getSoal),
        'Mapel'  => $mapel,
        'MapelId'=> $mapelId,
        'SoalId' => $soalId
      );
      if ($userClass->status == '0') {
        return redirect()->route('classes')->with('from', 'uhbk');
      }
        return view('Programs.editor', $returnData);
    }

    public function geturi(Request $request)
    {
      $soalId = $request->soal_id;
      $mapel  = strtolower($request->mapel);
      $url = url('cbt/editor/'.strtolower($mapel).'/'.$soalId);
      return redirect()->back()->with('URL', $url);
    }
}
