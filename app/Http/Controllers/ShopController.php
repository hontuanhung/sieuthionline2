<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\shop;
use App\Models\product;
use App\Models\category_product;
use Session;
session_start();


class ShopController extends Controller
{
    //frontend
    public function register_shop(){
    	return view('pages.shop.register_shop');
    }
    public function login_shop(){
    	return view('pages.shop.login_shop');
    }
    public function profile_shop($shop_id){
        $shop_product = product::orderby('product_id','desc')->where('shop_id',$shop_id)->get();
        return view('pages.shop.profile_shop')->with('shop_product',$shop_product);
    }
    public function logout_shop(){
        Session::put('shop_id',null);
        Session::put('shop_name',null);
        Session::put('customer_id',null);
        Session::put('customer_name',null);
        return Redirect::to('trangchu');
    }
    public function chitietshop($shop_id){
        $product_shop = product::where('shop_id',$shop_id)->get();
        $shop = shop::where('shop_id',$shop_id)->first();
        return view('pages.shop.all_product_shop')->with('product_shop',$product_shop)->with('shop',$shop);
    }
    public function save_shop(Request $request){
        $rules=[
            'shop_name' => 'required|min:6|max:40',
            'shop_email' => 'required|email|unique:tbl_shop,shop_email',
            'shop_password' => 'required|min:6|max:30',
            'shop_address' => 'required|min:10|max:200',
            'shop_phone' => 'required|numeric',
         ];
         $messages = [
            //name
            'shop_name.required' => 'Tên không được để trống !',
            'shop_name.min' => 'Tên không được ít hơn 6 ký tự !',
            'shop_name.max' => 'Tên không được nhiều hơn 40 ký tự !',
            //email
            'shop_email.required' => 'Trường email không được để trống !',
            'shop_email.email' => 'Trường email không hợp lệ !',
            'shop_email.unique' => 'Email này đã tồn tại !',
            //address
            'shop_address.required' => 'Địa chỉ không được để trống !',
            'shop_address.min' => 'Địa chỉ không được ít hơn 30 ký tự !',
            'shop_address.max' => 'Địa chỉ không được nhiều hơn 200 ký tự !',
            //phone
            'shop_phone.required' => 'Số điện thoại không được để trống !',
            'shop_phone.numeric' => 'Số điện thoại phải là ký tự số !',
            //password
            'shop_password.required' => 'Mật khẩu không được để trống !',
            'shop_password.min' => 'Mật khẩu không được nhỏ hơn 6 ký tự !',
            'shop_password.max' => 'Mật khẩu không được lớn hơn 30 ký tự !',
         ];

         $validator = Validator::make($request->all(),$rules,$messages);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
         }else{
            	$data = $request->all();
            	$shop = new shop();
            	$shop->shop_name = $data['shop_name'];
            	$shop->shop_email = $data['shop_email'];
            	$shop->shop_password = md5($data['shop_password']);
            	$shop->shop_address = $data['shop_address'];
            	$shop->shop_phone = $data['shop_phone'];
            	$shop->save();
            	return Redirect::to('register-shop')->with('message','Đăng ký gian hàng thành công !');
        }
    }
    public function loginshop(Request $request){
    	$shop_email = $request->shop_email;
    	$shop_password = md5($request->shop_password);
    	$result = shop::where('shop_email',$shop_email)->where('shop_password',$shop_password)->first();
    	if ($result) {
    		$shop_id = $result->shop_id;
    		$shop_name = $result->shop_name;
    		Session::put('shop_id',$shop_id);
    		Session::put('shop_name',$shop_name);
    		return Redirect::to('trangchu');
    	}else{
    		return Redirect()->back()->with('message','Bạn đã nhập sai email hoặc mật khẩu');
    	}
    }

    //Backend
    public function add_shop_admin(){
        return view('admin.shop.add_shop');
    }

    public function save_shop_admin(Request $request){
        $rules=[
            'shop_name' => 'required|min:6|max:40',
            'shop_email' => 'required|email|unique:tbl_shop,shop_email',
            'shop_password' => 'required|min:6|max:30',
            'shop_address' => 'required|min:10|max:200',
            'shop_phone' => 'required|numeric',
         ];
         $messages = [
            //name
            'shop_name.required' => 'Tên không được để trống !',
            'shop_name.min' => 'Tên không được ít hơn 6 ký tự !',
            'shop_name.max' => 'Tên không được nhiều hơn 40 ký tự !',
            //email
            'shop_email.required' => 'Trường email không được để trống !',
            'shop_email.email' => 'Trường email không hợp lệ !',
            'shop_email.unique' => 'Email này đã tồn tại !',
            //address
            'shop_address.required' => 'Địa chỉ không được để trống !',
            'shop_address.min' => 'Địa chỉ không được ít hơn 30 ký tự !',
            'shop_address.max' => 'Địa chỉ không được nhiều hơn 200 ký tự !',
            //phone
            'shop_phone.required' => 'Số điện thoại không được để trống !',
            'shop_phone.numeric' => 'Số điện thoại phải là ký tự số !',
            //password
            'shop_password.required' => 'Mật khẩu không được để trống !',
            'shop_password.min' => 'Mật khẩu không được nhỏ hơn 6 ký tự !',
            'shop_password.max' => 'Mật khẩu không được lớn hơn 30 ký tự !',
         ];

         $validator = Validator::make($request->all(),$rules,$messages);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
         }else{
                $data = $request->all();
                $shop = new shop();
                $shop->shop_name = $data['shop_name'];
                $shop->shop_email = $data['shop_email'];
                $shop->shop_password = md5($data['shop_password']);
                $shop->shop_address = $data['shop_address'];
                $shop->shop_phone = $data['shop_phone'];
                $shop->save();
                return Redirect::to('add-shop-admin')->with('message','Đăng ký gian hàng thành công !');
        }
    }

    public function all_shop_admin(){
        $all_shop = shop::all();
        return view('admin.shop.all_shop')->with('all_shop',$all_shop);
    }

    public function edit_shop_admin($shop_id){
        $shop = shop::where('shop_id',$shop_id)->get();
        return view('admin.shop.edit_shop')->with('shop',$shop);
    }

    public function update_shop_admin(Request $request,$shop_id){
        $data = $request->all();
        $shop = shop::find($shop_id);
        $shop->shop_name = $data['shop_name'];
        $shop->shop_email = $data['shop_email'];
        $shop->shop_password = md5($data['shop_password']);
        $shop->shop_phone = $data['shop_phone'];
        $shop->shop_address = $data['shop_address'];
        $shop->update();
        return Redirect::to('all-shop-admin')->with('message','Sửa thông tin gian hàng thành công !');
    }

    public function delete_shop_admin($shop_id){
        shop::where('shop_id',$shop_id)->delete();
        return Redirect::to('all-shop-admin')->with('message','Xóa gian hàng thành công!');
    }
    public function add_product(){
        $category_product = category_product::orderby('category_id','desc')->get();
        return view('pages.shop.post_product')->with('category_product',$category_product);
    }
    public function post_product(Request $request){
        $rules=[
            'product_name' => 'required|min:6|max:100',
            'product_quantity' => 'required|numeric',
            'product_desc' => 'required',
            'product_price' => 'required|numeric',
            'product_image' => 'required',
        ];

        $message=[
            //name
            'product_name.required' => 'Bạn chưa nhập tên sản phẩm',
            'product_name.min' => 'Tên sản phẩm không được ít hơn 6 ký tự',
            'product_name.max' => 'Tên sản phẩm không được nhiều hơn 100 ký tự',
            //quantity
            'product_quantity.required' => 'Bạn chưa nhập số lượng sản phẩm',
            'product_quantity.numeric' => 'Số lượng sản phẩm phải được nhập bằng số',
            //desc
            'product_desc.required' => 'Bạn chưa nhập mô tả sản phẩm',
            //price
            'product_price.required' => 'Bạn chưa nhập giá sản phẩm',
            'product_price.numeric' => 'Giá sản phẩm phải được nhập bằng số',
            //image
            'product_image.required' => 'Bạn chưa chọn hình ảnh sản phẩm',
        ];

        $validator = Validator::make($request->all(),$rules,$message);
        if ($validator->fails()) {
            return Redirect()->back()->withErrors($validator)->withInput();
        }else{
           
            $data = array();
            $product = new product();
            $data['product_name'] = $request->product_name;
            $data['product_quantity'] = $request->product_quantity;
            $data['product_slug'] = $request->product_slug;
            $data['category_id'] = $request->category_id;
            $data['shop_id'] = $request->shop_id;
            $data['product_desc'] = $request->product_desc;
            $data['product_price'] = $request->product_price;
            $data['product_status'] = $request->product_status;

            $path = 'public/uploads/product/';
            $get_image = $request->file('product_image');

            if($get_image){
                $new_image = rand(0,99).'.'.$get_image->getClientOriginalName();
                $get_image->move('public/uploads/product',$new_image);
                $data['product_image'] = $new_image;
                DB::table('tbl_product')->insert($data);
                Session::put('message','Thêm sản phẩm thành công !');
                return Redirect::to('/add-product');         
            }
            $data['product_image'] = '';
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công !');
            return Redirect::to('/add-product');
        }
    }
}
