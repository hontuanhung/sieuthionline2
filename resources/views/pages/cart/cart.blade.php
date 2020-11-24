@extends('layout')
@section('content')
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="single-sidebar">
                     <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Tên sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="#">×</a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{'public/frontend/images/product-thumb-2.jpg'}}"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html">Samsung Galaxy</a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">15.000.000đ</span> 
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="button" class="minus" value="-">
                                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="1" min="0" step="1">
                                                    <input type="button" class="plus" value="+">
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount">15.000.000đ</span> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <input type="submit" value="Cập nhập" name="update_cart" class="button">
                                                <input type="submit" value="Thanh toán" name="proceed" class="checkout-button button alt wc-forward">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            </div>   
                </div>
                
                <div class="col-md-4">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            

                            <div class="cart-collaterals">
                                <h2>Chi tiết đơn hàng</h2>

                                <table cellpadding="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <td>Địa chỉ : </td>
                                            <th style="text-align: right;">Bình Chánh - Bình Sơn - Quảng Ngãi</th>
                                        </tr>
                                        <tr class="shipping">
                                            <td>Phí giao hàng :</td>
                                            <th style="text-align: right;">30.000đ</th>                      
                                        </tr>
                                        <tr class="Order">
                                            <td>Tổng cộng : </td>
                                            <th style="color: #f57224; text-align: right;">500.000đ</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection