<?php


Route::group(['prefix' => 'panel', 'namespace' => 'Panel'], function() {
    
    Route::any('brands/search', 'BrandController@search')->name('brands.search');
   
    Route::resource('brands', 'BrandController');

    Route::resource('planes', 'PlaneController');

    Route::get('/', 'PanelController@index')->name('panel');
});



Route::get('promocoes', 'Site\SiteController@promotions')->name('promotions');

Route::get('/', 'Site\SiteController@index');

Auth::routes();


