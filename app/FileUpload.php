<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use File;

class FileUpload extends Model
{
  private $path = "/public/files";
  public function getUrl() {
    return url($this->path . $this->filename);
  }

  public function uploadFile($file)
  {
    $this->checkDirs();
    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path($this->path), $filename);
    $this->name = $file->getClientOriginalName();
    $this->filename = $filename;
    return $filename;
  }

  public function checkDirs() {
    $pathDir = public_path($this->path);
    File::isDirectory($pathDir) or File::makeDirectory($pathDir, 0777, true, true);
  }

  public function deleteFile()
  {
    $pathDir = public_path($this->path);
    File::delete($pathDir . $this->filename);
  }

}
