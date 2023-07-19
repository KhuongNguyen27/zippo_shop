<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories = Category::paginate(3);
        $param = [
            'categories' => $categories
        ];   
        return view('admin.category.index',$param);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $fieldName = 'image';
        if($request->hasFile($fieldName)){
            $get_img = $request->file($fieldName);
            $path = 'storage/category/';
            $new_name_img = $request->name.$get_img->getClientOriginalName();
            $get_img->move($path,$new_name_img);
            $category->image = $path.$new_name_img;
        }
        $category->save();
        alert()->success('Success created');
        return redirect()->route('category.index');
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
        $category = Category::find($id);
        $param = [
            'category' => $category,
        ];
        return view('admin.category.edit',$param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, String $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $fieldName = 'image';
        if($request->hasFile($fieldName)){
            $path = $category->image;
            if(file_exists($path)){
                unlink($path);
            }
            $get_img = $request->file($fieldName);
            $path = 'storage/category/';
            $new_name_img = $request->email.$get_img->getClientOriginalName();
            $get_img->move($path,$new_name_img);
            $category->image = $path.$new_name_img;
        }
        $category->save();
        alert()->success('Success updated');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    function trash(){
        $softs = Category::onlyTrashed()->paginate(3);
        return view('admin.category.trash',compact('softs'));
    }
    function destroy(String $id)
    {
        $category = Category::find($id);
        $category->delete();
        alert()->success('Success move to trash');
        return back();
    }
    function restore(String $id){
        try {
            $softs = Category::withTrashed()->find($id);
            $softs->restore();
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
            $softs = Category::withTrashed()->find($id);
            $path = $softs->image;
            if (file_exists($path)) {
                unlink($path);
            }
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
