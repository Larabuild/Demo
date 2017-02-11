@extends('cms::layout.default')

@section('content')
<grid>
  <gridrow>
    <gridcolumn size="4">
        @include("cms::dashboard.partial.welcome", [
        "id" => "welcome2",
        "title" => "Welcome",
        ])
    </gridcolumn>
    <gridcolumn size="4" > <panel title="Panel 1"><div class="panel-inner">The body</div></panel></gridcolumn>
    <gridcolumn size="4" > <panel title="Panel 1"><div class="panel-inner">The body</div></panel></gridcolumn>
  </gridrow>
  <gridrow>
    <gridcolumn size="8">
      @include("cms::dashboard.partial.welcome", [
      "id" => "welcome2",
      "title" => "Welcome",
      ])
    </gridcolumn>
    <gridcolumn size="4" > <panel title="Panel 1"><div class="panel-inner">The body</div></panel></gridcolumn>
  </gridrow>
  <gridrow>
    <gridcolumn size="6">
      @include("cms::dashboard.partial.welcome", [
      "id" => "welcome2",
      "title" => "Welcome",
      ])
    </gridcolumn>
    <gridcolumn size="6" > <panel title="Panel 1"><div class="panel-inner">The body</div></panel></gridcolumn>
  </gridrow>
</grid>
@endsection
