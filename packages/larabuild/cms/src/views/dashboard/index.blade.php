@extends('cms::layout.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include("cms::dashboard.partial.welcome", [
              "id" => "welcome2",
              "title" => "Welcome",
            ])
        </div>
          <example></example>
    </div>
</div>
@endsection
