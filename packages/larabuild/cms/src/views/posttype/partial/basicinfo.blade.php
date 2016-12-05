@extends('cms::layout.partial.panel')

@section('body')

{!! Form::open([
  'route' => $posttype->id ? ['posttype.update', $posttype->id] : 'posttype.store',
  'method' => $posttype->id ? 'put' : 'post']) !!}
{!! Form::token() !!}

{!! Form::hidden("user_id", Auth::user()->id) !!}

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
  {!! Form::label("Title") !!}
  {!! Form::text("title", $posttype->title, ["class" => 'form-control']) !!}
  @if ($errors->has('title'))
    <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
  @endif
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
  {!! Form::label("Description") !!}
  {!! Form::textarea("description", $posttype->description, ["class" => 'form-control']) !!}
  @if ($errors->has('description'))
    <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
  @endif
</div>

@if($posttype->id)
<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
  {!! Form::label("slug") !!}
  {!! Form::text("slug", $posttype->slug, ["class" => 'form-control']) !!}
  @if ($errors->has('slug'))
    <span class="help-block"><strong>{{ $errors->first('slug') }}</strong></span>
  @endif
</div>
<div class="form-group {{ $errors->has('view') ? 'has-error' : '' }}">
  {!! Form::label("view") !!}
  {!! Form::text("view", $posttype->view, ["class" => 'form-control']) !!}
  @if ($errors->has('view'))
    <span class="help-block"><strong>{{ $errors->first('view') }}</strong></span>
  @endif
</div>
@endif

{!! Form::submit($posttype->id ? 'Bijwerken' : "Opslaan") !!}
{!! Form::close() !!}
@stop
