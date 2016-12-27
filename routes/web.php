<?php

Auth::routes();

// homepage after user logges in
Route::get('/', 'CategoryController@index')->name('home_category');
Route::get('/home', 'CategoryController@index')->name('home_category');
// create and store categories
Route::get('/category/new', 'CategoryController@create')->name('create_category');
Route::post('/category/new', 'CategoryController@store')->name('store_category');
// show category
Route::get('/category/{category_id}', 'CategoryController@show')->name('show_category');
// edit and update category
Route::get('/category/{category}/edit', 'CategoryController@edit')->name('edit_category');
Route::patch('/category/{category}/edit', 'CategoryController@update')->name('update_category');
Route::delete('/category/{category_id}', 'CategoryController@delete')->name('delete_category');
// create and store tasks
Route::get('/category/{category}/task/new', 'TaskController@create')->name('create_task');
Route::post('/category/{category}', 'TaskController@store')->name('store_task');
// show task
Route::get('/task/{task}', 'TaskController@show')->name('show_task');
// edit and update tasks
Route::get('/task/{task}/edit', 'TaskController@edit')->name('edit_task');
Route::patch('/task/{task}/edit', 'TaskController@update')->name('update_task');
Route::delete('/task/{task}', 'TaskController@delete')->name('delete_task');
// get request to /logout page
Route::get('/logout', 'Auth\LoginController@logout');
