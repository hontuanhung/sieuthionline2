
<?php $__env->startSection('content'); ?>
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
                                <form action="<?php echo e(URL::to('/save-shop')); ?>" method="post" class="form-horizontal">
                                    <?php echo e(@csrf_field()); ?>

                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9"><input type="text" name="shop_name" placeholder="Tên gian hàng" class="form-control">
                                        <?php if($errors->has('shop_name')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('shop_name')); ?></p>
                                        <?php endif; ?></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9"><input type="text" name="shop_email" placeholder="Email" class="form-control">
                                        <?php if($errors->has('shop_email')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('shop_email')); ?></p>
                                        <?php endif; ?></div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9"><input type="text" name="shop_phone" placeholder="Số điện thoại" class="form-control"><?php if($errors->has('shop_phone')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('shop_phone')); ?></p>
                                        <?php endif; ?></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9"><input type="password" name="shop_password" placeholder="Mật khẩu" class="form-control"><?php if($errors->has('shop_password')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('shop_password')); ?></p>
                                        <?php endif; ?></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9"><input type="text" name="shop_address" placeholder="Địa chỉ" class="form-control"><?php if($errors->has('shop_address')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('shop_address')); ?></p>
                                        <?php endif; ?></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-6"></div>
                                        <div class="col-12 col-md-6"><input type="submit" name="" class="btn btn-warning" value="Đăng ký"></div>
                                    </div>
                                </form>

                                <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9">Bạn đã có tài khoản gian hàng<a href="<?php echo e(URL::to('/login-shop')); ?>"><strong style="color: #ee4d2d;"> Đăng nhập ngay</strong></a></div>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sieuthionline\resources\views/pages/shop/register_shop.blade.php ENDPATH**/ ?>