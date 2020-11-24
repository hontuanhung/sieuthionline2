
<?php $__env->startSection('admin_content'); ?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Thêm tài khoản Customer</strong>
        </div>
        <?php
            $message = Session::get('message');
            if ($message) {
                echo "<span class='alert alert-success'>".$message."</span>";
                Session::put('message',null);
            }
        ?>
        <div class="card-body card-block">
            <form action="<?php echo e(URL::to('/save-customer-admin')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <?php echo e(csrf_field()); ?>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên khách hàng</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="slug" name="name_customer" class="form-control">
                    <?php if($errors->has('name_customer')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('name_customer')); ?></p>                  
                    <?php endif; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email</label></div>
                    <div class="col-12 col-md-6"><input type="text" name="email_customer" class="form-control">
                    <?php if($errors->has('email_customer')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('email_customer')); ?></p>                  
                    <?php endif; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Mật khẩu</label></div>
                    <div class="col-12 col-md-6"><input type="password" name="password_customer" class="form-control">
                    <?php if($errors->has('password_customer')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('password_customer')); ?></p>                  
                    <?php endif; ?></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Số điện thoại</label></div>
                    <div class="col-12 col-md-6"><input type="text" name="phone_customer" class="form-control">
                    <?php if($errors->has('phone_customer')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('phone_customer')); ?></p>                  
                    <?php endif; ?></div>
                </div>           
                <div class="row form-group">
                    <input style="margin: 0px auto;" type="submit" name="" value="Thêm customer" class="btn btn-primary btn-sm" onclick="return confirm('Bạn có chắc là muốn thêm tài khoản customer này ko?')">
                </div>
            </form>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sieuthionline\resources\views/admin/customer/add_customer.blade.php ENDPATH**/ ?>