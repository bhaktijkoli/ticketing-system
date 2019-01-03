<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  public function format($all=false) {
    $data['id'] = $this->id;
    $data['subject'] = $this->subject;
    if($all) {
      $messages = Message::where('ticket', $this->id)->latest()->get();
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
}
