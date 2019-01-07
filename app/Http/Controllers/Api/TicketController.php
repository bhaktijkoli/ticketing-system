<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\AddTicketRequest;

use App\User;
use App\Ticket;
use App\Message;
use App\ResponseBuilder;
use Auth;

class TicketController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function postAddTicket(AddTicketRequest $request)
  {
    $ticket = new Ticket();
    $ticket->subject = $request->input('subject', '');
    $ticket->created_by = Auth::user()->id;
    $ticket->generateToken();
    $ticket->save();
    $message = new Message();
    $message->ticket = $ticket->id;
    $message->created_by = Auth::user()->id;
    $message->message = $request->input('message', '');
    $message->save();
    return ResponseBuilder::send(true, "Ticket created.", "");
  }

  public function getUnassigned(Request $request)
  {
    $tickets = Ticket::where('enrolled_by', '-1')->latest()->get();
    $ticketsArray = [];
    foreach ($tickets as $t) {
      array_push($ticketsArray, $t->format());
    }
    return $ticketsArray;
  }

  public function getUserTickets(Request $request)
  {
    $tickets = Ticket::where('created_by', Auth::user()->id)->orWhere('enrolled_by', Auth::user()->id)->latest()->get();
    $ticketsArray = [];
    foreach ($tickets as $t) {
      array_push($ticketsArray, $t->format());
    }
    return $ticketsArray;
  }

  public function getDetails($id)
  {
    $ticket = Ticket::find($id);
    if(!$ticket) abort(404);
    return $ticket->format(true);
  }
}
