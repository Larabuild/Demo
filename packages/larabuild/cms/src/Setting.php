<?php namespace Larabuild\Cms;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

  protected $table = "cms_settings";
  protected $fillable = [
    "bundle",
    "name",
    "value",
    "label",
    "input_type",
    "is_hidden",
    "subtext",
  ];

  public function collect($name){
    return $this->where('name', $name)->get();
  }
}
