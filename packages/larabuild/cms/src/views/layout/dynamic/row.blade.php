<gridrow>
    @foreach($row as $column_key => $column)
    @include('cms::layout.dynamic.column')
    @endforeach
</gridrow>
