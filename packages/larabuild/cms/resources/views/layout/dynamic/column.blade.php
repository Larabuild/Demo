<gridcolumn size="{{$column}}" row={{$row_key}} position={{$column_key}}>

  @foreach(collect($layout->content['panels'])->sortBy('position')->all() as $panel_key => $panel)
  @if(substr(implode("", $panel['position']),0,-1) == ($row_key . $column_key))

  @include("cms::layout.dynamic.panel", [
  "id" => str_slug($panel['title']),
  "title" => $panel['title'],
  "position" => $panel['position'],
  ])

  @endif
  @endforeach
</gridcolumn>
