<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganisedEvent extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'starting_at', 'description', 'organiserId', 'venue'
  ];

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = [
    'starting_at',
  ];

  /**
   * Get the user that owns the organised event.
   */
  public function organiser()
  {
    return $this->belongsTo('App\User', 'organiserId');
  }
}
