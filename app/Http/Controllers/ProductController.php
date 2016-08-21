<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
 		$products = Product::orderBy('submitted', 'DESC')->get();
		
	    return view('index', [
	    	'products' => $products
	    ]);       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
       $dt = new \DateTime();

    $product = new Product();
    $product->name = $request->name;
    $product->stock = $request->stock;
    $product->price = $request->price;
    $product->submitted = $dt->format('Y-m-d H:i:s');

    $product->save();

    return response()->json($product);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show(Request $request, $id)
    {
      	$dt = new \DateTime();

		$product = new Product();

		return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
	    $product = Product::destroy($product_id);
     	return Redirect('/');   
    }
}
