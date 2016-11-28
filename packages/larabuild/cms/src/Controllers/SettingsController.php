<?php

namespace Larabuild\Cms\Controllers;

use Larabuild\Cms\Controllers\Controller;
use Larabuild\Cms\Setting;

use Illuminate\Http\Request;
use Redirect;

class SettingsController extends Controller
{

  protected $validations = [
    'name' => 'required|max:255',
  ];

  public function index(){
    $view = view("cms::setting.index");
    $view->settings = Setting::all()->sortBy('bundle');
    $view->bundles = Setting::distinct()->select('bundle')->get();
    return $view;
  }

  public function create(Request $request){
    $view = view("cms::setting.single");
    $view->setting = new Setting();
    return $view;
  }

  public function show(Request $request, $id){
    $view = view("cms::setting.single");
    $view->setting = Setting::find($id);
    return $view;
  }

  public function show_bundle(Request $request, $bundle){
    $view = view("cms::setting.index");
    $view->settings = Setting::where("bundle", $bundle)->get();
    $view->bundles = Setting::distinct()->select('bundle')->get();
    return $view;
  }

  public function store(Request $request){
    $this->validate($request, $this->validations);
    $params = $request->all();
    $params['hidden'] = $request->get('hidden', 0);
    Setting::create($params);
    return Redirect::route('setting.index');
  }

  public function update(Request $request, $id){
    $this->validate($request, $this->validations);
    $params = $request->all();
    $params['hidden'] = $request->get('hidden', 0);
    Setting::find($id)->update($params);
    return Redirect::route('setting.index');
  }

  public function destroy(Request $request, $id){
    setting::find($id)->delete();
    return Redirect::route('settings.index');
  }
}
