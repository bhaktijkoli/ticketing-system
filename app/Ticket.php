<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  public function format($all=false) {
    $data['id'] = $this->id;
    $data['subject'] = $this->subject;
    $data['token'] = $this->token;
    $data['status'] = $this->status;
    if($all) {
      $messages = Message::where('ticket', $this->id)->get();
      $messagesArr = [];
      foreach ($messages as $m) {
        array_push($messagesArr, $m->format());
      }
      $data['messages'] = $messagesArr;
    } else {
      $message = Message::where('ticket', $this->id)->latest()->first();
      $data['last_message'] = $message->format();
    }
    $data['created_by'] = User::find($this->created_by)->format();
    $data['created_at'] = $this->created_at;
    $data['created_at_format'] = $this->created_at->diffForHumans();
    $data['created_at_format_long'] = $this->created_at->format('F j, Y');
    return $data;
  }

  public function generateToken() {
    do {
      $token = str_random(60);
      $ticket = Ticket::where('token', $token)->first();
    } while($ticket);
    $this->token = $token;
  }
}
