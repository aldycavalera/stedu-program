<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Users\UserClass;
use App\Http\Models\Programs\ProgramsModel;
use App\Http\Models\Programs\MapelModel;
use App\Http\Models\Programs\SoalModel;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Programs\SesiModel;
use App\Http\Controllers\Controller;

class SoalApiController extends Controller
{
    public function getAllSoal()
    {
      $getSesi = SesiModel::all();
      $getAllSoal = SoalModel::all();
      $getMapel = MapelModel::all();

      return view('Programs.getAllSoal',['Soal'=>$getAllSoal,'SesiKey'=>$getSesi,'Mapel'=>$getMapel]);
    }

    public function getSoal($mapel, $soalId)
    {
      $getSoal   = SoalModel::find($soalId);
      if ($getSoal) {
        $returnData = $getSoal->soal;
        return $returnData;
      }
      return false;
    }

    public function getAllSesi()
    {
      $getSesi = SesiModel::all();
      return view('Programs.getSesi',['Sesi'=>$getSesi]);
    }

    public function getAllMapel()
    {
      $getMapel = MapelModel::all();
      return view('Programs.getAllMapel', ['Mapel'=>$getMapel]);
    }

    // add soal
    public function addSoal(Request $request)
    {

      $Sesi = SesiModel::create([
        'mapel_id' => $request->mapel_id,
        'soal_id'  => 2, // nanti dibawah diupdate
        'class_id' => 1, // ganti!,
        'status'   =>'nonactive',
        'sesi_key' => $request->sesi_new_key,
        'created_at' => date("Y-m-d H:i:s"),
      ]);
      $Soal = SoalModel::create([
        'sesi_id'  => $Sesi->id,
        'mapel_id' => $request->mapel_id,
        'created_at' => date("Y-m-d H:i:s"),
        'soal' => "{}",
      ]);
      $Sesi = SesiModel::find($Soal->sesi_id);
      $Sesi->soal_id    = $Soal->id;
      $Sesi->updated_at = date("Y-m-d H:i:s");
      $Sesi->save();

      return redirect()->back()->with('status', 'created');
    }


    // update soal
    public function updateSoal(Request $request)
    {
      // $Mapel = MapelModel::find($request->mapel_id);
      $getSoal  = SoalModel::all();
      foreach ($getSoal as $gSoal) {
        if ($gSoal->mapel_id == $request->mapel_id)
          $isExist = true;
        else
          $isExist = false;
      }
      if ($isExist == false) {
          $Soal = SoalModel::create([
            'sesi_id'  =>2, // ganti!
            'mapel_id' => $request->mapel_id,
            'updated_at' => date("Y-m-d H:i:s"),
            'soal' => $request->soalJSON
          ]);
          return redirect()->back()->with('status', 'created');
      } else {
        $Soal = SoalModel::find($request->soal_id);
        $Soal->mapel_id   = $request->mapel_id;
        $Soal->updated_at = date("Y-m-d H:i:s");
        $Soal->soal       = $request->soalJSON;
        $Soal->save();
        return redirect()->back()->with('status', 'updated');
      }
    }
}
