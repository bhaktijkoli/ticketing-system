<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  public function format() {
    $data['id'] = $this->id;
    $data['subject'] = $this->subject;
    $message = Message::where('ticket', $this->id)->latest()->first();
    $data['last_message'] = $message->format();
    $data['created_by'] = $this->created_by;
    $data['created_by_name'] = User::find($this->created_by)->name;
    $data['created_at'] = $this->created_at;
    $data['created_at_format'] = $this->created_at->diffForHumans();
    return $data;
  }
}
