<?php

namespace Larabuild\Cms\Controllers;

use Larabuild\Cms\Controllers\Controller;
use Larabuild\Cms\Template;

use Illuminate\Http\Request;
use Redirect;

class TemplateController extends Controller
{

  protected $validations = [
    'title' => 'required|max:255',
    //'username' => 'required|max:255',
    //'email' => 'required|email|max:255|unique:users',
  ];

  public function index(){
    $view = view("cms::template.index");
    $view->templates = Template::all();
    return $view;
  }

  public function show_posts(Request $request, $slug){
    $view = view("cms::post.index");
    $view->posts = Template::where('slug', $slug)->first()->posts;
    return $view;
  }

  public function create(Request $request){
    $view = view("cms::template.single");
    $view->template = new Template();
    return $view;
  }

  public function show(Request $request, $id){
    $view = view("cms::template.single");
    $view->template = Template::find($id);
    return $view;
  }

  public function store(Request $request){
    $this->validate($request, $this->validations);

    $params = $request->all();
    $params["slug"] = str_slug($request->get("title"));
    $params["properties"] = "{}";
    $params["admin_layout"] = "{}";
    $params["view"] = "templates." . str_slug($request->get("title"));

    $template = Template::create($params);
    return Redirect::route('template.show', $template->id);
  }

  public function update(Request $request, $id){
    $this->validate($request, $this->validations);

    Template::find($id)->update($request->all());
    return Redirect::route('template.show', $id);
  }

  public function destroy(Request $request, $id){
    Template::find($id)->delete();
    return Redirect::route('template.index');
  }
}
