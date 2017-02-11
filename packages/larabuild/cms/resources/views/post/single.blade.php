@extends('cms::layout.default')

@section('content')
{!! Form::open([
  'route' => $model->id ? ['post.update', $model->id] : 'post.store',
  'method' => $model->id ? 'put' : 'post']) !!}
{!! Form::token() !!}

{!! Form::hidden("user_id", Auth::user()->id) !!}

<grid>
  <gridrow>
    <gridcolumn size="8">
      @include("cms::post.partial.basicinfo", [
      "id" => "basic-info",
      "title" => (isset($model->template) ? $model->template->title . ": " : "Post: ") . $model->title
      ])
    </gridcolumn>
    <gridcolumn size="4">
      @include("cms::dashboard.partial.welcome2", [
      "id" => "basic-info",
      "title" => (isset($model->template) ? $model->template->title . ": " : "Post: ") . $model->title
      ])
    </gridcolumn>
  </gridrow>
</grid>

{!! Form::close() !!}
@endsection
