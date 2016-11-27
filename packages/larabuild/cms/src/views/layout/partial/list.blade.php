@extends('cms::layout.partial.panel')

@section('body')
@if(isset($data))
@if(count($data) > 0 )

<div id="list-{{$id}}-filters">
	@if(isset($multiselect) && $multiselect != false)
	<div class="multiselect cols-5">
		{!! Form::select('multiselect-action', $multiselect['actions'], null, ["id" => "list-" . $id . "-actions", "class" => "cols-8"]) !!}
		{!! Form::submit('Uitvoeren', ["class" => "cols-2"]) !!}
	</div>
	@endif
</div>

<table class='list' width="100%">
	<tr class='list-head'>
		@if(isset($multiselect) && $multiselect != false)
		<th class="row-checkbox">{!! Form::checkbox('select-all', 1, 0, ["id" => "list-" . $id . "-select-all"]) !!}</th>
		@endif
		@if(isset($list_params))
		@foreach($list_params as $key => $rowdata)
		@if(gettype($rowdata) != 'array')
		<th>{!! $rowdata !!}</th>
		@else
		<th>{!! $rowdata['label'] !!}</th>
		@endif
		@endforeach
		@endif

		@if(!isset($hide_edit) || $hide_edit == false)<th></th>@endif
		@if(!isset($hide_remove) || $hide_remove == false)<th></th>@endif
	</tr>

	@foreach($data as $data)
	@if(isset($list_params))

	<tr id="item-{{$data->id}}" class="item">
		@if(isset($multiselect) && $multiselect != false)
		<td class="row-checkbox">{!! Form::checkbox('multiselect[select-row-' . $data->id . "]", 1, 0, ["id" => 'select-row-' . $data->id, "data-id" => $data->id]) !!}</td>
		@endif
		@foreach($list_params as $key => $rowdata)
		@if(gettype($rowdata) != 'array')
		<td class="{{$key}}">{!! $data[$key] !!}</td>
		@else
		@if(isset($rowdata['partial']))
		@include($rowdata['partial'])
		@elseif(isset($rowdata['route']))
		<td class="{{$key}}">{!! link_to_route($rowdata['route'], (isset($rowdata['before']) ? $rowdata['before'] : '') . (isset($data[$key]) ? $data[$key] : $rowdata['content']) . (isset($rowdata['after']) ? $rowdata['after'] : '') , isset($rowdata['routeData']) ? $rowdata['routeData'] : ["id" => $data['id']]) !!}</td>
		@else
		<td class="{{$key}}">{!! isset($rowdata['before']) ? $rowdata['before'] : '' !!}{!!$data[$key]!!}{!! isset($rowdata['after']) ? $rowdata['after'] : '' !!}</td>
		@endif
		@endif
		@endforeach
		@if(!isset($hide_edit) || $hide_edit == false)
		<td width="50" class="alignright">
			@if(isset($data->id))
			{!! link_to_route($resource . '.show', "Bewerken", ["id" => $data->id]) !!}
			@else
			{!! link_to_route($resource . '.show', "Bewerken", array($data->id)) !!}
			@endif
		</td>
		@endif
		@if(!isset($hide_remove) || $hide_remove == false)
		<td width="10" class="alignright">
			{!! Form::open(array('route' => array($resource . '.destroy', $data->id), 'method' => 'delete')) !!}
			<button type="submit" class='btn right remove' onclick="return confirm('Weet je zeker dat je dit item wilt verwijderen?')"></button>
			{!! Form::close() !!}
		</td>
		@endif
	</tr>

	@endif
	@endforeach
</table>

@else
Er zijn nog geen items aanwezig! <br />
<a href="{{route($resource . '.create')}}" >+ Create {{$resource}}</a>
@endif

@else
<p>Data not set</p>
@endif
@stop
