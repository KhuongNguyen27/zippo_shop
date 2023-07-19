<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(3);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name; 
        $product->category_id = $request->category_id; 
        $product->price = $request->price; 
        $product->quantity = $request->quantity; 
        $product->discount = $request->discount; 
        $product->description = $request->description; 
        $product->selled = 0;
        $product->status = 0;
        if ($product->quantity > 0) {
            $product->status = 1;
        }
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $get_img = $request->file($fieldName);
            $path = 'storage/product/';
            $new_name_img = rand(1,100).$get_img->getClientOriginalName();
            $get_img->move($path,$new_name_img);
            $product->image = $path.$new_name_img;
        }
        $product->save();
        alert()->success('Success created');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        return view('admin.product.edit',compact(['product','categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, String $id)
    {
        // dd($request);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount = $request->discount;
        $product->description = $request->description;
        $product->status = 0;
        if ($product->quantity > 0) {
            $product->status = 1;
        }
        $fieldName='image';
        if ($request->hasFile($fieldName)) {
            $path = $product->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'storage/product/';
            $get_img = $request->file($fieldName);
            $new_name_img = rand(1,100).$get_img->getClientOriginalName();
            $get_img->move($path,$new_name_img);
            $product->image = $path.$new_name_img;
        }
        $product->save();
        alert()->success('Success updated');
        return redirect()->route('product.index');
    }
    public function trash()
    {
        $products = Product::onlyTrashed()->paginate(3);
        $param = [
            'products' => $products,
        ];
        return view('admin.product.trash',$param);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $product = Product::find($id);
        $product->delete();
        alert()->success('Success move to trash');
        return back();
    }
    function restore(String $id){
        try {
            $softs = Product::withTrashed()->find($id);
            $softs->restore();
            alert()->success('Restore product success');
            return back();
        } catch (\Exception $e) {
            // Log::error($e->getMessage());
            alert()->warning('Have problem! Please try again late');
            return redirect()->route('product.index');
        }
    }
    function deleteforever(String $id){
        try {
            $softs = Product::withTrashed()->find($id);
            $path = $softs->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $softs->forceDelete();
            alert()->success('Destroy product success');
            return back();
        } catch (\Exception $e) {
            // Log::error($e->getMessage());
            alert()->warning('Have problem! Please try again late');
            return back();
        }
    }
}
