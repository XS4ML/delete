@extends('template')

@section('content')
<div class="container-fluid">
  <div class="row">
    @if (empty($organised_events))
      <h1 class="text-muted">No events found.</h1>
    @endif
    @foreach ($organised_events as $oe)
    <div class="col-sm-2 d-flex align-items-stretch">
      <div class="card" style="width: 16rem;">
        <img class="card-img-top" src="{{ asset('/img/placeholder_image.png') }}" alt="Card image cap">
        <div class="card-body" style="padding-bottom: 100px;">
          <span style="display: inline-block">
            <h5 class="card-title" style="font-size: 18px; display: inline;">{{ $oe->name }}</h5><p class="text-muted" style="display: inline; font-size: 14px; margin-left: 5px;">({{ $oe->organiser->name }})</p>
          </span>
          <div style="margin-top: 10px;">
            <p class="text-muted" style="font-size: 14px;">{{ $oe->starting_at }}</p>
            <p class="card-text" style="font-size: 12px;">{{ strlen($oe->description) > 300 ? substr($oe->description, 0, 200) . '...' : $oe->description }}</p>
          </div>
          <div style="position: absolute; bottom: 70px; width: 100%;">
            <div style="position: relative; width: 80%; left -50%;">
              <hr>
            </div>
          </div>
          <div style="position: absolute; bottom: 35px; left: 50%;">
            <div style="position: relative; left: -50%;">
              <p class="text-muted" style="font-size: 14px;" align="center">{{ $oe->starting_at->diffForHumans() }}</p>
            </div>
          </div>
          <div style="position: absolute; bottom: 10px; left: 50%;">
            <div style="position: relative; left: -50%;">
              <a href="{{ route('show_event', ['id' => $oe->id]) }}" class="btn btn-warning">View Event</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="row" style="margin-top: 25px;">
    <div style="margin: 0 auto;">
      {{ $organised_events->links('vendor.pagination.bootstrap-4') }}
    </div>
  </div>
</div>
@endsection
