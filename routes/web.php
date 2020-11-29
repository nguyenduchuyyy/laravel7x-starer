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
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/selects/{id}', 'ProductController@select_one')->name('select_one');

Route::group(['middleware' => ['auth']], function () {
    include_once('admin/product.php');
    Route::get('/', function () {
        return view('lte.home.home');
    });
});




