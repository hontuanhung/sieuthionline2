<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\customer;
session_start();

class CheckoutController extends Controller
{
    public function LoginCustomer(){
    	return view('pages.checkout.login_customer');
    }

    public function Login_Customer(Request $request){
        $rules=[
            'email_customer' => 'required|email',
            'password_customer' => 'required',
         ];
         $messages = [
            //email
            'email_customer.required' => 'Trường email không được để trống !',
            'email_customer.email' => 'Trường email không hợp lệ !',
            //password
            'password_customer.required' => 'Trường mật khẩu không được để trống !'
         ];

         $validator = Validator::make($request->all(),$rules,$messages);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
         }else{
            $email=$request->email_customer;
            $password=md5($request->password_customer);
            $result = DB::table('tbl_customer')->where('customer_email',$email)->where('customer_password',$password)->first();
            if ($result) {
                Session::put('customer_name',$result->customer_name);
                Session::put('customer_id',$result->customer_id);
                return redirect('/trangchu');
            }else{
                return redirect()->back()->with('message','Bạn nhập sai email hoặc mật khẩu , vui lòng nhập lại');
            }
         }
    }

    public function RegisterCustomer(){
    	return view('pages.checkout.register_customer');
    }

    public function SiginCustomer(Request $request){
    	$rules=[
            'name_customer' => 'required|min:6|max:40',
            'email_customer' => 'required|email|unique:tbl_customer,customer_email',
            'phone_customer' => 'required|numeric|unique:tbl_customer,customer_phone',
            'password_customer' => 'required|min:6|max:20',
         ];
         $messages = [
            //name
            'name_customer.required' => 'Trường họ tên không được để trống !',
            'name_customer.min' => 'Trường họ tên không được ít hơn 6 ký tự !',
            'name_customer.max' => 'Trường họ tên không được nhiều hơn 40 ký tự !',
            //email
            'email_customer.required' => 'Trường email không được để trống !',
            'email_customer.email' => 'Trường email không hợp lệ !',
            'email_customer.unique' => 'Email này đã tồn tại !',
            //phone
            'phone_customer.required' => 'Trường số điện thoại không được để trống !',
            'phone_customer.numeric' => 'Trường số điện thoại không hợp lệ ,số điện thoại phải là ký tự số !',
            'phone_customer.unique' => 'Số điện thoại này đã được đặt trong một tài khoản khác !',
            //password
            'password_customer.required' => 'Trường mật khẩu không được để trống !',
            'password_customer.min' => 'Trường mật khẩu không được nhỏ hơn 6 ký tự !',
            'password_customer.max' => 'Trường mật khẩu không được lớn hơn 20 ký tự !',
         ];

         $validator = Validator::make($request->all(),$rules,$messages);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
         }else{
         	$data = $request->all();
         	$customer = new customer();
         	$customer->customer_name = $data['name_customer'];
         	$customer->customer_email = $data['email_customer'];
         	$customer->customer_password = md5($data['password_customer']);
         	$customer->customer_phone = $data['phone_customer'];
         	$customer->save();
         	return Redirect('register-customer')->with('message','Đăng ký tài khoản khách hàng thành công !');
         }        
    }
    public function logout_customer(){
        Session::put('customer_name',null);
        Session::put('customer_id',null);
        return redirect('trangchu');
    }

}
