<?php
/** START - Products */
Route::prefix('products')->name('products.')->middleware('localproduct')->group(function () {
// Route::prefix('products')->name('products.')->group(function () {

    Route::get('', 'ProductController@index')->name('index');

    Route::get('create', 'ProductController@create')->name('create');
    Route::post('store', 'ProductController@store')->name('store');

    Route::get('{id}/show', 'ProductController@show')->name('show');

    Route::get('{id}/edit', 'ProductController@edit')->name('edit');
    Route::put('{id}', 'ProductController@update')->name('update');

    Route::delete('{id}', 'ProductController@destroy')->name('destroy');  
});


// Route::resource('products', 'ProductController');
/** END - Products */