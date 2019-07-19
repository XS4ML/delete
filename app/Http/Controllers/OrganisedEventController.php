<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrganisedEvent;
use App\Http\Requests\CreateEventRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrganisedEventController extends Controller
{
  public function ShowOrganisedEvents()
  {
    $organised_events = OrganisedEvent::where('starting_at', '>=', Carbon::now())->orderBy('starting_at', 'ASC')->paginate(10);

    return view('events', ['organised_events' => $organised_events]);
  }

  public function ShowMyOrganisedEvents()
  {
    $organised_events = Auth::user()->OrganisedEvents()->paginate(10);

    return view('events', ['organised_events' => $organised_events]);
  }

  public function ShowOrganisedEvent($id)
  {
    $organised_event = OrganisedEvent::find($id);

    return view ('event', ['organised_event' => $organised_event]);
  }

  public function ShowCreateEvent()
  {
    return view('create_event');
  }

  public function CreateEvent(CreateEventRequest $request)
  {
    $attributes = collect($request->only(['name', 'venue', 'category', 'description']));
    $attributes->put('organiserId', Auth::user()->id);
    $attributes->put('starting_at', new Carbon($request->get('starting_at')));

    $organised_event = OrganisedEvent::create($attributes->toArray());

    return redirect()->route('home');
  }
}
