<?php


Route::group(['prefix' => 'panel', 'namespace' => 'Panel'], function() {
    
    Route::resource('brands', 'BrandController');

    Route::get('/', 'PanelController@index')->name('panel');
});



Route::get('promocoes', 'Site\SiteController@promotions')->name('promotions');

Route::get('/', 'Site\SiteController@index');

Auth::routes();


