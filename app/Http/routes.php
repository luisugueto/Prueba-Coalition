<?php

use App\Product;
use Illuminate\Http\Request;

/**
 *  Get the full list of products
 */
Route::get('/','ProductController@index');
Route::resource('producto', 'ProductController');

/**
 *  Get a specific product
 */

