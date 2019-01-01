<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  public function format()
  {
    $data['id'] = $this->id;
    $data['message'] = $this->message;
    $user = User::find($this->created_by);
    $data['created_by'] = $user->format();
    $data['created_at'] = $this->created_at;
    $data['created_at_format'] = $this->created_at->diffForHumans();
    return $data;
  }
}
