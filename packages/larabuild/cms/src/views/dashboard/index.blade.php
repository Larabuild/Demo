@extends('cms::layout.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @include("cms::dashboard.partial.welcome", [
              "id" => "welcome2",
              "title" => "Welcome",
            ])
        </div>
        <div class="col-md-6">
            @include("cms::dashboard.partial.welcome", [
              "id" => "welcome2",
              "title" => "Welcome2",
            ])
        </div>
    </div>
</div>
@endsection
