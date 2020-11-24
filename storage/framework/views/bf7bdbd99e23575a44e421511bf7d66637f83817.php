
<?php $__env->startSection('content'); ?>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Đăng ký</h2>
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
                                <strong style="padding-left: 157px;font-size: 20px;">Đăng ký thành viên</strong>
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
                                <form action="<?php echo e(URL::to('/sigin-customer')); ?>" method="post" class="form-horizontal">
                                    <?php echo e(@csrf_field()); ?>

                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9"><input type="text" name="name_customer" placeholder="Họ tên" class="form-control">
                                        <?php if($errors->has('name_customer')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('name_customer')); ?></p>
                                        <?php endif; ?></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9"><input type="text" name="email_customer" placeholder="Email" class="form-control">
                                        <?php if($errors->has('email_customer')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('email_customer')); ?></p>
                                        <?php endif; ?></div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9"><input type="text" name="phone_customer" placeholder="Số điện thoại" class="form-control"><?php if($errors->has('phone_customer')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('phone_customer')); ?></p>
                                        <?php endif; ?></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9"><input type="password" name="password_customer" placeholder="Mật khẩu" class="form-control"><?php if($errors->has('password_customer')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('password_customer')); ?></p>
                                        <?php endif; ?></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-6"></div>
                                        <div class="col-12 col-md-6"><input type="submit" name="register_customer" class="btn btn-warning" value="Đăng ký"></div>
                                    </div>
                                </form>

                                <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9">Bạn đã có tài khoản<a href="<?php echo e(URL::to('/login-customer')); ?>"><strong style="color: #ee4d2d;"> Đăng nhập</strong></a></div>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sieuthionline\resources\views/pages/checkout/register_customer.blade.php ENDPATH**/ ?>