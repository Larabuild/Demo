@extends('cms::layout.default')

@section('content')
    <div class="row">

      <a href="{{route('user.create')}}" >+ Create user</a>
        <div class="col-md-10 col-md-offset-0">
            @include("cms::layout.partial.list", [
              "id" => "post-overview",
              "title" => "All Posts",
              "data" => $users,
              'resource' => 'user',
              'list_params' =>
              [
                'name'   => ["route" => 'user.show', "label" => "Naam"],
              ]
            ])
        </div>
    </div>
@endsection
