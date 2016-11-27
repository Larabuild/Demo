<?php
  Auth::routes();

  Route::group(['namespace' => 'Controllers', 'middleware' => ['web']], function () {
    Auth::routes();

  Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
      Route::get('/dashboard', ["as" => "dashboard", 'uses' => "DashboardController@index"]);

      Route::get('/user/profile', ["as" => "admin.profile", 'uses' => "UserController@index"]);
      Route::put('/user/profile', ["as" => "admin.profile.update", 'uses' => "UserController@update_basic_info"]);

      Route::resource('post', 'PostController');
      Route::resource('user', 'UserController');
  });
  });
