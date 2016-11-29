@extends('cms::layout.default')

@section('content')
    <div class="row">

      <a href="{{route('template.create')}}" >+ Create template</a>
        <div class="col-md-10 col-md-offset-0">
            @include("cms::layout.partial.list", [
              "id" => "template-overview",
              "title" => "All Templates",
              "data" => $templates,
              'resource' => 'template',
              'list_params' =>
              [
                'title'   => ["route" => 'template.show', "label" => "Naam"],
                'slug'   => "slug",
                'view'   => "view",
              ]
            ])
        </div>
    </div>
@endsection
