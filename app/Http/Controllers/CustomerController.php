<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function add_customer(){
    	return view('admin.customer.add_customer');
    }
    public function all_customer(){
    	$customer = customer::all();
    	return view('admin.customer.all_customer')->with('customer',$customer);
    }
    public function edit_customer($customer_id){
    	$customer = customer::where('customer_id',$customer_id)->get();
    	return view('admin.customer.edit_customer')->with('customer',$customer);
    }   
    public function delete_customer($customer_id){
    	customer::where('customer_id',$customer_id)->delete();
    	return Redirect::to('all-customer-admin')->with('message','Đã xóa tài khoản customer thành công !');
    }
    public function save_customer(Request $request){
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
	    	$customer->customer_phone = $data['phone_customer'];
	    	$customer->customer_password = md5($data['password_customer']);
	    	$customer->save();
	    	return Redirect::to('add-customer-admin')->with('message','Thêm tài khoản customer thành công!');
	    }
    }

    public function update_customer(Request $request,$customer_id){
    	$rules=[
            'name_customer' => 'required|min:6|max:40',
            'email_customer' => 'required|email',
            'phone_customer' => 'required|numeric',
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
            //phone
            'phone_customer.required' => 'Trường số điện thoại không được để trống !',
            'phone_customer.numeric' => 'Trường số điện thoại không hợp lệ ,số điện thoại phải là ký tự số !',
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
	    	$customer = customer::find($customer_id);
	    	$customer->customer_name = $data['name_customer'];
	    	$customer->customer_email = $data['email_customer'];
	    	$customer->customer_phone = $data['phone_customer'];
	    	$customer->customer_password = md5($data['password_customer']);
	    	$customer->update();
	    	return Redirect::to('add-customer-admin')->with('message','Cập nhập tài khoản customer thành công!');
	    }
    }
}
