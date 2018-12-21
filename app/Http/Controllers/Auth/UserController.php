<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Auth;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function getUser()
  {
    return Auth::user();
  }

}
