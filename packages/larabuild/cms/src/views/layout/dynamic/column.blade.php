<gridcolumn size="{{$column}}">

  @foreach($layout['panels'] as $panel_key => $panel)
  @if(implode("", $panel['position']) == ($row_key . $column_key))

  @include("cms::layout.dynamic.panel", [
  "id" => str_slug($panel['title']),
  "title" => $panel['title'],
  ])

  @endif
  @endforeach
</gridcolumn>
