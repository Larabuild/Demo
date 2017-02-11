@extends("cms::layout.partial.panel", [
  'id' => $panel_key
])

@section('body-' . $panel_key)

@foreach($panel['data'] as $data)

@if(isset($data['content']))
{!! $data['content'] !!}

@elseif(isset($data['view']))
@include($data['view'])

@elseif(isset($data['key']))
@include('cms::layout.dynamic.input')

@endif

@endforeach

@stop
