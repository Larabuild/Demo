<?php

namespace Larabuild\Cms\Controllers;

use Larabuild\Cms\Controllers\Controller;
use Larabuild\Cms\Layout;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;

class LayoutController extends Controller
{
  public function autosave(Request $request){
    $layout = Layout::find($request->get("layout_id"));
    if(!$layout) return response()->abort("404");

    $to_resolve = $request->get("resolve");
    foreach ($to_resolve as $key => $task) {
      call_user_func([$this, $task[0]], $layout, $task[1]);
    }

    return response()->json(["success" => true]);
  }

  protected function create_panel($layout, $data){
    $content = $layout->content;
    //dd($content['panels']);
    $panels =$content['panels'];
    $panels[] = Layout::generatePanel($data);
    $content['panels'] = $panels;
    $layout->content = $content;
    $layout->save();
  }

  protected function move_panel($layout, $data){
    $content = $layout->content;
    $layout->move_panel($data['from'], $data['to']);
    $layout->save();
  }

  protected function remove_panel($layout, $data){
    $content = $layout->content;
    dd($content['panels']);
  }
}
