
<?php $__env->startSection('admin_content'); ?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Sửa thông tin tài khoản gian hàng</strong>
        </div>
        <?php
            $message = Session::get('message');
            if ($message) {
                echo "<span class='alert alert-success'>".$message."</span>";
                Session::put('message',null);
            }
        ?>
        <div class="card-body card-block">
            <?php $__currentLoopData = $shop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <form action="<?php echo e(URL::to('/update-shop-admin/'.$s->shop_id)); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <?php echo e(csrf_field()); ?>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên gian hàng</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="slug" name="shop_name" class="form-control" value="<?php echo e($s->shop_name); ?>">
                    <?php if($errors->has('shop_name')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('shop_name')); ?></p>                  
                    <?php endif; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email</label></div>
                    <div class="col-12 col-md-6"><input type="text" name="shop_email" class="form-control" value="<?php echo e($s->shop_email); ?>">
                    <?php if($errors->has('shop_email')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('shop_email')); ?></p>                  
                    <?php endif; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Mật khẩu</label></div>
                    <div class="col-12 col-md-6"><input type="password" name="shop_password" class="form-control" value="******">
                    <?php if($errors->has('shop_password')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('shop_password')); ?></p>                  
                    <?php endif; ?></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Số điện thoại</label></div>
                    <div class="col-12 col-md-6"><input type="text" name="shop_phone" class="form-control" value="<?php echo e($s->shop_phone); ?>">
                    <?php if($errors->has('phone_customer')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('phone_customer')); ?></p>                  
                    <?php endif; ?></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Địa chỉ</label></div>
                    <div class="col-12 col-md-6"><input type="text" name="shop_address" class="form-control" value="<?php echo e($s->shop_address); ?>">
                    <?php if($errors->has('shop_address')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('shop_address')); ?></p>                  
                    <?php endif; ?></div>
                </div>              
                <div class="row form-group">
                    <input style="margin: 0px auto;" type="submit" name="" value="Cập nhập tài khoản gian hàng" class="btn btn-primary btn-sm" onclick="return confirm('Bạn có chắc là muốn cập nhập tài khoản gian hàng này không ?')">
                </div>
            </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sieuthionline\resources\views/admin/shop/edit_shop.blade.php ENDPATH**/ ?>