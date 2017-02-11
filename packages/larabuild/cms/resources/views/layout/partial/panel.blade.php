<panel id="panel-{{$id}}" title="{{$title}}" position="{{isset($position) ? implode(',', $position) : false }}">
  <div class="panel-inner">
  @yield("body-" . $id)
  </div>
</panel>
