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
    public function index()
    {
        $orderdetails = OrderDetail::with('order','product')->paginate(3);
        return view('admin.orderdetail.index',compact(['orderdetails']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $order_id)
    {
        $products = Product::get();
        return view('admin.orderdetail.create',compact(['products','order_id']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderDetailRequest $request)
    {
        $detail = new OrderDetail();
        $detail->order_id = $request->order_id;
        $detail->product_id  = $request->product_id ;
        $id = $request->product_id;
        $product = Product::find($id);
        $product->quantity -= $request->quantity;
        $product->selled  += $request->quantity;
        if ($product->quantity == 0) {
            $product->status = 0;
        }
        $product->save();
        $price = $product->price;
        $detail->quantity  = $request->quantity;   
        $detail->total = $request->quantity*$price;
        $detail->save();
        alert()->success('Success created');
        return redirect()->route('order.show',$request->order_id);
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
        $detail = OrderDetail::find($id);
        $products = Product::get();
        $orders = Order::get();
        return view('admin.orderdetail.edit',compact(['detail','products','orders']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderDetailRequest $request, String $id)
    {
        $detail = OrderDetail::find($id);
        $detail->order_id = $request->order_id;
        $detail->product_id  = $request->product_id ;
        $id = $request->product_id;
        $product = Product::find($id);
        $product->quantity += $detail->quantity;
        $product->quantity -= $request->quantity;
        $product->selled  += $request->quantity;
        if ($product->quantity == 0) {
            $product->status = 0;
        }
        $product->save();
        $detail->quantity  = $request->quantity ;
        $price = $product->price;   
        $detail->total = $request->quantity*$price;
        $detail->save();
        alert()->success('Success update');
        return redirect()->route('order.show',$request->order_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash()
    {
        $orderdetails = OrderDetail::onlyTrashed()->with('order','product')->paginate(3);
        return view('admin.orderdetail.trash',compact(['orderdetails']));
    }
    public function destroy(String $id)
    {
        $orderdetail = OrderDetail::find($id);
        $orderdetail->delete();
        alert()->success('Success move to trash');
        return back();
    }
    function restore(String $id){
        try {
            $orderdetail = OrderDetail::withTrashed()->find($id);
            $orderdetail->restore();
            alert()->success('Restore order detail success');
            return redirect()->route('order.show',$id);
        } catch (\Exception $e) {
            // Log::error($e->getMessage());
            alert()->warning('Have problem! Please try again late');
            return back();
        }
    }
    function deleteforever(String $id){
        try {
            $orderdetail = OrderDetail::withTrashed()->find($id);
            $orderdetail->forceDelete();
            alert()->success('Destroy order success');
            return back();
        } catch (\Exception $e) {
            // Log::error($e->getMessage());
            alert()->warning('Have problem! Please try again late');
            return back();
        }
    }
}
