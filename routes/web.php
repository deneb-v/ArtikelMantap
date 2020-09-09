<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
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

Route::get('/','UserController@viewHome')->name('home');
Route::get('/artikel/{id}','UserController@viewArtikel')->where('id','[0-9]+')->name('artikel');
Route::post('/article/{id}/postComment','UserController@addComment')->where('id','[0-9]+')->name('postComment');
Route::post('/sendmail','UserController@sendMail')->name('sendMail');


Route::group(['middleware' => 'admin','prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@viewManageArticle')->name('admin');
    Route::get('/addArticle', 'AdminController@viewAddArticle')->name('newArticle');
    Route::post('/addArticle', 'AdminController@addArticle')->name('addArticle');
    Route::delete('/delete/{id}','AdminController@deleteArticle')->where('id','[0-9]+')->name('deleteArticle');
    Route::get('/edit/{id}', 'AdminController@viewEditArticle')->where('id','[0-9]+')->name('edit');
    Route::patch('/edit/{id}','AdminController@updateArticle')->where('id','[0-9]+')->name('updateArticle');
});



Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
