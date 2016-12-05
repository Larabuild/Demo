@extends('cms::layout.default')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @include("cms::posttype.partial.basicinfo", [
            "id" => "basic-info",
            "title" => "Post Type: " . $posttype->title
          ])
        </div>
    </div>
@endsection
