<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category_product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class CategoryProductController extends Controller
{
    public function add_category_product(){
    	return view('admin.category_product.add_category_product');
    }

    public function edit_category_product($category_id){
        $category_product = category_product::where('category_id',$category_id)->get();
        return view('admin.category_product.edit_category_product')->with('category_product',$category_product);
    }

    public function delete_category_product($category_id){
        category_product::where('category_id',$category_id)->delete();
        return Redirect::to('/all-category-product-admin')->with('message','Xóa danh mục sản phẩm thành công!');
    }

    public function save_category_product(Request $request){
    	$rules=[
            'category_product_name' => 'required|min:2|max:50|unique:tbl_category_product,category_name',
            'category_product_desc' => 'required',
        ];

        $message=[
            //name
            'category_product_name.required' => 'Bạn chưa nhập tên danh mục sản phẩm',
            'category_product_name.min' => 'Tên danh mục sản phẩm không được ít hơn 2 ký tự',
            'category_product_name.unique' => 'Tên danh mục sản phẩm này đã tồn tại',
            'category_product_name.max' => 'Tên danh mục sản phẩm không được nhiều hơn 50 ký tự',
            //quantity
            'category_product_desc.required' => 'Bạn chưa nhập mô tả danh mục sản phẩm',
        ];

        $validator = Validator::make($request->all(),$rules,$message);
        if ($validator->fails()) {
            return Redirect()->back()->withErrors($validator)->withInput();
        }else{
            $data = $request->all();
            $category_product = new category_product();
            $category_product->category_name = $data['category_product_name'];
            $category_product->category_slug_product = $data['category_product_slug'];
            $category_product->category_desc = $data['category_product_desc'];
            $category_product->category_status = $data['category_product_status'];
            $category_product->save();
            return Redirect::to('/add-category-product-admin')->with('message','Thêm danh mục sản phẩm thành công !');
        }
    }
    
    public function all_category_product(){
            $category_product = category_product::orderby('category_id','desc')->get();
            return view('admin.category_product.all_category_product')->with('category_product',$category_product);
    }

    public function update_category_product(Request $request,$category_id){
        $rules=[
            'category_product_name' => 'required|min:2|max:50',
            'category_product_desc' => 'required',
        ];

        $message=[
            //name
            'category_product_name.required' => 'Bạn chưa nhập tên danh mục sản phẩm',
            'category_product_name.min' => 'Tên danh mục sản phẩm không được ít hơn 2 ký tự',
            'category_product_name.max' => 'Tên danh mục sản phẩm không được nhiều hơn 50 ký tự',
            //quantity
            'category_product_desc.required' => 'Bạn chưa nhập mô tả danh mục sản phẩm',
        ];

        $validator = Validator::make($request->all(),$rules,$message);
        if ($validator->fails()) {
            return Redirect()->back()->withErrors($validator)->withInput();
        }else{
            $data = $request->all();
            $category_product = category_product::find($category_id);
            $category_product->category_name = $data['category_product_name'];
            $category_product->category_slug_product = $data['category_product_slug'];
            $category_product->category_desc = $data['category_product_desc'];
            $category_product->category_status = $data['category_product_status'];
            $category_product->update();
            return Redirect::to('/all-category-product-admin')->with('message','Cập nhập danh mục sản phẩm thành công !');
        }
    }
}
