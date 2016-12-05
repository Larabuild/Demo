<panel id="panel-{{$id}}" title="{{$title}}">
  <div class="panel-inner">
  @yield("body-" . $id)
  </div>
</panel>
