<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
  {!! Form::label("Title") !!}
  {!! Form::text("title", $model->title, ["class" => 'form-control']) !!}
  @if ($errors->has('title'))
    <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
  @endif
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
  {!! Form::label("slug") !!}
  {!! Form::text("slug", $model->slug, ["class" => 'form-control']) !!}
  @if ($errors->has('slug'))
    <span class="help-block"><strong>{{ $errors->first('slug') }}</strong></span>
  @endif
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
  {!! Form::label("Content") !!}
  {!! Form::textarea("content", $model->content, ["class" => 'form-control']) !!}
  @if ($errors->has('content'))
    <span class="help-block"><strong>{{ $errors->first('content') }}</strong></span>
  @endif
</div>
