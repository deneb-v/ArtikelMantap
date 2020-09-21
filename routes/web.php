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
Route::post('/article/replyComment/{id}', 'UserController@replyComment')->where('id','[0-9]+')->name('postReply');
Route::post('/sendmail','UserController@sendMail')->name('sendMail');


Route::group(['middleware' => 'admin','prefix' => 'admin'], function () {
    Route::get('/', 'DashboardController@viewManageArticle')->name('Admin');
    Route::get('/registerAdmin','AccountController@viewRegisterAdmin')->name('viewRegisterAdmin');
    Route::post('/registerAdmin','AccountController@registerAdmin')->name('registerAdmin');
    Route::get('/addArticle', 'DashboardController@viewAddArticle')->name('newArticleAdmin');
    Route::post('/addArticle', 'DashboardController@addArticle')->name('addArticleAdmin');
    Route::delete('/delete/{id}','DashboardController@deleteArticle')->where('id','[0-9]+')->name('deleteArticleAdmin');
});

Route::group(['middleware' => 'member','prefix' => 'member'], function () {
    Route::get('/', 'DashboardController@viewManageArticle')->name('Member');
    Route::get('/addArticle', 'DashboardController@viewAddArticle')->name('newArticleMember');
    Route::post('/addArticle', 'DashboardController@addArticle')->name('addArticleMember');
    Route::delete('/delete/{id}','DashboardController@deleteArticle')->where('id','[0-9]+')->name('deleteArticleMember');
    Route::get('/edit/{id}', 'DashboardController@viewEditArticle')->where('id','[0-9]+')->name('edit');
    Route::patch('/edit/{id}','DashboardController@updateArticle')->where('id','[0-9]+')->name('updateArticle');
});

Auth::routes();
