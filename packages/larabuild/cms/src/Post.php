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
        "type_id"
    ];

    public function data(){
      return $this->hasMany('\Larabuild\Cms\Models\PostMeta');
    }

    public function author(){
      return $this->belongsTo('\App\User', 'user_id');
    }

    public function template(){
      return $this->belongsTo('\Larabuild\Cms\PostType', 'type_id');
    }

    public function getAuthorNameAttribute(){
      return $this->author->name;
    }

    public function getTemplateNameAttribute(){
      return $this->template ? $this->template->title : "not-set";
    }

    public function getExcerptAttribute(){
      return substr($this->content, 0, 100) . "..";
    }
}
