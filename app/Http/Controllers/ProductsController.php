<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductRequest as Request;
use Carbon\Carbon;

class ProductsController extends Controller
{
    /***
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $minutes = \Carbon\Carbon::now()->addMinutes(10);
        $products = \Cache::remember('user', $minutes, function () {
            return response()->make(Product::all());
        });
        return $products;
    }

    public function store(Request $request)
    {
        \Cache::forget('api::products');
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
        $this->authorize('delete', $product);

        $product->delete();
        return $product;
    }
}
