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
          <gridcolumn size="6" > <panel title="Panel 2">{{Auth::user()->name}}</panel> </gridcolumn>
          <gridcolumn size="6" > <panel title="Panel 3">The body</panel> </gridcolumn>
        </gridrow>
    </gridcolumn>

    <gridcolumn size="4" > <panel title="Panel 4">The body</panel> </gridcolumn>
  </gridrow>
  <gridrow>
    <gridcolumn size="4"></gridcolumn>
    <gridcolumn size="4"></gridcolumn>
    <gridcolumn size="4"></gridcolumn>
  </gridrow>
</grid>
@endsection
