<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('customer','orderdetail')->paginate(3);
        $max_quantities = DB::table('products')
        ->select('id', DB::raw('max(quantity) as max_quantity'))
        ->groupBy('id')
        ->get();

        return view('admin.order.index',compact(['orders','max_quantity']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::get();
        return view('admin.order.create',compact(['customers']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->date_ship = $request->date_ship;
        $order->note = $request->note;
        $order->save();
        alert()->success('Success created');
        return redirect()->route('orderdetail.create',$order->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $orderdetails =  OrderDetail::where('order_id',$id)->paginate(3);
        return view('admin.orderdetail.index',compact(['orderdetails','id']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $customers = Customer::get();
        $order = Order::find($id);
        return view('admin.order.edit',compact(['customers','order']));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, String $id)
    {
        $order = Order::find($id);
        $order->customer_id = $request->customer_id;
        $order->date_ship = $request->date_ship;
        $order->note = $request->note;
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
        $orders = Order::onlyTrashed()->with('customer')->paginate(3);
        return view('admin.order.trash',compact(['orders']));
    }
    public function destroy(String $id)
    {
        $order = Order::find($id);
        $order->delete();
        alert()->success('Success move to trash');
        return back();
    }
    function restore(String $id){
        try {
            $order = Order::withTrashed()->find($id);
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
