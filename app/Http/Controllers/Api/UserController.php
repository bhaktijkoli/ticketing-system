<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\AddUserRequest;

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

  public function getAllUsers() {
    return User::all();
  }
}
