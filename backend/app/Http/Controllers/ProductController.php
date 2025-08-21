<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
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
        $product = Product::create($request->validated());
        return response()->json($product);
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
            return response()->status(204);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->update($request->validated());
            return response()->json($product);
        } catch (ModelNotFoundException $e) {
            return response()->status(204);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Product::destroy($id);
        } catch (\Throwable $th) {
            return response()->status(204);
        }
    }
}
