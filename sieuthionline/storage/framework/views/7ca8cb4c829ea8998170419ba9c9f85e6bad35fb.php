
<?php $__env->startSection('content'); ?>
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
                                <form action="<?php echo e(URL::to('/post-product')); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <?php echo e(@csrf_field()); ?>

                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="disabled-input" class=" form-control-label">Tên sản phẩm</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="product_name" class="form-control" id="slug" onkeyup="ChangeToSlug();">
                                        <?php if($errors->has('product_name')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('product_name')); ?></p>
                                        <?php endif; ?></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="disabled-input" class=" form-control-label">Slug</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="product_slug" class="form-control" id="convert_slug">
                                        <?php if($errors->has('product_slug')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('product_slug')); ?></p>
                                        <?php endif; ?></div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="disabled-input" class=" form-control-label">Hình ảnh</label></div>
                                        <div class="col-12 col-md-9"><input type="file" name="product_image" class="form-control"><?php if($errors->has('product_image')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('product_image')); ?></p>
                                        <?php endif; ?></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="disabled-input" class=" form-control-label">Số lượng</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="product_quantity" class="form-control"><?php if($errors->has('product_quantity')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('product_quantity')); ?></p>
                                        <?php endif; ?></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="disabled-input" class=" form-control-label">Loại sản phẩm</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="category_id" id="select" class="form-control">
                                                <?php $__currentLoopData = $category_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category_pro->category_id); ?>"><?php echo e($category_pro->category_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="disabled-input" class=" form-control-label">Mô tả</label></div>
                                        <div class="col-12 col-md-9"><textarea name="product_desc" class="form-control" id="ckeditor"></textarea><?php if($errors->has('product_desc')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('product_desc')); ?></p>
                                        <?php endif; ?></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="disabled-input" class=" form-control-label">Giá</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="product_price" class="form-control"><?php if($errors->has('product_price')): ?>
                                        <p class="alert alert-danger"><?php echo e($errors->first('product_price')); ?></p>
                                        <?php endif; ?></div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sieuthionline\resources\views/pages/shop/post_product.blade.php ENDPATH**/ ?>