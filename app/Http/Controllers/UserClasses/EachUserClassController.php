<?php
namespace App\Http\Controllers\UserClasses;

use Illuminate\Http\Request;
use App\Http\Models\Users\ClassesModel;
use App\Http\Models\Users\UserClass;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EachUserClassController extends Controller
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

  public function showClass(Request $request)
  {
      $class = ClassesModel::get();
      $userClass = UserClass::all();
      // mengloop value table classes
      foreach ($class as $val) {
        // looping user_class table values
        foreach ($userClass as $key) {
          // cek apakah kode akses sesuai dengan kode akses yang diinput user
          if ($val->id == $key->class_id && Auth::id() == $key->user_id) {
            // mengambil data user dari ClassesModel sesuai dengan user yg masuk
            $classId = ClassesModel::find($val->id);
            // menyimpan data dari table user_class
            $user_class = UserClass::find($key->id);
            // mendefinisikan user_id
            $ids = $val->id;
          }
        }
      }
      $userId = Auth::id();
      $id = $val->id;
      $data = $request->session()->all();
      // menyiapkan data untuk disimpan kedatabase menggunakan array
      $returnData = array(
        'Classes'   => $classId,
        'Sessions'  => $data,
        'Users'     => User::findOrFail($userId),
        'UserClass' => $user_class
      );
      // menampilkan view Kelas
      return view('Private.class', $returnData);
  }

  public function authClass(Request $request)
  {
    // mengambil id
    $id  = Auth::id();
    // mengambil data sesuai id dari table user_class
    $user_class = UserClass::find($id);
    // mengambil data sesuai kelas uses sesuai class yang tersedia dari table classes
    $classes = ClassesModel::find($user_class->class_id);
    // cek apakah kode akses sesuai dengan kode akses yang diinput user
    if ($request->authKey == $classes->class_key) {
      $from = $request->from;
        // mencari id dari tbl user_class kemudian mengupdate status 0->1
        $classData = UserClass::find($id);
        $classData->status = '1';
        $classData->save();
        // jika kode akses benar, return kehalaman sebelumnya
        if ( $from ) {
          return redirect()->route($from);
        }
        return redirect()->back();
    } else {
      return redirect('kelas')->with('authKey',$request->authKey);
    }

  }

}

 ?>
