@extends('cms::layout.default')

@section('content')
  <div class="row">

    <a href="{{route('post.create', isset($template) ? ['template' => $template->slug] : null)}}" >
      + Create {{isset($template) ? $template->title : "post"}}
    </a>

    <div class="col-md-10 col-md-offset-0">
      @include("cms::layout.partial.list", [
      "id" => "post-overview",
      "title" => isset($template) ? $template->title : "Posts",
      "data" => $posts,
      'resource' => 'post',
      'list_params' =>
      [
      'title'   => ["route" => 'post.show', "label" => "Naam"],
      'author_name'  => ["route" => 'post.show', "label" => "Author"],
      'template_name' => "Template",
      'excerpt' => "In short"
      ]
      ])
    </div>
  </div>
@endsection
