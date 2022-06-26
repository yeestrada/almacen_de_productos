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

Route::resource('/products', 'ProductsController');
//Route::get('/', function () {
//    return redirect('products.index');
//});

Route::get('/', function () {
    return redirect('products');
});

//switch entre los lenguajes
Route::get('lang/{lang}','LanguageController@swap')->name('lang.swap');

//call filters
Route::post('/products/filter', 'ProductsController@filter')->name('products.filter');
Route::post('/products/delete/{id}', 'ProductsController@delete')->name('products.delete');

