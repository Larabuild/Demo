@extends("cms::layout.partial.panel")

@section('body')
Welcome back {{Auth::user()->name}}!
@stop
