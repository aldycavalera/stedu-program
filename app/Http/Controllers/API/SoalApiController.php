<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Users\UserClass;
use App\Http\Models\Programs\ProgramsModel;
use App\Http\Models\Programs\MapelModel;
use App\Http\Models\Programs\SoalModel;
use App\Http\Models\Programs\SesiModel;
use App\Http\Controllers\Controller;

class SoalApiController extends Controller
{
    public function getSoal($mapel, $soalId)
    {
      $getSoal   = SoalModel::find($soalId);
      if ($getSoal) {
        $returnData = $getSoal->soal;
        return $returnData;
      }
      return false;
    }

    public function updateSoal(Request $request)
    {
      $Soal = SoalModel::find($request->soal_id);
      $Soal->mapel_id   = $request->mapel_id;
      $Soal->updated_at = date("Y-m-d H:i:s");
      $Soal->soal       = $request->soalJSON;
      $Soal->save();
      return redirect()->back()->with('status', 'updated');
    }
}
