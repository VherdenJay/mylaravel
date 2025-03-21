<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Products $products)
    {
        // dd($request);
        // dd("Store method reached!");

        $productsInfo = $request->validate([
            'productPhoto' => 'required|image|max:10000',
            'productName' => 'required|string|max:255',
            'productPrice' => 'required|numeric|min:0',
            'productStock' => 'required|integer|min:0',
        ]);

        if ($request->file('productPhoto')) {
            $imagePath = $request->file('productPhoto')->store('products', 'public');
           
            
    
        
        $productsInfo['productPhoto']= $imagePath;
        Products::create($productsInfo);
        }


        // $product = new Products();
        // $product->productName = $productsInfo['productName'];
        // $product->productPrice = $productsInfo['productPrice'];
        // $product->productStock = $productsInfo['productStock'];
        //  $product->save();
    
        return redirect('/admin')->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        $products->delete();
    
    return redirect('/admin');
    }
}
