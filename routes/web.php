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
Route::get('/article/{id}','UserController@viewArtikel')->where('id','[0-9]+')->name('artikel');
Route::post('/article/{id}/postComment','UserController@addComment')->where('id','[0-9]+')->name('postComment');
Route::post('/sendmail','UserController@sendMail')->name('sendMail');


Route::group(['middleware' => 'admin','prefix' => 'admin'], function () {
    Route::get('/', 'DashboardController@viewManageArticle')->name('admin');
    Route::get('/registerAdmin','AccountController@viewRegisterAdmin')->name('viewRegisterAdmin');
    Route::post('/registerAdmin','AccountController@registerAdmin')->name('registerAdmin');
    Route::get('/addArticle', 'DashboardController@viewAddArticle')->name('newArticle');
    Route::post('/addArticle/{id}', 'DashboardController@addArticle')->where('id','[0-9]+')->name('addArticle');
    Route::delete('/delete/{id}','DashboardController@deleteArticle')->where('id','[0-9]+')->name('deleteArticle');
    Route::get('/edit/{id}', 'DashboardController@viewEditArticle')->where('id','[0-9]+')->name('edit');
    Route::patch('/edit/{id}','DashboardController@updateArticle')->where('id','[0-9]+')->name('updateArticle');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
