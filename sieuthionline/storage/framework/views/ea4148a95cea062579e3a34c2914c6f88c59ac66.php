
<?php $__env->startSection('admin_content'); ?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Thêm danh mục sản phẩm</strong>
        </div>
        <?php
            $message = Session::get('message');
            if ($message) {
                echo "<span class='alert alert-success'>".$message."</span>";
                Session::put('message',null);
            }
        ?>
        <div class="card-body card-block">
            <form action="<?php echo e(URL::to('/save-category-product-admin')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <?php echo e(csrf_field()); ?>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên danh mục</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="slug" name="category_product_name" placeholder="Từ 10 đến 50 ký tự*" class="form-control" onkeyup="ChangeToSlug();">
                    <?php if($errors->has('category_product_name')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('category_product_name')); ?></p>                  
                    <?php endif; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">Slug</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="category_product_slug" class="form-control" id="convert_slug">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Mô tả danh mục</label></div>
                    <div class="col-12 col-md-9"><textarea name="category_product_desc" class="form-control" id="ckeditor"></textarea> 
                    <?php if($errors->has('category_product_desc')): ?>
                        <p class="alert alert-danger"><?php echo e($errors->first('category_product_desc')); ?></p>                  
                    <?php endif; ?></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="password-input" class=" form-control-label">Tình trạng</label></div>
                    <div class="col-12 col-md-3">
                        <select name="category_product_status" id="select" class="form-control">
                            <option value="0">Hiển thị</option>
                            <option value="1">Ẩn</option>
                        </select>
                    </div>
                </div>                
                <div class="row form-group">
                    <input style="margin: 0px auto;" type="submit" name="" value="Thêm danh mục" class="btn btn-primary btn-sm" onclick="return confirm('Bạn có chắc là muốn thêm danh mục này ko?')">
                </div>
            </form>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sieuthionline\resources\views/admin/category_product/add_category_product.blade.php ENDPATH**/ ?>