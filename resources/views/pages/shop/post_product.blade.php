@extends('layout')
@section('content')
    <div class="single-product-area">
        <div class="container">
            <div class="col-lg-10">
                        <div class="card">
                             <div class="card-header">
                                <div class="row form-group">
                                <strong style="padding-left: 173px;font-size: 20px;">Đăng tin sản phẩm</strong>
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
                                <form action="{{URL::to('/post-product')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    {{ @csrf_field() }}
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="disabled-input" class=" form-control-label">Tên sản phẩm</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="product_name" class="form-control" id="slug" onkeyup="ChangeToSlug();">
                                        @if($errors->has('product_name'))
                                        <p class="alert alert-danger">{{ $errors->first('product_name') }}</p>
                                        @endif</div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="disabled-input" class=" form-control-label">Slug</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="product_slug" class="form-control" id="convert_slug">
                                        @if($errors->has('product_slug'))
                                        <p class="alert alert-danger">{{ $errors->first('product_slug') }}</p>
                                        @endif</div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="disabled-input" class=" form-control-label">Hình ảnh</label></div>
                                        <div class="col-12 col-md-9"><input type="file" name="product_image" class="form-control">@if($errors->has('product_image'))
                                        <p class="alert alert-danger">{{ $errors->first('product_image') }}</p>
                                        @endif</div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="disabled-input" class=" form-control-label">Số lượng</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="product_quantity" class="form-control">@if($errors->has('product_quantity'))
                                        <p class="alert alert-danger">{{ $errors->first('product_quantity') }}</p>
                                        @endif</div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="disabled-input" class=" form-control-label">Loại sản phẩm</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="category_id" id="select" class="form-control">
                                                @foreach($category_product as $key => $category_pro)
                                                <option value="{{ $category_pro->category_id }}">{{ $category_pro->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="disabled-input" class=" form-control-label">Mô tả</label></div>
                                        <div class="col-12 col-md-9"><textarea name="product_desc" class="form-control" id="ckeditor"></textarea>@if($errors->has('product_desc'))
                                        <p class="alert alert-danger">{{ $errors->first('product_desc') }}</p>
                                        @endif</div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="disabled-input" class=" form-control-label">Giá</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="product_price" class="form-control">@if($errors->has('product_price'))
                                        <p class="alert alert-danger">{{ $errors->first('product_price') }}</p>
                                        @endif</div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="disabled-input" class=" form-control-label">Tình trạng</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="product_status" id="select" class="form-control">
                                                <option value="0">Hiển thị</option>
                                                <option value="1">Ẩn</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                        $shop_id = Session::get('shop_id');
                                    ?>

                                    <input type="hidden" name="shop_id" value="<?php echo $shop_id ?>">
                                    <div class="row form-group">
                                        <div class="col col-md-5"></div>
                                        <div class="col-12 col-md-6"><input type="submit" name="register_customer" class="btn btn-warning" value="Đăng sản phẩm"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
        </div>
    </div>
</div>
@endsection