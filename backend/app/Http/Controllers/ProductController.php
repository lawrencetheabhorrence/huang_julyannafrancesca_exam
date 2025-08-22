<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductOrder;
use http\Env\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        if (is_null($request->user()) || $request->user()->cannot('create', Product::class)) {
            abort(403);
        }
        $product = Product::create($request->validated());
        return response()->json($product);
    }

    public function makeOrder(Product $product, ProductOrder $productOrder) {
        if ($productOrder->quantity > $product->stock) {
            return response()->json(["error" => "Insufficient stock"], 400);
        }

        $product->stock -= $productOrder->quantity;
        $productOrder->is_committed = true;
        $product->save();
        $productOrder->save();

        return response()->json($productOrder);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
           $product = Product::findOrFail($id);
           return response()->json($product);
        } catch (\Throwable $th) {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $id)
    {
        if (is_null($request->user()) || $request->user()->cannot('update', Product::class)) {
            abort(403);
        }
        try {
            $product = Product::findOrFail($id);
            $product->update($request->validated());
            return response()->json($product);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($request, $id)
    {
        if (is_null($request->user()) || $request->user()->cannot('delete', Product::class)) {
            abort(403);
        }
        try {
            Product::destroy($id);
        } catch (\Throwable $th) {
            abort(404);
        }
    }
}
