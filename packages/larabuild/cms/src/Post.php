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
        "template_id"
    ];

    public function data(){
      return $this->hasMany('\Larabuild\Cms\Models\PostMeta');
    }

    public function author(){
      return $this->belongsTo('\App\User', 'user_id');
    }

    public function template(){
      return $this->belongsTo('\Larabuild\Cms\Template', 'template_id');
    }

    public function getAuthorNameAttribute(){
      return $this->author->name;
    }

    public function getExcerptAttribute(){
      return substr($this->content, 0, 100) . "..";
    }
}
