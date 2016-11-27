@extends('cms::layout.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @include("cms::setting.partial.createform", [
            "id" => "create-setting",
            "title" => "Setting: " . $setting->label
          ])
        </div>
    </div>
</div>
@endsection
