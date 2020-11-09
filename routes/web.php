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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'Home@index');

Route::get('/products', 'ProductController@index')->name('products.index');

Route::get('/products/create', 'ProductController@create')->name('products.create');
Route::post('/products/store', 'ProductController@store')->name('products.store');

Route::get('/products/{id}/show', 'ProductController@show')->name('products.show');

Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit');
Route::put('/products/update', 'ProductController@update')->name('products.update');

Route::delete('/products/{id}', 'ProductController@delete')->name('products.delete');



Route::get('blade', function () {
    return view('child');
});