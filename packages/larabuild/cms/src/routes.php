<?php

Route::group(['namespace' => 'Controllers', 'middleware' => ['web']], function () {
  Auth::routes();
  Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', ["as" => "dashboard", 'uses' => "DashboardController@index"]);

    Route::resource('post', 'PostController');
    Route::resource('user', 'UserController');
    Route::resource('setting', 'SettingsController');
    Route::resource('template', 'TemplateController');

    Route::get("/settings/bundle/{bundle}", ['as' => "setting.bundle.show", "uses" => "SettingsController@show_bundle"]);
    Route::get("/post/template/{slug}", ['as' => "post.show.template", "uses" => "TemplateController@show_posts"]);

  });
});
