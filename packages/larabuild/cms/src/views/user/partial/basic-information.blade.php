@extends("cms::layout.partial.panel")

@section('body')
{!! Form::open([
  'route' => $user->id ? ['user.update', $user->id] : 'user.store',
  'method' => $user->id ? 'put' : 'post']) !!}
  {!! Form::token() !!}

  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label("Name") !!}
    {!! Form::text("name", $user->name, ["class" => 'form-control']) !!}
    @if ($errors->has('name'))
    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
    @endif
  </div>

  <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
    {!! Form::label("Username") !!}
    {!! Form::text("username", $user->username, ["class" => 'form-control']) !!}
    @if ($errors->has('username'))
    <span class="help-block"><strong>{{ $errors->first('username') }}</strong></span>
    @endif
  </div>

  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    {!! Form::label("E-mailaddress") !!}
    {!! Form::text("email", $user->email, ["class" => 'form-control']) !!}
    @if ($errors->has('email'))
    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
    @endif
  </div>

  <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    {!! Form::label("Password") !!}
    {!! Form::password("password", ["class" => 'form-control']) !!}
    @if ($errors->has('password'))
    <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
    @endif
  </div>

  <div class="form-group">
    {!! Form::label("Confirm password") !!}
    {!! Form::password("password_confirmation", ["class" => 'form-control']) !!}
  </div>

  {!! Form::submit($user->id ? 'Bijwerken' : "Opslaan") !!}
  {!! Form::close() !!}
  @stop
