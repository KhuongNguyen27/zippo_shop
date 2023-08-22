<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\UpdateOrderDetailRequest;
use App\Http\Requests\StoreOrderDetailRequest;


class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Show the form for creating a new resource.
     */
    public function create(String $order_id)
    {
        try {
            //code...
            $this->authorize('create',OrderDetail::class);
            $products = Product::where('status',1)->get();
            return view('admin.orderdetail.create',compact(['products','order_id']));
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderDetailRequest $request)
    {
        try{
            $detail = new OrderDetail();
            $detail->order_id = $request->order_id;
            $detail->product_id  = $request->product_id;
            $id = $request->product_id;
            $product = Product::find($id);
            $product->quantity -= $request->quantity;
            $product->selled  += $request->quantity;
            $product->save();
            $price = $product->price;
            $detail->quantity  = $request->quantity;   
            $detail->total = $request->quantity*$price;
            $detail->save();
            alert()->success('Success created');
            return redirect()->route('order.show',$request->order_id);
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        try {
            //code...
            $detail = OrderDetail::with('product')->find($id);
            $this->authorize('update', $detail);
            $products = Product::where('status',1)->get();
            return view('admin.orderdetail.edit',compact(['detail','products']));
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderDetailRequest $request, String $id)
    {
        try {
            $detail = OrderDetail::find($id);
            $detail->order_id = $request->order_id;
            
            // update product.quantity, product.selled
            $id = $detail->product_id;
            $product = Product::find($id);
            $product->quantity += $detail->quantity;
            $product->selled -= $detail->quantity;
            $product->save();
            
            $id = $request->product_id;
            $product = Product::find($id);
            $product->quantity -= $request->quantity;
            $product->selled  += $request->quantity;
            $product->save();
            // finish

            $detail->product_id  = $request->product_id ;
            $detail->quantity  = $request->quantity ;
            $price = $product->price;   
            $detail->total = $request->quantity*$price;
            $detail->save();
            alert()->success('Success update');
            return redirect()->route('order.show',$request->order_id);
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        try {
            //code...
            $detail = OrderDetail::findOrFail($id);
            $this->authorize('delete', $detail);
            $orderdetail = OrderDetail::find($id);
            $orderdetail->delete();
            alert()->success('Success move to trash');
            return back();
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }
}