<?php

Route::get('/', array('as'=>'homepage', 'uses'=>'PostController@get_homepage'));
