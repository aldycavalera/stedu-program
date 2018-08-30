<?php
namespace App\Http\Controllers\UserClasses;

use Illuminate\Http\Request;
use App\Http\Models\Users\ClassesModel;
use App\Http\Models\Users\UserClass;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 *
 */
class ClassAdminController extends Controller
{
  public function showAdmin()
  {
    $userId = Auth::id();
    $Users  = User::find($userId);
    $Class  = ClassesModel::find($Users->userClass);
    if ($Users->role == '1') {
      return redirect()->route('classes');
    } elseif($Users->role == '2') {
      return view('Private.admin', ['Class' => $Class]);
    }
  }

}


 ?>
