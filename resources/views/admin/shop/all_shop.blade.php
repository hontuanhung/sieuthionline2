@extends('admin_layout')
@section('admin_content')
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-5">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Tài khoản gian hàng thành viên</h1>
                                <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo "<span class='alert alert-success'>".$message."</span>";
                                    Session::put('message',null);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Trang chủ</a></li>
                                    <li><a href="#">Gian hàng</a></li>
                                    <li class="active">Tài khoản gian hàng</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Tài khoản gian hàng</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tên gian hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th>Mật khẩu</th>
                                            <th>Địa chỉ</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_shop as $key => $s)
                                        <tr>
                                            <td>{{ $s->shop_name }}</td>
                                            <td>{{ $s->shop_phone }}</td>
                                            <td>{{ $s->shop_email }}</td>
                                            <td>******</td>
                                            <td>{{ $s->shop_address }}</td>
                                            <td>
                                                <a href="{{URL::to('/edit-shop-admin&'.$s->shop_id)}}" class="btn btn-success">Sửa</a> | 
                                                <a href="{{URL::to('/delete-shop-admin/'.$s->shop_id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc là muốn xóa tài khoản gian hàng này không?')">Xóa</a></td>
                                        </tr>
                                        @endforeach    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>
@endsection