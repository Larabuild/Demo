<?php namespace Themes\Theme2\Controllers;

use Illuminate\Routing\Controller as BaseController;
use View;

class PostController extends BaseController
{

  public function get_homepage(){
    $view = view::make("Theme::index");
    return $view;
  }

}
