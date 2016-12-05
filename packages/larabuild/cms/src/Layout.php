<?php namespace Larabuild\Cms;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

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
}
