<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Requests\StoreOrderRequest;


class OrderController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            //code...
            $this->authorize('viewAny',Order::class);
            $orders = Order::with('customer','orderdetail')->paginate(3);
            return view('admin.order.index',compact(['orders']));
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            //code...
            $this->authorize('create',Order::class);
            $customers = Customer::get();
            return view('admin.order.create',compact(['customers']));
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->date_ship = $request->date_ship;
        $order->description = $request->description;
        $order->save();
        alert()->success('Success created');
        return redirect()->route('orderdetail.create',$order->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        try {
            //code...
            $order = Order::findOrFail($id);
            $this->authorize('view', $order);
            $orderdetails =  OrderDetail::where('order_id',$id)->paginate(3);
            return view('admin.orderdetail.index',compact(['orderdetails','id']));
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        try {
            //code...
            $customers = Customer::get();
            $order = Order::find($id);
            $this->authorize('update',$order);
            return view('admin.order.edit',compact(['customers','order']));
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, String $id)
    {
        $order = Order::find($id);
        $order->customer_id = $request->customer_id;
        $order->date_ship = $request->date_ship;
        $order->description = $request->description;
        $order->updated_at = Carbon::now();
        $order->save();
        alert()->success('Success updated');
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */ 
    public function trash()
    {
        try {
            //code...
            $this->authorize('viewTrash',Order::class);
            $orders = Order::onlyTrashed()->with('customer')->paginate(3);
            return view('admin.order.trash',compact(['orders']));
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }
    public function destroy(String $id)
    {
        try {
            //code...
            $order = Order::find($id);
            $this->authorize('delete',$order);
            $order->delete();
            alert()->success('Success move to trash');
            return back();
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }
    function restore(String $id){
        try {
            //
            $order = Order::withTrashed()->find($id);
            $this->authorize('restore',$order);
            $order->restore();
            alert()->success('Restore order success');
            return redirect()->route('order.index');
        } catch (\Exception $e) {
            // Log::error($e->getMessage());
            alert()->warning('Have problem! Please try again late');
            return back();
        }
    }
    function deleteforever(String $id){
        try {
            $order = Order::withTrashed()->find($id);
            $this->authorize('forceDelete',$order);
            $order->forceDelete();
            alert()->success('Destroy order success');
            return back();
        } catch (\Exception $e) {
            // Log::error($e->getMessage());
            alert()->warning('Have problem! Please try again late');
            return back();
        }
    }
}
