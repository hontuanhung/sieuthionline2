
<?php $__env->startSection('admin_content'); ?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Sửa sản phẩm</strong>
        </div>
        <?php
            $message = Session::get('message');
            if ($message) {
                echo "<span class='alert alert-success'>".$message."</span>";
                Session::put('message',null);
            }
        ?>
        <div class="card-body card-block">
            <?php $__currentLoopData = $edit_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $edit_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <form action="<?php echo e(URL::to('/update-product-admin/'.$edit_pro->product_id)); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <?php echo e(csrf_field()); ?>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên sản phẩm</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="slug" name="product_name" value="<?php echo e($edit_pro->product_name); ?>" class="form-control" onkeyup="ChangeToSlug();">
                    <?php if($errors->has('product_name')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('product_name')); ?></p>                  
                    <?php endif; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Hình ảnh</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="product_image" class="form-control-file">
                    <img src="<?php echo e(URL::to('public/uploads/product/'.$edit_pro->product_image)); ?>" height="60" width="60">
                    <?php if($errors->has('product_image')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('product_image')); ?></p>                  
                    <?php endif; ?></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">Số lượng</label></div>
                    <div class="col-12 col-md-3"><input type="text" id="email-input" name="product_quantity" value="<?php echo e($edit_pro->product_quantity); ?>" class="form-control">
                    <?php if($errors->has('product_quantity')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('product_quantity')); ?></p>                  
                    <?php endif; ?></div>
                </div>
                <input type="hidden" name="shop_id" value="<?php echo e($edit_pro->shop_id); ?>">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="password-input" class=" form-control-label">Slug</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="convert_slug" name="product_slug" value="<?php echo e($edit_pro->product_slug); ?>" class="form-control">
                        <?php if($errors->has('product_slug')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('product_slug')); ?></p>                  
                    <?php endif; ?></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Loại sản phẩm</label></div>
                    <div class="col-12 col-md-9">
                        <select name="category_id" id="select" class="form-control">

                            <?php $__currentLoopData = $category_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cate_pro->category_id==$edit_pro->category_id): ?>
                            <option selected value="<?php echo e($cate_pro->category_id); ?>"><?php echo e($cate_pro->category_name); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($cate_pro->category_id); ?>"><?php echo e($cate_pro->category_name); ?></option>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô tả sản phẩm</label></div>
                    <div class="col-12 col-md-9"><textarea name="product_desc" id="ckeditor" rows="9" class="form-control"><?php echo e($edit_pro->product_desc); ?></textarea>
                    <?php if($errors->has('product_desc')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('product_desc')); ?></p>                  
                    <?php endif; ?></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Giá</label></div>
                    <div class="col-12 col-md-4"><input type="text" id="password-input" name="product_price" value="<?php echo e($edit_pro->product_price); ?>" class="form-control">
                    <?php if($errors->has('product_price')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('product_price')); ?></p>                  
                    <?php endif; ?></div>*đồng
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Tình trạng</label></div>
                    <div class="col-12 col-md-3">
                        <select name="product_status" id="select" class="form-control">
                            <option value="0">Hiển thị</option>
                            <option value="1">Ẩn</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <input style="margin: 0px auto;" type="submit" name="" value="Cập nhập sản phẩm" class="btn btn-primary btn-sm" onclick="return confirm('Bạn có chắc là muốn cập nhập sản phẩm này ko?')">
                </div>
            </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sieuthionline\resources\views/admin/product/edit_product.blade.php ENDPATH**/ ?>