<?php

namespace Larabuild\Cms\Controllers;

use Larabuild\Cms\Controllers\Controller;
use Larabuild\Cms\PostType;

use Illuminate\Http\Request;
use Redirect;

class PostTypeController extends Controller
{

  protected $validations = [
    'title' => 'required|max:255',
    //'username' => 'required|max:255',
    //'email' => 'required|email|max:255|unique:users',
  ];

  public function index(){
    $view = view("cms::posttype.index");
    $view->posttypes = PostType::all();
    return $view;
  }

  public function show_posts(Request $request, $slug){
    $view = view("cms::post.index");
    $view->posttype = PostType::where('slug', $slug)->first();
    $view->posts = $view->posttype->posts;
    return $view;
  }

  public function create(Request $request){
    $view = view("cms::posttype.single");
    $view->posttype = new postType();
    return $view;
  }

  public function show(Request $request, $id){
    $view = view("cms::posttype.single");
    $view->posttype = postType::find($id);
    return $view;
  }

  public function store(Request $request){
    $this->validate($request, $this->validations);

    $params = $request->all();
    $params["slug"] = str_slug($request->get("title"));
    $params["properties"] = "{}";
    $params["admin_layout"] = "{}";
    $params["view"] = "posttype." . str_slug($request->get("title"));

    $template = postType::create($params);
    return Redirect::route('posttype.show', $template->id);
  }

  public function update(Request $request, $id){
    $this->validate($request, $this->validations);

    postType::find($id)->update($request->all());
    return Redirect::route('posttype.show', $id);
  }

  public function destroy(Request $request, $id){
    Template::find($id)->delete();
    return Redirect::route('posttype.index');
  }
}
