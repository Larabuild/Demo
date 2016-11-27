<?php

namespace Larabuild\Cms\Controllers;

use Larabuild\Cms\Controllers\Controller;

class DashboardController extends Controller
{
  public function index(){
    return view("cms::dashboard.index");
  }
}
