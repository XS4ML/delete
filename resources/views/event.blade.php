@extends('template')

@section('content')

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
  <div style="z-index: -1; display: block; height: 300px; line-height: 300px; overflow: hidden;">
    <img style="width: 100%; height: auto; margin: -50% auto; vertical-align:middle;" src="{{ asset('/img/placeholder_image.png') }}" alt="Card image cap" style="margin-top: -350px;">
  </div>
  <div class="col-md-8 p-lg-8 mx-auto my-5">
    <h1 class="display-4 font-weight-normal">{{ $organised_event->name }}</h1>
    <p class="lead font-weight-normal">{{ $organised_event->starting_at->diffForHumans() }} ({{ $organised_event->starting_at }})</p>
    <p align="left">{{ $organised_event->description }}</p>
  </div>
</div>
@endsection
