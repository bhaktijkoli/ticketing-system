<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\AddMessageRequest;

use App\User;
use App\Ticket;
use App\Message;
use App\ResponseBuilder;
use Auth;

class MessageController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function postAddMessage(AddMessageRequest $request)
  {
    $message = new Message();
    $message->ticket = $ticket;
    $message->created_by = Auth::user()->id;
    $message->message = $request->input('message', '');
    $message->save();
    return ResponseBuilder::send(true, "Message created.", "");
  }
}
