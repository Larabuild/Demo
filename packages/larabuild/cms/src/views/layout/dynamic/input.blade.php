@if(isset($model[$data['key']]))

<div class="form-group {{ $errors->has($data['key']) ? 'has-error' : '' }}">
  {!! Form::label("Label") !!}
  {!! Form::text($data['key'], $model[$data['key']], ["class" => 'form-control']) !!}
  @if ($errors->has($data['key']))
    <span class="help-block"><strong>{{ $errors->first($data['key']) }}</strong></span>
  @endif
</div>

@endif
