@extends('cms::layout.default')

@section('content')
{!! Form::open([
  'route' => $post->id ? ['post.update', $post->id] : 'post.store',
  'method' => $post->id ? 'put' : 'post']) !!}
{!! Form::token() !!}

{!! Form::hidden("user_id", Auth::user()->id) !!}
<grid>
  <gridrow>
    <gridcolumn size="8">
      @include("cms::post.partial.basicinfo", [
      "id" => "basic-info",
      "title" => (isset($post->template) ? $post->template->title . ": " : "Post: ") . $post->title
      ])
    </gridcolumn>
    <gridcolumn size="4">
      <panel title="Example">
      <div class="panel-inner">

        Dit is een voorbeeldpaneel
        {!! Form::submit($post->id ? 'Bijwerken' : "Opslaan") !!}
        </div>
      </panel>
    </gridcolumn>
  </gridrow>
</grid>

{!! Form::close() !!}
@endsection
