<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function __construct() {
    $this->middleware('guest');
  }
  public function getLogin() {
    return view('login');
  }
}
