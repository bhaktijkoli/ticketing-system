<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;

use App\User;
use App\ResponseBuilder;

class UserController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }
  public function postAddUser(AddUserRequest $request) {
    $user = new User();
    $user->name = $request->input('name', '');
    $user->email = $request->input('email', '');
    $user->password = Hash::make($request->input('password', ''));
    $user->role = $request->input('role', '2');
    $user->save();
    return ResponseBuilder::send(true, "User created.", "");
  }
  public function postEditUser(EditUserRequest $request) {
    $user = User::find($request->input('user', '-1'));
    if(!$user) return abort(404, "User Not Found");
    $user->name = $request->input('name', '');
    $user->email = $request->input('email', '');
    $user->role = $request->input('role', '2');
    $password = $request->input('password', '');
    if(strlen($password) > 1) {
      $user->password = Hash::make($password);
    }
    $user->save();
    return ResponseBuilder::send(true, "User edited.", "");
  }

  public function getAllUsers() {
    return User::all();
  }

  public function getDetails($id) {
    $user = User::find($id);
    if(!$user) abort(404, "User Not Found");
    return $user->format();
  }
}
