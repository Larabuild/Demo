@extends('cms::layout.partial.panel')

@section('body')

{!! Form::open([
  'route' => $template->id ? ['template.update', $template->id] : 'template.store',
  'method' => $template->id ? 'put' : 'template']) !!}
{!! Form::token() !!}

{!! Form::hidden("user_id", Auth::user()->id) !!}

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
  {!! Form::label("Title") !!}
  {!! Form::text("title", $template->title, ["class" => 'form-control']) !!}
  @if ($errors->has('title'))
    <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
  @endif
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
  {!! Form::label("Description") !!}
  {!! Form::textarea("description", $template->description, ["class" => 'form-control']) !!}
  @if ($errors->has('description'))
    <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
  @endif
</div>

@if($template->id)
<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
  {!! Form::label("slug") !!}
  {!! Form::text("slug", $template->slug, ["class" => 'form-control']) !!}
  @if ($errors->has('slug'))
    <span class="help-block"><strong>{{ $errors->first('slug') }}</strong></span>
  @endif
</div>
<div class="form-group {{ $errors->has('view') ? 'has-error' : '' }}">
  {!! Form::label("view") !!}
  {!! Form::text("view", $template->view, ["class" => 'form-control']) !!}
  @if ($errors->has('view'))
    <span class="help-block"><strong>{{ $errors->first('view') }}</strong></span>
  @endif
</div>
@endif

{!! Form::submit($template->id ? 'Bijwerken' : "Opslaan") !!}
{!! Form::close() !!}
@stop
