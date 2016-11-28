<?php namespace Larabuild\Cms;

use Illuminate\Database\Eloquent\Model;
use Larabuild\Cms\Setting;

class Template extends Model {

  protected $table = "templates";
  protected $fillable = [
    "title",
    "slug",
    "description",
    "admin_layout",
    "properties",
    "view"
  ];

  public function posts(){
    return $this->hasMany("Larabuild\Cms\Post", "template_id");
  }

}
