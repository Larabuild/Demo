<?php namespace Larabuild\Cms\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $table = "post_meta";
    protected $fillable = [
        "name",
        "value",
        "post_id"
    ];

    public function post(){
      return $this->belongsTo("\Larabuild\Cms\Models\Post", 'post_id');
    }
}
