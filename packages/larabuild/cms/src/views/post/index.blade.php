@extends('cms::layout.default')

@section('content')
  <div class="row">

    <a href="{{route('post.create', isset($posttype) ? ['type' => $posttype->slug] : null)}}" >
      + Create {{isset($posttype) ? $posttype->title : "post"}}
    </a>

    <div class="col-md-10 col-md-offset-0">
      @include("cms::layout.partial.list", [
      "id" => "post-overview",
      "title" => isset($posttype) ? $posttype->title : "Posts",
      "data" => $posts,
      'resource' => 'post',
      'list_params' =>
      [
      'title'   => ["route" => 'post.show', "label" => "Naam"],
      'author_name'  => ["route" => 'post.show', "label" => "Author"],
      'posttype_name' => "Post Type",
      'excerpt' => "In short"
      ]
      ])
    </div>
  </div>
@endsection
