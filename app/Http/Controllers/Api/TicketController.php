<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\AddTicketRequest;

use App\User;
use App\Ticket;
use App\Message;
use App\FileUpload;
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
    $filesID = [];
    $files = $request->files;
    if($files) {
      foreach ($files as $file) {
        $fp = new FileUpload();
        $fp->uploadFile($file);
        $fp->user = Auth::user()->id;
        $fp->save();
        array_push($filesID, $fp->id);
      }
    }
    $message->files = json_encode($filesID);
    $message->save();
    return ResponseBuilder::send(true, "Ticket created.", "");
  }

  public function postStatus(Request $request)
  {
    $ticket = Ticket::find($request->input('ticket', '-1'));
    if(!$ticket) abort(404);
    $ticket->status = $request->input('status', '1');
    $ticket->save();
    return ResponseBuilder::send(true, "", "");
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
