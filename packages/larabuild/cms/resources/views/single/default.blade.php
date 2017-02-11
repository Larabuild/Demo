@extends('cms::layout.default')

@section('content')

@if($model['layout']->table_name)
{!! Form::open([
  'route' => $model->id ? ['post.update', $model->id] : 'post.store',
  'method' => $model->id ? 'put' : 'post']) !!}
{!! Form::token() !!}

{!! Form::hidden("user_id", Auth::user()->id) !!}


<div class="row">
{!! Form::submit($model->id ? 'Bijwerken' : "Opslaan") !!}
</div>
@endif

@include('cms::layout.dynamic.grid')

@if($model['layout']->table_name)
{!! Form::close() !!}
@endif


@endsection
