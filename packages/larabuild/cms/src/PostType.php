<?php namespace Larabuild\Cms;

use Illuminate\Database\Eloquent\Model;
use Larabuild\Cms\Setting;

class PostType extends Model {

  protected $table = "post_type";
  protected $fillable = [
    "title",
    "slug",
    "description",
    "admin_layout",
    "properties",
    "view"
  ];

  public function posts(){
    return $this->hasMany("Larabuild\Cms\Post", "type_id");
  }

}
