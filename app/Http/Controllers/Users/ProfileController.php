<?php
namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Models\Users\ClassesModel;
use App\Http\Models\Users\UserClass;
use App\Http\Models\Users\UserData;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public $timestamps = true;

    // JIka user masuk ke laman profile maka redirect ke profile/{username}
    public function ownProfile() {
      // ambil username
      $uName = Auth::user()->username;
      return redirect()->route('profile', ['username' => $uName]);
    }

    // Masukan ke View
    public function show($username)
    {
      $id      = Auth::id();
      $uName = Auth::user();

      $class = ClassesModel::get();
      $userClass = UserClass::all();
      // mengloop value table classes
      foreach ($class as $val) {
        // looping user_class table values
        foreach ($userClass as $key) {
          // cek apakah kode akses sesuai dengan kode akses yang diinput user
          if ($val->id == $key->class_id && $id == $key->user_id) {
            // mengambil data user dari ClassesModel sesuai dengan user yg masuk
            $classId = ClassesModel::find($val->id);
            // menyimpan data dari table user_cla
            $user_class = UserClass::find($key->id);
            // mendefinisikan user_id
            $ids = $val->id;
          }
        }
      }
      $returnData = array(
        'locData'   => DB::table('user_data')->get(),
        'Classes'   => $classId,
        'UserClass' => $user_class
      );
      // jika username tidak sama dengan username yang sedang login
      // redirect user ke halaman user lain dengan view yang berbeda
      if ($username != $uName->username) {
        // oUser = other users
        $oUser = DB::table('users')->get();
        foreach ($oUser as $val) {
          if ($username == $val->username) {
            $oId = $val->id;
          }
        }
        return view('Personal.othersProfile', ['Users'=> User::findOrFail($oId)]);
      }

      return view('Personal.profile', ['Users'=> User::findOrFail($id), 'userData' => $returnData]);
    }


    // Submit Database
    public function create(Request $request)
    {
      $isSame = UserData::where('currentLoc',$request->location )
                         ->where('user_id', $request->user_id)->get();
      $same    = $isSame->count();

      if ($same==1) {
        return redirect()->back()->with('msg', ['no action needed']);
      } else {
        // hapus yang punya user_id yang sama agar tidak double saat update
        DB::table('user_data')->where('user_id',$request->user_id)->delete();
        // update data ke database
        $userData = UserData::where('user_id',$request->user_id)->updateOrCreate([
          'user_id' => $request->user_id,
          'currentLoc' => $request->location
        ]);
         return redirect()->back();
      }
    }

}

 ?>
