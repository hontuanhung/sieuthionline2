@extends('layout')
@section('content')
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="card">
                   <div class="card-header">
                    <div class="row form-group">
                        <strong style="padding-left: 30px;font-size: 20px;">Sản phẩm đang bán</strong>
                        <hr>
                    </div>
                </div>
                @foreach($shop_product as $key => $product)
                <div class="col-md-3 col-sm-6">                    
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{('public/uploads/product/'.$product->product_image)}}" alt="">
                        </div>
                        <h2><a href="">{{$product->product_name}}</a></h2>
                        <div class="product-carousel-price">
                            <ins style="color: red;padding-left: 66px;">Giá : {{number_format($product->product_price ,0,',','.')}}đ</ins>
                        </div>  
                        
                        <div class="product-option-shop" style="padding-left: 58px;">
                            <a href="" class="btn btn-success">Sửa</a>
                            <a href="" class="btn btn-danger">Xóa</a>
                        </div>                                             
                    </div>                    
                </div>
                @endforeach
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection