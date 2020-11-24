
<?php $__env->startSection('content'); ?>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Đăng nhập</h2>
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
                                <strong style="padding-left: 157px;font-size: 20px;">Đăng nhập</strong>
                            </div>
                            </div>
                            <div class="card-body card-block">
                                <?php
                                    $message = Session::get('message');
                                    if ($message) {
                                        echo '<p class="alert alert-success">'.$message.'</p>';
                                        Session::put('message',null);
                                    }
                                ?>
                                <form action="<?php echo e(URL::to('/login-cus')); ?>" method="post" class="form-horizontal">
                                    <?php echo e(@csrf_field()); ?>

                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9"><input type="email" id="hf-email" name="email_customer" placeholder="Email" class="form-control">
                                        <?php if($errors->has('email_customer')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('email_customer')); ?></p>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9"><input type="password" id="hf-password" name="password_customer" placeholder="Mật khẩu" class="form-control"><?php if($errors->has('password_customer')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('password_customer')); ?></p>
                                        <?php endif; ?></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-6"></div>
                                        <div class="col-12 col-md-6"><input type="submit" class="btn btn-warning" value="Đăng nhập"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sieuthionline\resources\views/pages/checkout/login_customer.blade.php ENDPATH**/ ?>