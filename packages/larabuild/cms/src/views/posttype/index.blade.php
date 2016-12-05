@extends('cms::layout.default')

@section('content')
    <div class="row">

      <a href="{{route('posttype.create')}}" >+ Create Post Type</a>
        <div class="col-md-10 col-md-offset-0">
            @include("cms::layout.partial.list", [
              "id" => "posttype-overview",
              "title" => "All Post Types",
              "data" => $posttype,
              'resource' => 'posttype',
              'list_params' =>
              [
                'title'   => ["route" => 'posttype.show', "label" => "Naam"],
                'slug'   => "slug",
                'view'   => "view",
              ]
            ])
        </div>
    </div>
@endsection
