<?php namespace Larabuild\Cms;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

use stdClass;

class Layout extends Model {
  protected $table = "cms_layouts";
  protected $casts = ["content" => "json"];
  protected $fillable = [
    "table_name",
    "name",
    "title",
    "description",
    "content",
    "public_view",
    "admin_view"
  ];

  protected function findDefault($q){
    $layout = false;
    if(!$layout) $layout = self::where("table_name", $q)->first();
    if(!$layout) $layout = self::where("name", $q)->first();
    if($layout) return $layout;
    else{
      $table_exists = count(DB::select("SHOW TABLES LIKE '$q'")) > 0 ;
      return self::create([
        "table_name" => $table_exists ? $q : null,
        "name" => $q,
        "title" => "Default $q layout"
      ]);
    }
  }

  protected function generatePanel($data){
    $panel = [];
    $panel['title'] = "Untitled";
    $panel['position'] = $data['position'];
    $panel['data'] = [];
    return $panel;
  }

  public function move_panel($from, $to){
    $panelkey = $this->findPanelKey($from);
    dump($panelkey);
    if(isset($panelkey)){
      $this->free_location($to);
      $content = $this->content;
      array_set($content,"panels.$panelkey.position", $to);
      $this->content = $content;
      $this->close_gap($from);
    }
  }

  public function free_location($position){
    $panels_to_update = collect($this->content['panels'])->filter(function($panel, $key) use($position) {
      $select = ($position[1] == $panel['position'][1] && $position[2] <= $panel['position'][2]);
      return $select;
    });

    $content = $this->content;
    foreach($panels_to_update as $key => $panel){
      array_set($content,"panels.$key.position.2", $panel["position"][2]+1);
    }

    return $this->content = $content;
  }

  public function close_gap($position){
    $panels_to_update = collect($this->content['panels'])->filter(function($panel, $key) use($position) {
      $select = ($position[1] == $panel['position'][1] && $position[2] <= $panel['position'][2]);
      return $select;
    });

    $content = $this->content;
    foreach($panels_to_update as $key => $panel){
      array_set($content,"panels.$key.position.2", $panel["position"][2]-1);
    }

    return $this->content = $content;
  }

  public function getPanelsAttribute(){
    return collect($this->content['panels']);
  }

  public function findPanelKey($position){
    return $this->panels->where('position', $position)->keys()->first();
  }
}
