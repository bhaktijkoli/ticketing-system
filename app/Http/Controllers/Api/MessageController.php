<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\AddMessageRequest;

use App\Events\NewMessage;

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
    $ticket = Ticket::find($request->input('ticket', '-1'));
    $message->ticket = $ticket->id;
    $message->created_by = Auth::user()->id;
    $message->message = $request->input('message', '');
    $message->save();
    event(new NewMessage($ticket, $message));
    return ResponseBuilder::send(true, "Message created.", "");
  }
  public function postSetRead(Request $request) {
    $message = Message::where('id', $request->input('message', '-1'))->first();
    if(!$message) abort(404);
    $message->read = '1';
    $message->save();
    return ResponseBuilder::send(true, "", "");
  }
}
