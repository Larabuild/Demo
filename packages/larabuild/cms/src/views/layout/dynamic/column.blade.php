<gridcolumn size="{{$column}}" row={{$row_key}} position={{$column_key}}>

  @foreach($layout->content['panels'] as $panel_key => $panel)
  @if(substr(implode("", $panel['position']),0,-1) == ($row_key . $column_key))

  @include("cms::layout.dynamic.panel", [
  "id" => str_slug($panel['title']),
  "title" => $panel['title'],
  ])

  @endif
  @endforeach
</gridcolumn>
