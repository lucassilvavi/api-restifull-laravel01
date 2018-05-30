<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductRequest as Request;

class ProductsController extends Controller
{
    /***
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return response()->make(Product::all());
    }

    public function store(Request $request)
    {
        return response()->make(Product::create($request->all()));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return $product;
    }

    public function show(Product $product)
    {
        return response()->make(Product::find($product));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return $product;
    }
}
