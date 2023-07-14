<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function login(){
        return view('admin.auth.login');    
    }
    function checkLogin(Request $request){
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $user = User::where('email',$request->email)->first();
        if($user && Hash::check($request->password,$user->password) && Auth::attempt($arr)){
            $request->session->push('login',true);
            alert()->success('Success Login');
            return redirect()->route('user.index');
        }else{
            $message = 'Login failed. Please try again';
            $request->session()->flash('login-fail',$message);
            return redirect()->route('user.login');
        }
    }
    public function index()
    {
        $users = User::paginate(3);
        $param = [
            'users' => $users,
        ];
        return view('admin.user.index',$param);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
