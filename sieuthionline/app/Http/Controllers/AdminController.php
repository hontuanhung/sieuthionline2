<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\product;
use App\Models\shipping;
use App\Models\shop;
use App\Models\customer;
use Auth;

class AdminController extends Controller
{
	public function AuthLogin(){
		$admin_id = Auth::id();
		if($admin_id) {
			return Redirect::to('dashboard');
		}else{
			return Redirect::to('admin')->send();
		}
	}

    public function index(){
    	return view('admin_login');
    }

    public function show_dashboard(){
    	$this->AuthLogin();
    	$count_product = product::count();
    	$count_shipping = shipping::count();
    	$count_shop = shop::count();
    	$count_customer = customer::count();
    	return view('admin.dashboard')->with('count_product',$count_product)->with('count_shipping',$count_shipping)->with('count_shop',$count_shop)->with('count_customer',$count_customer);
    }
}
