@extends('cms::layout.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @include("cms::post.partial.basicinfo", [
            "id" => "basic-info",
            "title" => "Post: " . $post->title
          ])
        </div>
    </div>
</div>
@endsection
