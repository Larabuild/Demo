@extends('cms::layout.partial.panel')

@section('body')

{!! Form::open([
  'route' => $post->id ? ['post.update', $post->id] : 'post.store',
  'method' => $post->id ? 'put' : 'post']) !!}
{!! Form::token() !!}

{!! Form::hidden("user_id", Auth::user()->id) !!}

@if(!$post->id)
@if(!isset($template_id))
<div class="form-group {{ $errors->has('template_id') ? 'has-error' : '' }}">
  {!! Form::label("Template") !!}
  {!! Form::select("template_id", $templates->pluck("title", "id"), $post->template_id, ["class" => 'form-control']) !!}
</div>
@else
{!! Form::hidden("template_id", $template_id) !!}
@endif
@endif

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
  {!! Form::label("Title") !!}
  {!! Form::text("title", $post->title, ["class" => 'form-control']) !!}
  @if ($errors->has('title'))
    <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
  @endif
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
  {!! Form::label("slug") !!}
  {!! Form::text("slug", $post->slug, ["class" => 'form-control']) !!}
  @if ($errors->has('slug'))
    <span class="help-block"><strong>{{ $errors->first('slug') }}</strong></span>
  @endif
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
  {!! Form::label("Content") !!}
  {!! Form::textarea("content", $post->content, ["class" => 'form-control']) !!}
  @if ($errors->has('content'))
    <span class="help-block"><strong>{{ $errors->first('content') }}</strong></span>
  @endif
</div>

{!! Form::submit($post->id ? 'Bijwerken' : "Opslaan") !!}
{!! Form::close() !!}
@stop
