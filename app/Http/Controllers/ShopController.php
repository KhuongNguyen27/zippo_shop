<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
use App\Models\OrderDetail;
use App\Http\Requests\ShopLoginRequest;
use App\Http\Requests\ShopRegisterRequest;
use App\Models\Session as CheckLogin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        $categories = Category::get();
        return view('shop.login',compact('categories'));
    }
    
    public function checklogin(ShopLoginRequest $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('customers')->attempt($arr) ) {
            alert()->success('Success Login');
            return redirect()->route('zipposhop.index');
        }else {
            $message = "Login fail. Please try again";
            return back()->with('login-fail',$message);
        }
    }

    public function logout()
    {
        // Xóa Session login, đưa người dùng về trạng thái chưa đăng nhập
        Auth::guard('customers')->logout();
        return redirect()->route('zipposhop.index');
    }

    public function index(Request $request)
    {
        $categories = Category::get();
        $products = Product::where('status','1')->where('quantity','>',0)->paginate(4);
        if ($request->ajax()) {
            $view = view('shop.product_home',compact('products'))->render();
            return response()->json(['html' => $view]);
        }
        $param = [
            'categories' => $categories,
            'products' => $products,
        ];
        return view('shop.home',$param);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('shop.register',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShopRegisterRequest $request)
    {
        try{
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->day_of_birth = $request->day_of_birth;
            $customer->address = $request->address;
            $customer->email = $request->email;
            $customer->gender = $request->gender;
            $customer->phone = $request->phone;
            $customer->password = bcrypt($request->password);
            $customer->image = 'shop/avt.png';
            $customer->save();
            $message = 'Register success. Login again';
            return redirect()->route('zipposhop.login')->with('register-true', $message);
        } catch (\Exception $e) {
            $message = 'Register fail. Please try again';
            return back()->with('register-false',$message);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::paginate(3);
        $product = Product::with('category')->find($id);
        $categories = Category::get();
        $param = [
            'products' => $products,
            'product' => $product,
            'categories' => $categories
        ];
        return view('shop.show',$param);
    }
    
    public function cart()
    {
        // lấy session cart nếu đã tồn tại, nếu không tồn tại khởi tạo mảng rỗng
        $categories = Category::get();
        $cart = session()->get('cart', []);
        $param = [
            'cart' => $cart,
            'categories' => $categories
        ];
        return view('shop.cart',$param);
    }
    public function addtocart($id)
    {
        $product = Product::find($id);
        
        // kiểm tra sản phẩn tồn tại hay không nếu không trả về error
        if(!$product){
            return response()->json(['error'=>'Product didnt found'],404);
        }
        
        // lấy session cart nếu đã tồn tại, nếu không tồn tại khởi tạo mảng rỗng
        $cart = session()->get('cart',[]);
        
        // tạo session lưu sản phẩm 
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'discount' => $product->discount,
                'image' => $product->image,
                'max' => $product->quantity,
            ];
        }

        // cập nhập giỏ hàng sử dụng put không sử dụng push  
        session()->put('cart',$cart);
        
        // cập nhập số lượng hàng trong giỏ ở giao diện người dùng
        $cartQuantity = count($cart);
        return response()->json(['cartQuantity' => $cartQuantity]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function checkouts()
    {
        $carts = session()->get('cart',[]);
        $categories = Category::get();
        $user = Auth::guard('customers')->user();
        if (empty($carts)) {
            alert()->warning('Didnt found product on cart');
            return back();
        }
        $param = [
            'carts' => $carts,
            'user' => $user,
            'categories' => $categories
        ];
        return view('shop.checkouts',$param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            alert()->success('Update cart success!');
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            alert()->success('Delete product success!');
        }
    }
    public function storeorder(Request $request){
        $user = Auth::guard('customers')->user()->id;
        $customer = Customer::find($user);
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->save();
        $carts = session()->get('cart',[]);
        $order = new Order();
        $order->customer_id = $user;
        $note = empty($request->note)? 'Not note' : $request->note;
        $order->note = $note;
        $order->date_ship = Carbon::now()->addDays(5);
        $order->total = 0;
        $order->save();
        foreach ($carts as $cart) {
            $product_id = $cart['id'];
            $detail_quantity = $cart['quantity'];
            
            // update product.quantity, product.selled
            $product = Product::find($product_id);
            $product->quantity -= $detail_quantity;
            $product->selled += $detail_quantity;
            $product->save();
            //finish
    
            // add orderdetail
            $detail = new OrderDetail();
            $detail->order_id = $order->id;
            $detail->product_id = $product_id;
            $detail->quantity = $detail_quantity;
            $price = $product->price;
            $discount = $product->discount;
            $total = ($price - ($price/100)*$discount)*$detail_quantity;
            $detail->total = $total;
            $detail->save();
            $order->total += $detail->total;
            //finish
        }
        $order->save();
        Session::forget('cart');
        alert()->success('Place order success. Thank you');
        return redirect()->route('zipposhop.index');
        // return response()->json(['order' => $order,'detail' => $detail]);
    }
    public function follow_order(){
        $id = Auth::guard('customers')->user()->id;
        $orders = Order::with('orderdetail')->where('customer_id',$id)->get();
        $categories = Category::get();
        return view('shop.follow_order',compact('orders','categories'));
    }
    function loginbyGG(){
        return Socialite::driver('google')->redirect();
    }
    function loginGGCallBack(){
        $user = Socialite::driver('google')->user();
        $customer = Customer::updateOrCreate([
            'email' => $user->email,
        ],[
            'name' => $user->name,
            'email' => $user->email,
            'image' => $user->avatar,
            'email_token' => $user->token,
            'email_refresh_token' => $user->refreshToken,
        ]);
        if(Auth::guard('customers')->loginUsingId($customer->id)){
            return redirect()->route('zipposhop.index');
        }
    }
}