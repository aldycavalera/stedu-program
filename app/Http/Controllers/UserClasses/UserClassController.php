<?php

namespace App\Http\Controllers\UserClasses;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class UserClassController extends Controller
{
  public function retrieveFields()
  {
    $classFields = DB::table('classes')->get();
    return view('auth.register', ['classes'=>$classFields]);
  }

  public function userClass($classId)
  {
    return dd('comiing');
  }

}

 ?>
