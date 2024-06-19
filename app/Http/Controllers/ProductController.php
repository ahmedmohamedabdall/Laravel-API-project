<?php

namespace App\Http\Controllers;

use App\Http\Requests\bulkStoreProductReqyest;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\productResourceCollection;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $product=Product::when(request()->has('search'),function($query){
            $query->where('name','like','%'.request('search').'%')->orderBy('created_at','asc');
        })->get();
        return new productResourceCollection($product) ;
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated=$request->validated();
        Product::create($validated);
    }
    
    public function bulkStore(bulkStoreProductReqyest $request){
        $validated=$request->validated();
        
        Product::insert($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated=$request->validated();
        $product->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
