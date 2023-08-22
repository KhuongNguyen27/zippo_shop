<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterAuthRequest;
use App\Http\Requests\LoginAuthRequest;
use App\Models\User;
use App\Models\Group;
use App\Models\Category;
use App\Models\Product;
use App\Models\Session as CheckLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    function login(){
        return view('admin.auth.login');    
    }
    function checkLogin(LoginAuthRequest $request) {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        try {
            $user = User::where('email',$request->email)->first();
            if ($user) {
                $check = CheckLogin::where('user_id', $user->id)->first();
                if ($check) {
                    $check->delete();
                }
            }
            try {
                Auth::attempt($arr);
                alert()->success('Success Login');
                return redirect()->route('category.index');
            }
            catch (\Exception $e) {
                return back();
            }
        }catch (\Exception $e) {
            alert()->warning('Login fail');
            $message = 'Login failed. Please try again';
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
        $groups = Group::where('id','<>',1)->get();
        return view('admin.auth.register',compact('groups'));
    }
    public function checkRegister(RegisterAuthRequest $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->day_of_birth = $request->day_of_birth;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->phone = $request->phone;
            $user->group_id = $request->group_id;
            $user->password = $request->password;
            $fieldName = 'image';
            if($request->hasFile($fieldName)){
                $path = 'admin/user/';
                $get_img = $request->file($fieldName);
                $new_name_img = rand(1,10).$get_img->getClientOriginalName();
                $get_img->move($path,$new_name_img);
                $user->image = $path.$new_name_img;                 
            }
            $user->save(); 
            $message = "Successfully register";
            $request->session()->flash('register-true',$message);
            return redirect()->route('home');
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        }    
    }
    function search(Request $request){
        $url = $request->url;
        $search = $request->search;
        $path = parse_url($url, PHP_URL_PATH);
        $filename = pathinfo($path, PATHINFO_FILENAME);
        switch ($filename) {
            case 'category':
                $categories = Category::where('name',$search)->paginate(3);
                return view('admin.category.index',compact('categories'));
                break;
            case 'product':
                $products = Product::where('name',$search)
                                ->orWhere('quantity',$search)
                                ->orWhere('discount',$search)
                                ->orWhere('price',$search)
                                ->paginate(3);
                return view('admin.product.index',compact('products'));
                break;
            default:
                alert()->warning('Have problem, Please try again late');
                break;
        }
    }
}