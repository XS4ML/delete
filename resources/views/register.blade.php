@extends('template')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="{{ route('register_user') }}" method="POST">
          {{ csrf_field() }}

          <?php
            $name_error_messages = [];
            $email_error_messages = [];
            $password_error_messages = [];
            $password_confirmation_error_messages = [];
            $account_type_error_messages = [];

            foreach($errors->getMessages() as $field_name => $error_messages)
            {
              if ($field_name === 'name') {
                $name_error_messages = $error_messages;
              }
              if ($field_name === 'email') {
                $email_error_messages = $error_messages;
              }
              if ($field_name === 'password') {
                $password_error_messages = $error_messages;
              }
              if ($field_name === 'password_confirmation') {
                $passwordConfirmation_error_messages = $error_messages;
              }
              if ($field_name === 'account_type') {
                $account_type_error_messages = $error_messages;
              }
            }
          ?>

          <div class="form-group {{ $name_error_messages ? 'has-error' : '' }}">
            <label>Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @foreach ($name_error_messages as $message)
              <span class="text-danger">{{ $message }}</span>
            @endforeach
          </div>
          <div class="form-group {{ $email_error_messages ? 'has-error' : '' }}">
            <label>Email <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
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
          <div class="form-group {{ $password_confirmation_error_messages ? 'has-error' : '' }}">
            <label>Confirm Password <span class="text-danger">*</span></label>
            <input type="password" name="password_confirmation" class="form-control" value="">
            @foreach ($password_confirmation_error_messages as $message)
              <span class="text-danger">{{ $message }}</span>
            @endforeach
          </div>
          <div class="form-group {{ $account_type_error_messages ? 'has-error' : '' }}">
            <label>Account Type <span class="text-danger">*</span></label>
            <br>
            <input type="radio" name="account_type" value="student" {{ old('account_type') == 'student' ? 'checked' : '' }}> Student
            <input type="radio" name="account_type" value="organiser" {{ old('account_type') == 'organiser' ? 'checked' : '' }}> Organiser

            @foreach ($account_type_error_messages as $message)
              <span class="text-danger">{{ $message }}</span>
            @endforeach
          </div>
          <div class="form-group" align="right">
            <input type="submit" class="btn btn-primary" value="Register">
          </div>
          <p align="right">Already have an account? <a href="{{ route('login') }}">Login here</a>.</p>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
