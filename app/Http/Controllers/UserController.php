<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    // Login
    public function viewLogin()
    {
        return view('users.login');
    }
    public function loginPost(Request $request, Users $users){
        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];
        $users = $users->where('email', $email)->first();
        if ($users !== null){
            $type = $users->user_type;
            $status = $users->status;
            if ($type == 0 && $status == 1) {
                if ( Hash::check($password, $users->password) ){
                    // Lưu id
                    Session::put('user_id', $users->id);
                    $usersID = $users->id;
                    return redirect()->route('homeUser',$usersID);
                }
                else{
                    return redirect()->route('login')->with('errorPassword', 'sai mật khẩu');
                }
            }
            else{
                return redirect()->route('login')->with('errorAccount','tài khoản đã bị khóa');
            }
        }
        else{
            return redirect()->route('login')->with('errorEmail', 'Sai email');
        }
    }


    // đăng ký
    public function viewRegister()
    {
        return view('users.register');
    }
    public function registerPost(Request $request){
        $data = $request->except('pwd-repeat');
        $data['user_type'] = 0;
        $data['status'] = 1;
        $data['password'] = bcrypt($data['password']);
        Users::create($data);
        return redirect() ->route('login');
    }

    // chỉnh sửa thông tin cá nhân
    public function viewUpdate(){
        $usersID = Session::get('user_id');
        $users =Users::findOrFail($usersID);
        return view('users.update', compact('users'));
    }
    public function update(Request $request){
        $usersID = Session::get('user_id');
        $data = $request->only(['name', 'user_name', 'email']);
        $users =Users::findOrFail($usersID);
        $users -> update($data);
        return redirect() ->back()->with('successful','lưu thành công');
    }

    // thay đổi mật khẩu
    public function viewUpdatePassword(){
        $usersID = Session::get('user_id');
        $users =Users::findOrFail($usersID);
        return view('users.updatePassword',compact('users'));
    }
    public function updatePassword(Request $request){
        $usersID = Session::get('user_id');
        $data = $request->only('password','passwordOld');
        $data['password'] = bcrypt($data['password']);
        $users =Users::findOrFail($usersID);
        if (Hash::check($data['passwordOld'], $users->password)){
            $users->update($data);
            return redirect() ->back()->with('successful','lưu thành công');
        }
        return back()->with('erroPassword','lỗi mật khẩu');
    }
}
