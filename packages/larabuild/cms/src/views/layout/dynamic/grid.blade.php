<grid>
  @foreach($layout['matrix'] as $row_key => $row)
  @include('cms::layout.dynamic.row')
  @endforeach
</grid>
