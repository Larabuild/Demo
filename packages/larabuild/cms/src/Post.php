<?php namespace Larabuild\Cms;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $table = "posts";
    protected $fillable = [
        "title",
        "content",
        "url",
        "user_id",
        "slug",
        "layout_id"
    ];

    public function author(){
      return $this->belongsTo('\App\User', 'user_id');
    }

    public function layout(){
      return $this->belongsTo('\Larabuild\Cms\Layout', 'layout_id');
    }

    public function getAuthorNameAttribute(){
      return $this->author->name;
    }

    public function getExcerptAttribute(){
      return substr($this->content, 0, 100) . "..";
    }
}
