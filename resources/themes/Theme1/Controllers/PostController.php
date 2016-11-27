<?php namespace Themes\Theme1\Controllers;

use App\Http\Controllers\Controller;
use View;

use Larabuild\Cms\Post;

class PostController extends Controller
{

  public function get_homepage(){
    $view = view::make("Theme::index");
    $view->posts = Post::all();
    return $view;
  }

}
