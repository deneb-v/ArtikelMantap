<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','UserController@viewHome');

Route::get('/admin', 'AdminController@viewManageArticle')->name('admin');
Route::get('/admin/addArticle', 'AdminController@viewAddArticle')->name('newArticle');
Route::post('/admin/addArticle', 'AdminController@addArticle')->name('addArticle');
Route::delete('/admin/delete/{id}','AdminController@deleteArticle')->where('id','[0-9]+')->name('deleteArticle');
Route::get('/admin/edit/{id}', 'AdminController@viewEditArticle')->where('id','[0-9]+')->name('edit');
Route::patch('/admin/edit/{id}','AdminController@updateArticle')->where('id','[0-9]+')->name('updateArticle');

