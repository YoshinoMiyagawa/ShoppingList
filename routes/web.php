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

Route::get('/', 'ShoppinglistsController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');






Route::group(['middleware' => ['auth']], function () {
    
    Route::group(['prefix' => 'lists/{link}'], function () {
        
        Route::get('buying', 'ItemsController@buying')->name('items.buying');
        Route::get('hasbought', 'ItemsController@hasbought')->name('items.hasbought');
        
    });
    
    
    //簡単なルーティング。余裕があれば直す
    Route::group(['prefix' => 'lists/{listId}'], function () {

        Route::get('items/create','ItemsController@create')->name('items.create');
        Route::post('items/store','ItemsController@store')->name('items.store');
        Route::get('items/show','ItemsController@show')->name('items.show');
        
   });
   
   Route::group(['prefix' => 'items/{itemId}'], function () {
        Route::get('items/show','ItemsController@show')->name('items.show');
        Route::post('items/status', 'ItemsController@status_register')->name('items.status_register');
        Route::get('destroyConfirmation/item', 'ItemsController@destroy_confirmation')->name('items.destroy_confirmation');
        Route::delete('destroy/item', 'ItemsController@destroy')->name('items.destroy');
   });
   
   
   
  Route::group(['prefix' => 'users/{userId}'], function () {
        Route::get('shoppinglists','ShoppinglistsController@index')->name('shoppinglists.index');
        Route::get('shoppinglists/create','ShoppinglistsController@create')->name('shoppinglists.create');
        Route::post('shoppinglists/store','ShoppinglistsController@store')->name('shoppinglists.store');

   });
   

    
});