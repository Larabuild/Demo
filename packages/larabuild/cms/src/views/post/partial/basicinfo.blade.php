@extends('cms::layout.partial.panel')

@section('body')



@if(!$post->id)
@if(!isset($type_id))
<div class="form-group {{ $errors->has('posttype_id') ? 'has-error' : '' }}">
  {!! Form::label("posttype") !!}
  {!! Form::select("posttype_id", $posttypes->pluck("title", "id"), $post->posttype_id, ["class" => 'form-control']) !!}
</div>
@else
{!! Form::hidden("type_id", $type_id) !!}
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

@stop
