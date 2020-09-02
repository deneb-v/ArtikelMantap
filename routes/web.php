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

Route::get('/admin', 'AdminController@viewManageArticle');
Route::get('/admin/addArticle', 'AdminController@viewAddArticle');
Route::post('/admin/addArticle', 'AdminController@addArticle');
