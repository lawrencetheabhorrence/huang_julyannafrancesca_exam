<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductOrderRequest;
use App\Http\Requests\UpdateProductOrderRequest;
use App\Models\ProductOrder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(ProductOrder::all());
    }

    public function listFromCustomer($customerId) {
        return response()->json(ProductOrder::all()->where('customer_id', $customerId));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductOrderRequest $request)
    {
        $productOrder = ProductOrder::create($request->validated());
        return response()->json($productOrder);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $productOrder = ProductOrder::findOrFail($id);
            return response()->json($productOrder);
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductOrderRequest $request, $id)
    {
        try {
            $productOrder = ProductOrder::findOrFail($id);
            $productOrder->update($request->validated());
            return response()->json($productOrder);
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            ProductOrder::destroy($id);
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }
    }
}
