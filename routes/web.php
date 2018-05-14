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
//frontend
Route::get('/', 'HomeController@index')->name('trangchu');
Route::get('/news/{id}/{newsSlug}', 'HomeController@singlepost')->name('postNews');
Route::get('/cate/{id}/{cateSlug}', 'HomeController@catepost')->name('catePost');
Route::get('/tags/{id}/{tagSlug}', 'HomeController@tagpost')->name('tagPost');
//backend
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'panel'], function () {
        //category
        Route::resource('category', 'CateController', ['except' => 'destroy']);
        Route::get('category/{idDelete}/destroy', 'CateController@destroy')->name('category.delete');
        //category product
        Route::resource('cateprod', 'CateProdController', ['except' => 'destroy']);
        Route::get('cateprod/{idDelete}/destroy', 'CateProdController@destroy')->name('cateprod.delete');
        //Prods
        Route::resource('prods', 'ProdsController', ['except' => 'destroy']);
        Route::get('prods/{idDelete}/destroy', 'ProdsController@destroy')->name('prods.delete');
        //article
        Route::resource('news', 'NewsController', ['except' => 'destroy']);
        Route::get('news/{idDelete}/destroy', 'NewsController@destroy')->name('news.delete');
        //tags
        Route::resource('tags', 'TagsController', ['except' => 'destroy']);
        Route::get('tags/{idDelete}/destroy', 'TagsController@destroy')->name('tags.delete');
        //user
        Route::resource('user', 'UserController');
    });
});

Auth::routes();

