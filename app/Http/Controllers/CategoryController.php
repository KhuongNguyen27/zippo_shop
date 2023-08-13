<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $this->authorize('viewAny',Category::class);
            $categories = Category::orderBy('id', 'DESC')->paginate(2);
            $param = [
                'categories' => $categories
            ];   
            return view('admin.category.index',$param);
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
            $this->authorize('create',Category::class);
            return view('admin.category.create');
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        }     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try{
            $category = new Category();
            $category->name = $request->name;
            $fieldName = 'image';
            if ($request->hasFile($fieldName)) {
                $get_img = $request->file($fieldName);
                $path = 'storage/category/';
                $new_name_img = rand(1,100).$get_img->getClientOriginalName();
                $get_img->move($path,$new_name_img);
                $category->image = $path.$new_name_img;
            }
            $category->save();
            alert()->success('Success created');
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            alert()->warning('Bạn không có quyền truy cập');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        try {
            $this->authorize('update',Category::class);
            $category = Category::find($id);
            $param = [
                'category' => $category,
            ];
            return view('admin.category.edit',$param);
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, String $id)
    {
        try{
            $category = Category::find($id);
            $category->name = $request->name;
            $fieldName = 'image';
            if ($request->hasFile($fieldName)) {
                $path = $category->image;
                if (file_exists($path)) {
                    unlink($path);
                }
                $get_img = $request->file($fieldName);
                $path = 'storage/category/';
                $new_name_img = rand(1,100).$get_img->getClientOriginalName();
                $get_img->move($path,$new_name_img);
                $category->image = $path.$new_name_img;
            }
            $category->save();
            alert()->success('Success updated');
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            alert()->warning('Bạn không có quyền truy cập');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    function trash(){
        try {
            $this->authorize('viewTrash',Category::class);
            $categories = Category::orderBy('id', 'DESC')->onlyTrashed()->paginate(2);
            return view('admin.category.trash',compact('categories'));
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        }   
    }
    function destroy(String $id)
    {
        try {
            $this->authorize('delete',Category::class);
            $category = Category::find($id);
            $category->delete();
            alert()->success('Success move to trash');
            return back();
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }
    function restore(String $id){
        try {
            $this->authorize('restore',Category::class);
            $category = Category::withTrashed()->find($id);
            $category->restore();
            alert()->success('Restore category success');
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            // Log::error($e->getMessage());
            alert()->warning('Have problem! Please try again late');
            return redirect()->route('category.index');
        }
    }
    function deleteforever(String $id){
        try {
            $this->authorize('forceDelete',Category::class);
            $softs = Category::withTrashed()->find($id);
            $softs->forceDelete();
            alert()->success('Destroy category success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Log::error($e->getMessage());
            alert()->warning('Have problem! Please try again late');
            return back();
        }
    }
}