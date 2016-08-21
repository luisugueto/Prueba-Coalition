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

Route::get('/product/delete/{id}',['as' => 'deleteProduct', function(Request $request, $id){
	if ($request->ajax()) {
		 $product = Product::destroy($id);
	     return Redirect('/');
	}
	   
}]) 
->where(['product_id' => '[0-9]+']);
