<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
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
            $orders = Order::orderby('id','DESC')->with('customer','orderdetail')->paginate(5);
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
            $products = Product::where('status',1)->get();
            $param =[
                'customers' =>  $customers,
                'products' =>  $products
            ];
            return view('admin.order.create',$param);
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
        try{
            $order = new Order();
            $order->customer_id = $request->customer_id;
            $order->note = $request->note;
            $order->date_ship = Carbon::now()->addDays(5);
            $order->total = 0;
            $order->save();
            
            // update product.quantity, product.selled
            $product = Product::find($request->product_id);
            $product->quantity -= $request->quantity;
            $product->selled += $request->quantity;
            $product->save();
            //finish

            // add orderdetail
            $detail = new OrderDetail();
            $detail->order_id = $order->id;
            $detail->product_id = $request->product_id;
            $detail->quantity = $request->quantity;
            $price = $product->price;
            $discount = $product->discount;
            $total = ($price - ($price/100)*$discount)*$request->quantity;
            $detail->total = $total;
            $detail->save();
            //finish

            $order->total = $detail->total;
            $order->save();
            alert()->success('Success created');
            return redirect()->route('order.index');
        } catch (\Exception $e) {
            alert()->warning('Bạn không có quyền truy cập');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        try {
            //code...
            $order = Order::with('orderdetail','customer')->orderBy('id', 'DESC')->findOrFail($id);
            $this->authorize('view', $order);
            $details = OrderDetail::with('product')->where('order_id',$id)->paginate(3);
            $param = [
                'order' => $order,
                'details' => $details,
            ];
            return view('admin.order.show',$param);
        } catch (\Exception $e) {
            alert()->warning('Bạn không có quyền truy cập');
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
            $status = $order->status == 0;
            if ($status && $this->authorize('update',$order)) {
                return view('admin.order.edit',compact(['customers','order']));
            }
            return back();
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
        try{
            $order = Order::find($id);
            $order->date_ship = $request->date_ship;
            $order->note = $request->note;
            $order->status = $request->status;
            $order->save();
            alert()->success('Success updated');
            return redirect()->route('order.index');
        } catch (\Exception $e) {
            alert()->warning('Bạn không có quyền truy cập');
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
            $order = Order::find($id);
            $status = $order->status == 0;
            if ($status && $this->authorize('delete',$order)) {
                $order->delete();
                alert()->success('Success move to trash');
                return back();
            }
            return back();
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }
}