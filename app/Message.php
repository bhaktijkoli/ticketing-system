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
    foreach (json_decode($this->files) as $fileid) {
      $fp = FileUpload::find($fileid);
      array_push($filesDetails, $fp->format());
    }
    $data['files'] = $filesDetails;
    return $data;
  }
}
