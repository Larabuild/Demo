@extends('cms::layout.partial.panel')

@section('body')

{!! Form::open([
  'route' => $setting->id ? ['setting.update', $setting->id] : 'setting.store',
  'method' => $setting->id ? 'put' : 'setting']) !!}
{!! Form::token() !!}

{!! Form::hidden("user_id", Auth::user()->id) !!}

<div class="form-group {{ $errors->has('bundle') ? 'has-error' : '' }}">
  {!! Form::label("Bundle") !!}
  {!! Form::text("bundle", $setting->bundle, ["class" => 'form-control']) !!}
  @if ($errors->has('bundle'))
    <span class="help-block"><strong>{{ $errors->first('bundle') }}</strong></span>
  @endif
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
  {!! Form::label("Title") !!}
  {!! Form::text("title", $setting->title, ["class" => 'form-control']) !!}
  @if ($errors->has('title'))
    <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
  @endif
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
  {!! Form::label("description") !!}
  {!! Form::text("description", $setting->description, ["class" => 'form-control']) !!}
  @if ($errors->has('description'))
    <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
  @endif
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  {!! Form::label("key") !!}
  {!! Form::text("name", $setting->name, ["class" => 'form-control']) !!}
  @if ($errors->has('name'))
    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
  @endif
</div>

<div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
  {!! Form::label("Value") !!}
  {!! Form::text("value", $setting->value, ["class" => 'form-control']) !!}
  @if ($errors->has('value'))
    <span class="help-block"><strong>{{ $errors->first('value') }}</strong></span>
  @endif
</div>

{!! Form::submit($setting->id ? 'Bijwerken' : "Opslaan") !!}
{!! Form::close() !!}
@stop
