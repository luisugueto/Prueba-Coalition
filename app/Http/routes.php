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

Route::get('/product/{product_id}', function($product_id) {
	$product = Product::findOrFail($product_id);

	return response()->json($product);
});


/**
 *  Edit a product
 */
Route::put('/product/edit/', 'ProductController@edit');

/**
 *  Delete a product
 */

