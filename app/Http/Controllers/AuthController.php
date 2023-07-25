<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Session as CheckLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    function login(){
        // $this->logout();
        return view('admin.auth.login');    
    }
    function checkLogin(Request $request) {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $user = User::where('email',$request->email)->first();
        if ($user && Hash::check($request->password, $user->password) && Auth::attempt($arr)) {
            $check = CheckLogin::where('user_id',$user->id)->first();
            if ($check) {
                CheckLogin::where('user_id',$user->id)->delete();
            }
            $request->session()->put('login', true);
            alert()->success('Success Login');
            return redirect()->route('order.index');
        } else {
            $message = 'Login failed. Please try again';
            // $request->session()->flash('login-fail', $message);
            return back()->with('login-fail',$message);
        }
    }
    public function logout(Request $request)
    {
        // Xóa Session login, đưa người dùng về trạng thái chưa đăng nhập
        Auth::logout();
        return redirect()->route('auth.login');
    }
    public function register()
    {
        return view('admin.auth.register');
    }
    public function checkRegister(Request $request)
    {
        $user = new staff();
        $user->name = $request->name;
        $user->day_of_birth = $request->day_of_birth;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->phonenumber = $request->phonenumber;
        $user->address = $request->address;
        $user->branch = $request->branch;
        $user->password = $request->password;
        $fieldName = 'img_patch';
        if($request->hasFile($fieldName)){
            $path = 'admin/staff/';
            $get_img = $request->file($fieldName);
            $new_name_img = $request->email.$get_img->getClientOriginalName();
            $get_img->move($path,$new_name_img);
            $user->img_patch = $path.$new_name_img;                 
        }
        $user->save();
        $message = "Successfully register";
        $request->session()->flash('register-true',$message);
        return redirect()->route('home');
    }
}