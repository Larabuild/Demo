<?php

namespace Larabuild\Cms\Controllers;

use Larabuild\Cms\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use App\User;

class UserController extends Controller
{
  public function index(){
    $view = view("cms::user.index");
    $view->users = User::all();
    return $view;
  }

  public function create(Request $request){
    $view = view("cms::user.single");
    $view->user = new User();
    return $view;
  }

  public function show(Request $request, $id){
    $view = view("cms::user.single");
    $view->user = User::find($id);
    return $view;
  }

  public function store(Request $request){
    $this->validate($request, [
      'name' => 'required|max:255',
      'username' => 'required|max:255',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|min:6|confirmed',
    ]);

    $params = $request->all();
    $params["password"] = bcrypt($params['password']);

    User::create($request->all());
    return Redirect::back();
  }

  public function update(Request $request, $id){
    $this->validate($request, [
      'name' => 'required|max:255',
      'username' => 'required|max:255',
      'email' => 'required|email|max:255',
      'password' => 'min:6|confirmed'
    ]);

    $params = $request->all();
    if($request->has(["password"]))
      $params["password"] = bcrypt($params['password']);

    User::find($id)->update($params);
    return Redirect::back();
  }
}
