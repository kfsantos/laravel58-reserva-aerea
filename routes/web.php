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

Route::get('panel', 'Panel\PanelController@index');

Route::get('promocoes', 'Site\SiteController@promotions')->name('promotions');

Route::get('/', 'Site\SiteController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
