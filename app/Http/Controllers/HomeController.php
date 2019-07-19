<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrganisedEvent;

class HomeController extends Controller
{
  public function ShowHomePage()
  {
    return redirect()->route('events');
  }
}
