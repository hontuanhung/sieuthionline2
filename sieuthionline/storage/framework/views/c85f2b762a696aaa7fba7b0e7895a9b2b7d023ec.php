
<?php $__env->startSection('admin_content'); ?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Thêm tài khoản gian hàng</strong>
        </div>
        <?php
            $message = Session::get('message');
            if ($message) {
                echo "<span class='alert alert-success'>".$message."</span>";
                Session::put('message',null);
            }
        ?>
        <div class="card-body card-block">
            <form action="<?php echo e(URL::to('/save-shop-admin')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <?php echo e(csrf_field()); ?>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên gian hàng</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="slug" name="shop_name" class="form-control">
                    <?php if($errors->has('shop_name')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('shop_name')); ?></p>                  
                    <?php endif; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email</label></div>
                    <div class="col-12 col-md-6"><input type="text" name="shop_email" class="form-control">
                    <?php if($errors->has('shop_email')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('shop_email')); ?></p>                  
                    <?php endif; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Mật khẩu</label></div>
                    <div class="col-12 col-md-6"><input type="password" name="shop_password" class="form-control">
                    <?php if($errors->has('shop_password')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('shop_password')); ?></p>                  
                    <?php endif; ?></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Số điện thoại</label></div>
                    <div class="col-12 col-md-6"><input type="text" name="shop_phone" class="form-control">
                    <?php if($errors->has('shop_phone')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('shop_phone')); ?></p>                  
                    <?php endif; ?></div>
                </div>   
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Địa chỉ</label></div>
                    <div class="col-12 col-md-6"><input type="text" name="shop_address" class="form-control">
                    <?php if($errors->has('shop_address')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('shop_address')); ?></p>                  
                    <?php endif; ?></div>
                </div>          
                <div class="row form-group">
                    <input style="margin: 0px auto;" type="submit" name="" value="Thêm gian hàng" class="btn btn-primary btn-sm" onclick="return confirm('Bạn có chắc là muốn thêm tài khoản gian hàng này ko?')">
                </div>
            </form>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sieuthionline\resources\views/admin/shop/add_shop.blade.php ENDPATH**/ ?>