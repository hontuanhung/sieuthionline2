<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\admin;
use App\Models\roles;
use Auth;

class AuthController extends Controller
{
   	public function register_auth(){
   		return view('admin.auth.register_auth');
   	}
   	public function register(Request $request){
         $rules=[
            'admin_name' => 'required|min:6|max:40',
            'admin_email' => 'required|email|unique:tbl_admin,admin_email',
            'admin_phone' => 'required|numeric|unique:tbl_admin,admin_phone',
            'admin_password' => 'required|min:6|max:16',
         ];
         $messages = [
            //name
            'admin_name.required' => 'Trường họ tên không được để trống !',
            'admin_name.min' => 'Trường họ tên không được ít hơn 6 ký tự !',
            'admin_name.max' => 'Trường họ tên không được nhiều hơn 40 ký tự !',
            //email
            'admin_email.required' => 'Trường email không được để trống !',
            'admin_email.email' => 'Trường email không hợp lệ !',
            'admin_email.unique' => 'Email này đã tồn tại !',
            //phone
            'admin_phone.required' => 'Trường số điện thoại không được để trống !',
            'admin_phone.numeric' => 'Trường số điện thoại không hợp lệ ,số điện thoại phải là ký tự số !',
            'admin_phone.unique' => 'Số điện thoại này đã được đặt trong một tài khoản khác !',
            //password
            'admin_password.required' => 'Trường mật khẩu không được để trống !',
            'admin_password.min' => 'Trường mật khẩu không được nhỏ hơn 6 ký tự !',
            'admin_password.max' => 'Trường mật khẩu không được lớn hơn 16 ký tự !',
         ];
   		$validator = Validator::make($request->all(),$rules,$messages);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
         }else{
            $data = $request->all();
            $admin = new admin();
            $admin->admin_name = $data['admin_name'];
            $admin->admin_email = $data['admin_email'];
            $admin->admin_phone = $data['admin_phone'];
            $admin->admin_password = md5($data['admin_password']);
            $admin->save();
            return redirect('register-admin')->with('message','Đăng ký thành công !');
         }
      }

      public function login_admin(){
         return view('admin_login');
      }

      public function logout_admin(){
         Auth::logout();
         return Redirect('/admin')->with('message','Đăng xuất thành công !');
      }

      public function login(Request $request){
         $rules=[
            'admin_email' => 'required|email',
            'admin_password' => 'required',
         ];
         $messages=[
            'admin_email.required' => 'Chưa nhập vào trường email',
            'admin_email.email' => 'Email không hợp lệ',
            'admin_password.required' => 'Chưa nhập vào trường mật khẩu',
         ];

         $validator = Validator::make($request->all(),$rules,$messages);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
         }else{
            if (Auth::attempt(['admin_email'=>$request->admin_email,'admin_password'=>$request->admin_password])) {
               return Redirect('/dashboard');
            }else{               
               return Redirect('login-admin')->with('message','Email hoặc mật khẩu không đúng !');
            }
         }         
      }
}
