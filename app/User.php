<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function format() {
      $data['id'] = $this->id;
      $data['name'] = $this->name;
      $data['email'] = $this->email;
      $data['role'] = $this->role;
      $data['created_at'] = $this->created_at;
      $data['created_at_format'] = $this->created_at->diffForHumans();
      return $data;
    }
}
