<grid layout="{{$layout->id}}">
  @foreach($layout->content['matrix'] as $row_key => $row)
  @include('cms::layout.dynamic.row')
  @endforeach
</grid>
