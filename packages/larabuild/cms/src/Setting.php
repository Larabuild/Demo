<?php namespace Larabuild\Cms;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
  protected $table = "settings";
  protected $fillable = [
    "bundle",
    "name",
    "value",
    "title",
    "description",
  ];

  public function collect($name){
    return $this->where('name', $name)->get();
  }

}
