@extends('cms::layout.default')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @include("cms::template.partial.basicinfo", [
            "id" => "basic-info",
            "title" => "Template: " . $template->title
          ])
        </div>
    </div>
@endsection
