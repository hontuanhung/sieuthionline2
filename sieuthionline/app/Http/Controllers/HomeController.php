<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class HomeController extends Controller
{
    public function index(){
    	$product = product::all();
    	return view('pages.home')->with('product',$product);
    }
    public function gioithieu(){
    	return view('pages.gioithieu');
    }
    public function search(Request $request){
    	$keywords = $request->keywords_submit;
    	if ($keywords) {
    		$search_product = product::where('product_name','like','%'.$keywords.'%')->get();
    		return view('pages.product.result_search')->with('search_product',$search_product)->with('keywords',$keywords);
    	}else{
    		return Redirect::to('/');
    	}
    	
    }
}
