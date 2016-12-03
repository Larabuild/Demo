@extends('cms::layout.default')

@section('content')
<grid>
  <gridrow>
    <gridcolumn size="8" parent=true>
        <gridrow>
          <gridcolumn size="12" >
            @include("cms::dashboard.partial.welcome", [
            "id" => "welcome2",
            "title" => "Welcome",
            ])
           </gridcolumn>
        </gridrow>
        <gridrow>
          <gridcolumn size="6" > <panel title="Panel 2"><div class="panel-inner">{{Auth::user()->name}}</div></panel></gridcolumn>
          <gridcolumn size="6" > <panel title="Panel 3"><div class="panel-inner">The body</div></panel></gridcolumn>
        </gridrow>
    </gridcolumn>

    <gridcolumn size="4" > <panel title="Panel 1"><div class="panel-inner">The body</div></panel></gridcolumn>
  </gridrow>
  <gridrow>
    <gridcolumn size="4"></gridcolumn>
    <gridcolumn size="4"></gridcolumn>
    <gridcolumn size="4"></gridcolumn>
  </gridrow>
</grid>
@endsection
