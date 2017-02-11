@extends('cms::layout.partial.panel')

@section('body-' . $id)

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

  <div class="form-group {{ $errors->has('label') ? 'has-error' : '' }}">
    {!! Form::label("Label") !!}
    {!! Form::text("label", $setting->label, ["class" => 'form-control']) !!}
    @if ($errors->has('label'))
    <span class="help-block"><strong>{{ $errors->first('label') }}</strong></span>
    @endif
  </div>

  <div class="form-group {{ $errors->has('subtext') ? 'has-error' : '' }}">
    {!! Form::label("subtext") !!}
    {!! Form::text("subtext", $setting->subtext, ["class" => 'form-control']) !!}
    @if ($errors->has('subtext'))
    <span class="help-block"><strong>{{ $errors->first('subtext') }}</strong></span>
    @endif
  </div>

  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label("key") !!}
    {!! Form::text("name", $setting->name, ["class" => 'form-control']) !!}
    @if ($errors->has('name'))
    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
    @endif
  </div>

  <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    {!! Form::label("Input Type") !!}
    {!! Form::select("type", ["text" => "text", "textarea" => "textarea", "dropdown" => "dropdown", "multiselect" => "multiselect", "date" => "date", "checkbox" => "checkbox", "radio" => "radio", "json" =>"json"], $setting->type, ["class" => 'form-control']) !!}
    @if ($errors->has('type'))
    <span class="help-block"><strong>{{ $errors->first('type') }}</strong></span>
    @endif
  </div>

  <div class="form-check {{ $errors->has('is_hidden') ? 'has-error' : '' }}">
    <label class="form-check-label">
      {!! Form::checkbox("is_hidden", 1, $setting->is_hidden, ["class" => 'form-check-input']) !!}
      Hide from user
      @if ($errors->has('is_hidden'))
      <span class="help-block"><strong>{{ $errors->first('is_hidden') }}</strong></span>
      @endif
    </label>
  </div>

  {!! Form::submit($setting->id ? 'Bijwerken' : "Opslaan") !!}
  {!! Form::close() !!}
  @stop
