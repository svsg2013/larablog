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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',function(){
    return view('admin.user.list');
});
Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'panel'],function(){
        //user
        Route::get('abc',function(){
            return view('admin.user.list');
        });
        //category
        Route::resource('category','CateController',['except'=>'destroy']);
        Route::get('category/{idDelete}/destroy','CateController@destroy')->name('category.delete');
        //article
        Route::resource('news','NewsController',['except'=>'destroy']);
        //tags
        Route::resource('tags','TagsController',['except'=>'destroy']);
        Route::get('tags/{idDelete}/destroy','TagsController@destroy')->name('tags.delete');
    });
});

