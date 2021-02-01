<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/new', 'AdminController@CreateNewPost')->name('create_new_post');
Route::get('/get_all_posts', 'AdminController@getAllPosts')->name('getAllPosts');
Route::post('/save_new_post', 'AdminController@savePost')->name('create_new_post');
Route::put('/save_edit_post', 'AdminController@editSave')->name('editSave');
Route::put('/rate_post', 'AdminController@ratePost')->name('ratePost');
Route::get('/edit/{id}', 'AdminController@edit')->name('edit');
Route::delete('/delete_post/{post_id}', 'AdminController@delete')->name('delete');
