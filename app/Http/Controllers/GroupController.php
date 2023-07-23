<?php

namespace App\Http\Controllers;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::with('user')->get();
        return view('admin.group.index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.group.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $group = new Group();
        $group->name = $request->name;
        $group->save();
        alert()->success('Created Success');
        return redirect()->route('group.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::where('group_id',$id)->paginate(3);
        return view('admin.group.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Group::destroy($id);
        alert()->success('Delete Success');
        return redirect()->route('group.index');
    }
}
