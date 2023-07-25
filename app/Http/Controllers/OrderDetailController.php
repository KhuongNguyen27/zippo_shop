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
        try {
            $this->authorize('viewAny',OrderDetail::class);
            $orderdetails = OrderDetail::with('order','product')->paginate(3);
            return view('admin.orderdetail.index',compact(['orderdetails']));
            //code...
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $order_id)
    {
        try {
            //code...
            $this->authorize('create',OrderDetail::class);
            $products = Product::get();
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
        try {
            //code...
            $detail = OrderDetail::findOrFail($id);
            $this->authorize('update', $detail);
            $detail = OrderDetail::with('product')->find($id);
            $products = Product::get();
            $orders = Order::get();
            return view('admin.orderdetail.edit',compact(['detail','products','orders']));
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
        try {
            //code...
            $this->authorize('viewTrash',OrderDetail::class);
            $orderdetails = OrderDetail::onlyTrashed()->with('order','product')->paginate(3);
            return view('admin.orderdetail.trash',compact(['orderdetails']));
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }
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
    function restore(String $id){
        try {
            //code..
            // $order = Order::findOrFail($id);
            $orderdetail = OrderDetail::withTrashed()->find($id);
            // dd($orderdetail->order_id);
            $this->authorize('restore',$orderdetail);
            $orderdetail->restore();
            alert()->success('Restore order detail success');
            return redirect()->route('order.show',$orderdetail->order_id);
        } catch (\Exception $e) {
            // Log::error($e->getMessage());
            alert()->warning('Have problem! Please try again late');
            return back();
        }
    }
    function deleteforever(String $id){
        try {
            //code..
            $orderdetail = OrderDetail::withTrashed()->find($id);
            $this->authorize('forceDelete',$orderdetail);
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
