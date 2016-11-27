@extends('cms::layout.default')

@section('content')
<div class="container">
    <div class="row">
      <a href="{{route('setting.create')}}" >+ Create setting</a>
        <div class="col-md-10 col-md-offset-0">

          <ul class="nav nav-tabs">
            @foreach($bundles as $bundle)
            <li class="nav-item">
              <a class="nav-link" href="{{route("setting.bundle.show", $bundle->bundle)}}">{{$bundle->bundle}}</a>
            </li>
            @endForeach
          </ul>

            @include("cms::layout.partial.list", [
              "id" => "settings-overview",
              "title" => "All settings",
              "data" => $settings,
              'resource' => 'setting',
              'list_params' =>
              [
                'title'   => "Label",
                'description' => "Description",
                'value' => "Value",
              ]
            ])
        </div>
    </div>
</div>
@endsection
