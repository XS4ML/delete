<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password', 'account_type'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * Set the user's password.
   *
   * @param  string  $value
   * @return void
   */
  public function setPasswordAttribute($value)
  {
    $this->attributes['password'] = Hash::make($value);
  }

  /**
   * Get the user that owns the organised event.
   */
  public function OrganisedEvents()
  {
    return $this->hasMany('App\OrganisedEvent', 'organiserId');
  }
}
