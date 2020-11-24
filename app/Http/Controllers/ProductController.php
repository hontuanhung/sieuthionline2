<?php

namespace App\Http\Controllers;

use Session;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\shop;
use App\Models\product;
use App\Models\category_product;
session_start();

class ProductController extends Controller
{
    public function allproduct(){
    	return view('pages.product.allproduct');
    }

    public function chitietsanpham($product_slug,$shop_id){
        $product_chitiet = product::where('product_slug',$product_slug)->first();
        $related_product = product::orderBy('product_id','desc')->get();
        $shop = shop::where('shop_id',$shop_id)->first();
    	return view('pages.product.singleproduct')->with('product_chitiet',$product_chitiet)->with('related_product',$related_product)->with('shop',$shop);
    }

    public function all_product_admin(){
        $product = product::orderBy('product_id','desc')->get();
    	return view('admin.product.all_product')->with('product',$product);
    }

    public function add_product_admin(){
        $category_product = category_product::orderBy('category_id','desc')->get();
    	return view('admin.product.add_product')->with('category_product',$category_product);
    }

    public function save_product_admin(Request $request){
        $rules=[
            'product_name' => 'required|min:15|max:40',
            'product_quantity' => 'required|numeric',
            'product_desc' => 'required',
            'product_price' => 'required|numeric',
            'product_image' => 'required',
        ];

        $message=[
            //name
            'product_name.required' => 'Bạn chưa nhập tên sản phẩm',
            'product_name.min' => 'Tên sản phẩm không được ít hơn 15 ký tự',
            'product_name.max' => 'Tên sản phẩm không được nhiều hơn 40 ký tự',
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
                return Redirect::to('/add-product-admin');         
            }
            $data['product_image'] = '';
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công !');
            return Redirect::to('/add-product-admin');
        }
    }

    public function edit_product_admin($product_id){
        $category_product = category_product::orderBy('category_id','desc')->get();
        $edit_product = product::where('product_id',$product_id)->get();
        return view('admin.product.edit_product')->with('edit_product',$edit_product)->with('category_product',$category_product);
    }

    public function update_product_admin(Request $request,$product_id){
        $rules=[
            'product_name' => 'required|min:15|max:40',
            'product_quantity' => 'required|numeric',
            'product_desc' => 'required',
            'product_price' => 'required|numeric',
        ];

        $message=[
            //name
            'product_name.required' => 'Bạn chưa nhập tên sản phẩm',
            'product_name.min' => 'Tên sản phẩm không được ít hơn 15 ký tự',
            'product_name.max' => 'Tên sản phẩm không được nhiều hơn 40 ký tự',
            //quantity
            'product_quantity.required' => 'Bạn chưa nhập số lượng sản phẩm',
            'product_quantity.numeric' => 'Số lượng sản phẩm phải được nhập bằng số',
            //desc
            'product_desc.required' => 'Bạn chưa nhập mô tả sản phẩm',
            //price
            'product_price.required' => 'Bạn chưa nhập giá sản phẩm',
            'product_price.numeric' => 'Giá sản phẩm phải được nhập bằng số',
        ];

        $validator = Validator::make($request->all(),$rules,$message);
        if ($validator->fails()) {
            return Redirect()->back()->withErrors($validator)->withInput();
        }else{$data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_slug'] = $request->product_slug;
        $data['product_price'] = $request->product_price;
        $data['shop_id'] = $request->shop_id;
        $data['product_desc'] = $request->product_desc;
        $data['category_id'] = $request->category_id;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        
        if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/uploads/product',$new_image);
                    $data['product_image'] = $new_image;
                    DB::table('tbl_product')->where('product_id',$product_id)->update($data);
                    Session::put('message','Cập nhật sản phẩm thành công');
                    return Redirect::to('all-product-admin');
        }
    }
            
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product-admin');
    }

    public function delete_product_admin($product_id){
        product::where('product_id',$product_id)->delete();
        return Redirect::to('all-product-admin')->with('message','Đã xóa sản phẩm thành công !');
    }
}
