<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            //code...
            $this->authorize('viewAny',User::class);
            $users = User::orderby('group_id','ASC')->with('group')->paginate(3);
            $param = [
                'users' => $users,
            ];
            return view('admin.user.index',$param);
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
            $this->authorize('create',User::class);
            $groups = Group::where('id','<>',1)->get();
            return view('admin.user.create',compact(['groups']));
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->day_of_birth = $request->day_of_birth;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->group_id = $request->group_id;
        $user->password = bcrypt($request->password);
        $fieldName = "image";
        if ($request->hasFile($fieldName)) {
            $path = 'storage/user/';
            $get_img = $request->file($fieldName);
            $new_name_img = $request->name.$get_img->getClientOriginalName();
            $get_img->move($path,$new_name_img);
            $user->image = $path.$new_name_img;
        }
        $user->save();
        alert()->success('Created Success');
        return redirect()->route('user.index');
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
    public function edit(String $id)
    {
        try {
            //code...
            $this->authorize('update',User::class);
            $user = User::with('group')->find($id);
            $groups = Group::where('id','<>',1)->get();
            $param = [
                'user' => $user,
                'groups' => $groups,
            ];
            return view('admin.user.edit',$param);
        } catch (\Exception $e) {
            alert()->warning('Have problem! Please try again late');
            return back();
        } 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request,String $id)
    {
        $user = User::find($id);
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $fieldName = "image";
        if ($request->hasFile($fieldName)) {
            $path = $user->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'storage/user/';
            $get_img = $request->file($fieldName);
            $new_name_img = $request->name.$get_img->getClientOriginalName();
            $get_img->move($path,$new_name_img);
            $user->image = $path.$new_name_img;
        }
        $user->save();
        alert()->success('Update Success');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        try {
            $this->authorize('delete',User::class);
            $user = User::find($id);
            $get_img = $user->image;
            if (file_exists($get_img)) {
                unlink($get_img);
            }
            $user->delete();
            alert()->success('Delete Success');
            return redirect()->route('user.index');
        } catch (\Exception $e) {
            alert()->warning('Delete Error');
            return back();
        }
    }
    public function forgotpassword(User $user)
    {
        return view('admin.forgotpassword.forgot');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function postforgot(Request $request)
    {
        $user = User::where('email', $request->email)->first(); // Tìm người dùng dựa trên địa chỉ email yêu cầu
        if ($user) {
            $pass = Str::random(6);
            $user->password = bcrypt($pass);
            $user->save();

            $data = [
                'name' => $user->name,
                'pass' => $pass,
                'email' => $user->email,
            ];

            Mail::send('shop.forgotpassword.sendmail', compact('data'), function ($email) use ($user) {
                $email->from($user->email, 'Zippo Viet Nam'); // Địa chỉ email và tên người gửi là email của người dùng
                $email->subject('Forgot Password');
                $email->to($user->email, $user->name);
            });
        }
        return redirect()->route('auth.login');
    }
}