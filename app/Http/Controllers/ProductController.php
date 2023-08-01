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
        try {
            //code...
            $this->authorize('viewAny',Product::class);
            $products = Product::orderby('id','DESC')->with('category')->paginate(3);
            return view('admin.product.index',compact('products'));
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
            $this->authorize('create',Product::class);
            $categories = Category::get();
            return view('admin.product.create',compact('categories'));
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
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
        $product->description = $request->description; 
        $product->quantity = $request->quantity; 
        $product->discount = 0; 
        $product->selled = 0;
        $product->status = $request->status;
        if ($product->quantity > 0) {
            $product->status = 1;
        }
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $get_img = $request->file($fieldName);
            $path = 'storage/product/';
            $new_name_img = $request->name.$get_img->getClientOriginalName();
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
        try {
            //code...
            $product = Product::find($id);
            $this->authorize('update',$product);
            $categories = Category::get();
            return view('admin.product.edit',compact(['product','categories']));
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, String $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount = $request->discount;
        $product->status = $request->status;
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
        try {
            //code...
            $this->authorize('viewTrash',Product::class);
            $products = Product::onlyTrashed()->paginate(3);
            $param = [
                'products' => $products,
            ];
            return view('admin.product.trash',$param);
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
            $product = Product::find($id);
            $this->authorize('delete',$product);
            $product->delete();
            alert()->success('Success move to trash');
            return back();
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }
    function restore(String $id){
        try {
            $softs = Product::withTrashed()->find($id);
            $this->authorize('restore',$softs);
            $softs->restore();
            alert()->success('Restore product success');
            return redirect()->route('product.index');
        } catch (\Exception $e) {
            // Log::error($e->getMessage());
            alert()->warning('Have problem! Please try again late');
            return back();
        }
    }
    function deleteforever(String $id){
        try {
            $softs = Product::withTrashed()->find($id);
            $this->authorize('forceDelete',$softs);
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
