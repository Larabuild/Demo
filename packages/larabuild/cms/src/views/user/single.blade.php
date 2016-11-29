@extends('cms::layout.default')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @include("cms::user.partial.basic-information", [
              "id" => "basic-info",
              "title" => "Basic Information",
            ])
        </div>
    </div>
@endsection
