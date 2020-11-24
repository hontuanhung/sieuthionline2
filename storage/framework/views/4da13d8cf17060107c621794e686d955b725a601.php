
<?php $__env->startSection('admin_content'); ?>
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-5">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Sản phẩm</h1>
                            </div>
                            <div class="page-title">
                                <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo "<span class='alert alert-success'>$message</span>";
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
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Sản phẩm</a></li>
                                    <li class="active">Liệt kê sản phẩm</li>
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
                                <strong class="card-title">Liệt kê sản phẩm</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Loại</th>
                                            <th>Hình ảnh</th>
                                            <th>Giá</th>
                                            <th>Tình trạng</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($all_product->product_name); ?></td>
                                            <td><?php echo e($all_product->product_quantity); ?></td>
                                            <td><?php echo e($all_product->category_id); ?></td>
                                            <td><img src="public/uploads/product/<?php echo e($all_product->product_image); ?>" height="60" width="60"></td>
                                            <td><?php echo e($all_product->product_price); ?></td>
                                            <td><?php echo e($all_product->product_status); ?></td>
                                            <td>
                                                <a href="<?php echo e(URL::to('/edit-product-admin&'.$all_product->product_id)); ?>" class="btn btn-success">Sửa</a>
                                                <a href="<?php echo e(URL::to('/delete-product-admin/'.$all_product->product_id)); ?>" onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" class="btn btn-danger" >Xóa</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sieuthionline\resources\views/admin/product/all_product.blade.php ENDPATH**/ ?>