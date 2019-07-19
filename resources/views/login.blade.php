@extends('template')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="wrapper">
        <h2>Login</h2>
        <p>Please login.</p>
        <form action="{{ route('login_user') }}" method="POST">
          {{ csrf_field() }}

          <?php
            $credentials_incorrect_error_messages = [];
            $email_error_messages = [];
            $password_error_messages = [];

            foreach($errors->getMessages() as $field_name => $error_messages)
            {
              if ($field_name === 'failed') {
                $credentials_incorrect_error_messages = $error_messages;
              }
              if ($field_name === 'email') {
                $email_error_messages = $error_messages;
              }
              if ($field_name === 'password') {
                $password_error_messages = $error_messages;
              }
            }
          ?>

          <ul>
            @foreach ($credentials_incorrect_error_messages as $error_message)
              <li class="text-danger">{{ $error_message }}</li>
            @endforeach
          </ul>

          <div class="form-group {{ $email_error_messages ? 'has-error' : '' }}">
            <label>Email <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control" value="{{ $user ? $user->email : '' }}">
            @foreach ($email_error_messages as $message)
              <span class="text-danger">{{ $message }}</span>
            @endforeach
          </div>
          <div class="form-group {{ $password_error_messages ? 'has-error' : '' }}">
            <label>Password <span class="text-danger">*</span></label>
            <input type="password" name="password" class="form-control" value="">
            @foreach ($password_error_messages as $message)
              <span class="text-danger">{{ $message }}</span>
            @endforeach
          </div>
          <div class="form-group" align="center">
            <input type="submit" class="btn btn-primary" value="Login">
            <a class="btn btn-default" href="{{ route('register') }}">Register</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
