<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  public function format()
  {
    $data['id'] = $this->id;
    $data['message'] = $this->message;
    $data['read'] = $this->read;
    $user = User::find($this->created_by);
    $data['created_by'] = $user->format();
    $data['created_at'] = $this->created_at;
    $data['created_at_format'] = $this->created_at->diffForHumans();
    $filesDetails = [];
    foreach ($this->files as $fileid) {
      $fp = FileUpload::find($fileid);
      $filesDetails.push($fp->format());
    }
    return $data;
  }
}
