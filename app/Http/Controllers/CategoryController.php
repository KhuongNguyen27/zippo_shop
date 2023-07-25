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
            $categories = Category::paginate(5);
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
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
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
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        alert()->success('Success updated');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    function trash(){
        try {
            $this->authorize('viewTrash',Category::class);
            $softs = Category::onlyTrashed()->paginate(5);
            return view('admin.category.trash',compact('softs'));
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