@extends('layout')
@section('content')
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Đăng ký gian hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="col-lg-6">
                        <div class="card">
                             <div class="card-header">
                                <div class="row form-group">
                                <strong style="padding-left: 157px;font-size: 20px;">Đăng ký gian hàng</strong>
                            </div>
                            </div>
                            <?php 
                                $message = Session::get('message');
                                if ($message) {
                                    echo '<p class="alert alert-success">'.$message.'</p>';
                                    Session::put('message',null);
                                }
                            ?>
                            <div class="card-body card-block">
                                <form action="{{URL::to('/save-shop')}}" method="post" class="form-horizontal">
                                    {{ @csrf_field() }}
                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9"><input type="text" name="shop_name" placeholder="Tên gian hàng" class="form-control">
                                        @if($errors->has('shop_name'))
                                        <p class="alert alert-danger">{{ $errors->first('shop_name') }}</p>
                                        @endif</div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9"><input type="text" name="shop_email" placeholder="Email" class="form-control">
                                        @if($errors->has('shop_email'))
                                        <p class="alert alert-danger">{{ $errors->first('shop_email') }}</p>
                                        @endif</div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9"><input type="text" name="shop_phone" placeholder="Số điện thoại" class="form-control">@if($errors->has('shop_phone'))
                                        <p class="alert alert-danger">{{ $errors->first('shop_phone') }}</p>
                                        @endif</div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9"><input type="password" name="shop_password" placeholder="Mật khẩu" class="form-control">@if($errors->has('shop_password'))
                                        <p class="alert alert-danger">{{ $errors->first('shop_password') }}</p>
                                        @endif</div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9"><input type="text" name="shop_address" placeholder="Địa chỉ" class="form-control">@if($errors->has('shop_address'))
                                        <p class="alert alert-danger">{{ $errors->first('shop_address') }}</p>
                                        @endif</div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-6"></div>
                                        <div class="col-12 col-md-6"><input type="submit" name="" class="btn btn-warning" value="Đăng ký"></div>
                                    </div>
                                </form>

                                <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9">Bạn đã có tài khoản gian hàng<a href="{{URL::to('/login-shop')}}"><strong style="color: #ee4d2d;"> Đăng nhập ngay</strong></a></div>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</div>
@endsection