<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Event Tracker</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <!-- Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">{{ Auth::check() ? 'Welcome, ' . Auth::user()->name : 'Aston Events' }}</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="{{ route('events') }}">Events</a>
    </nav>
    @if (Auth::check())
      @if (Auth::user()->account_type == 'organiser')
        <a class="btn btn-outline-success" href="{{ route('show_my_events') }}" style="margin-right: 10px;">My Events</a>
        <a class="btn btn-outline-success" href="{{ route('show_create_event') }}" style="margin-right: 10px;">Create Event</a>
      @endif

      <a class="btn btn-outline-danger" href="{{ route('logout_user') }}">Sign out</a>
    @else
      <a class="btn btn-outline-primary" href="{{ route('login') }}">Login/Register</a>
    @endif
  </div>

  @yield('content')

  <!-- Bootstrap -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
