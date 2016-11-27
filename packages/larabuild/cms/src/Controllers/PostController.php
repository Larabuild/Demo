<?php

namespace Larabuild\Cms\Controllers;

use Larabuild\Cms\Controllers\Controller;
use Larabuild\Cms\Post;

use Illuminate\Http\Request;
use Redirect;

class PostController extends Controller
{

  protected $validations = [
    'title' => 'required|max:255',
    //'username' => 'required|max:255',
    //'email' => 'required|email|max:255|unique:users',
  ];

  public function index(){
    $view = view("cms::post.index");
    $view->posts = Post::all();
    return $view;
  }

  public function create(Request $request){
    $view = view("cms::post.single");
    $view->post = new Post();
    return $view;
  }

  public function show(Request $request, $post_id){
    $view = view("cms::post.single");
    $view->post = Post::find($post_id);
    return $view;
  }

  public function store(Request $request){
    $this->validate($request, $this->validations);

    $params = $request->all();
    $params["slug"] = str_slug($request->get("title"));

    $post = Post::create($params);
    return Redirect::route('post.show', $post->id);
  }

  public function update(Request $request, $post_id){
    $this->validate($request, $this->validations);

    Post::find($post_id)->update($request->all());
    return Redirect::route('post.show', $post_id);
  }

  public function destroy(Request $request, $post_id){
    Post::find($post_id)->delete();
    return Redirect::route('post.index');
  }
}
