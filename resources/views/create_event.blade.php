@extends('template')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="wrapper">
        <h2>Create an event</h2>

        <form action="{{ route('create_event') }}" method="POST">
          {{ csrf_field() }}

          <?php
            $name_error_messages = [];
            $venue_error_messages = [];
            $category_error_messages = [];
            $starting_at_error_messages = [];
            $description_error_messages = [];

            foreach($errors->getMessages() as $field_name => $error_messages)
            {
              if ($field_name === 'name') {
                $name_error_messages = $error_messages;
              }
              if ($field_name === 'venue') {
                $venue_error_messages = $error_messages;
              }
              if ($field_name === 'category') {
                $category_error_messages = $error_messages;
              }
              if ($field_name === 'starting_at') {
                $starting_at_error_messages = $error_messages;
              }
              if ($field_name === 'description') {
                $description_error_messages = $error_messages;
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

          <div class="form-group {{ $venue_error_messages ? 'has-error' : '' }}">
            <label>Venue <span class="text-danger">*</span></label>
            <input type="text" name="venue" class="form-control" value="{{ old('venue') }}">
            @foreach ($venue_error_messages as $message)
              <span class="text-danger">{{ $message }}</span>
            @endforeach
          </div>

          <div class="form-group {{ $category_error_messages ? 'has-error' : '' }}">
            <label>Category <span class="text-danger">*</span></label>
            <select class="custom-select" name="category">
              <option {{ old('category') ? 'selected' : '' }} disabled>Please select</option>
              <option value="sport" {{ old('category') == 'sport' ? 'selected' : '' }}>Sport</option>
              <option value="culture" {{ old('category') == 'culture' ? 'selected' : '' }}>Culture</option>
              <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            @foreach ($category_error_messages as $message)
              <span class="text-danger">{{ $message }}</span>
            @endforeach
          </div>

          <div class="form-group {{ $starting_at_error_messages ? 'has-error' : '' }}">
            <div style="display: inline-block;">
              <label style="display: inline;">Starting At <span class="text-danger">*</span></label>
              <p class="text-warning" style="display: inline;"><small>24 Hour clock format</small></p>
            </div>
            <input type="datetime-local" name="starting_at" class="form-control" value="{{ old('starting_at') }}">
            @foreach ($starting_at_error_messages as $message)
              <span class="text-danger">{{ $message }}</span>
            @endforeach
          </div>

          <div class="form-group {{ $description_error_messages ? 'has-error' : '' }}">
            <label>Description <span class="text-danger">*</span></label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            @foreach ($description_error_messages as $message)
              <span class="text-danger">{{ $message }}</span>
            @endforeach
          </div>

          <div class="form-group" align="right">
            <input type="submit" class="btn btn-primary" value="Create">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
