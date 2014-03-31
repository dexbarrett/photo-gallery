<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'AlbumController@index');

Route::get('album/{id}/image', array('as' => 'add_image', 'uses' => 'ImageController@create'));
Route::post('album/{id}/image', array('as' => 'add_image', 'uses' => 'ImageController@store'));
Route::delete('image/{id}', array('as' => 'delete_image', 'uses' => 'ImageController@destroy'));
Route::post('image/{id}/move', array('as' => 'move_image', 'uses' => 'ImageController@move'));

Route::resource('album', 'AlbumController');