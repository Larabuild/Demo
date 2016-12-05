<?php

namespace Larabuild\Cms\Controllers;

use Larabuild\Cms\Controllers\Controller;
use Larabuild\Cms\Layout;
use stdClass;

class DashboardController extends Controller
{
  public function index(){
    $layout = Layout::findDefault('dashboard');
    $view = view($layout->admin_view);
    $view->layout = $layout->content;
    $view->model = ["title" => "Fake Title"];
    $view->model['layout'] = $layout;
    return $view;
  }
}
