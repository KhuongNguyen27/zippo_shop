<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::paginate(3);
        return view('admin.customer.index',compact(['customers']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        // dd($request);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->day_of_birth = $request->day_of_birth;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->gender = $request->gender;
        $customer->phone = $request->phone;
        $customer->password = bcrypt($request->password);
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $get_img = $request->file($fieldName);
            $path = 'storage/customer/';
            $new_name_img = rand(1,100).$get_img->getClientOriginalName();
            $get_img->move($path,$new_name_img);
            $customer->image = $path.$new_name_img;
        } 
        $customer->save();
        alert()->success('Success Created');
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $customer = Customer::find($id);
        return view('admin.customer.edit',compact(['customer']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, String $id)
    {
        // dd($request);
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->day_of_birth = $request->day_of_birth;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->gender = $request->gender;
        $customer->phone = $request->phone;
        $customer->password = bcrypt($request->password);
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $path = $customer->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'storage/customer/';
            $get_img = $request->file($fieldName);
            $new_name_img = $request->email.$get_img->getClientOriginalName();
            $get_img->move($path,$new_name_img);
            $customer->image = $path.$new_name_img;
        } 
        $customer->save();
        alert()->success('Success update');
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash()
    {
        $customers = Customer::onlyTrashed()->paginate(3);
        return view('admin.customer.trash',compact(['customers']));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        alert()->success('Success move to trash');
        return back();
    }
    function restore(String $id){
        try {
            $customer = Customer::withTrashed()->find($id);
            $customer->restore();
            alert()->success('Restore customer success');
            return redirect()->route('customer.index');
        } catch (\Exception $e) {
            // Log::error($e->getMessage());
            alert()->warning('Have problem! Please try again late');
            return redirect()->route('customer.index');
        }
    }
    function deleteforever(String $id){
        try {
            $customer = Customer::withTrashed()->find($id);
            $path = $customer->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $customer->forceDelete();
            alert()->success('Destroy customer success');
            return back();
        } catch (\Exception $e) {
            // Log::error($e->getMessage());
            alert()->warning('Have problem! Please try again late');
            return back();
        }
    }
}
