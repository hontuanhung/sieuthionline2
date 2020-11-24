
<?php $__env->startSection('admin_content'); ?>
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-5">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Loại sản phẩm</h1>
                                <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo "<span class='alert alert-success'>".$message."</span>";
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
                                    <li><a href="#">Danh mục sản phẩm</a></li>
                                    <li class="active">Liệt kê danh mục</li>
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
                                <strong class="card-title">Liệt kê danh mục sản phẩm</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tên danh mục</th>
                                            <th>Slug</th>
                                            <th>Tình trạng</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $category_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($cate_product->category_name); ?></td>
                                            <td><?php echo e($cate_product->category_slug_product); ?></td>
                                            <td>
                                            <?php
                                            if($cate_product->category_status==0){
                                                    echo "<p style='color:green;'>Đang hiển thị</p>";       
                                            }else{
                                                echo "<p style='color:red;'>Đã ẩn</p>";
                                            }
                                            ?>    
                                            </td>
                                            <td>
                                                <a href="<?php echo e(URL::to('/edit-category-product-admin&'.$cate_product->category_id)); ?>" class="btn btn-success">Sửa</a> | 
                                                <a href="<?php echo e(URL::to('/delete-category-product-admin/'.$cate_product->category_id)); ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')">Xóa</a></td>
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
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sieuthionline\resources\views/admin/category_product/all_category_product.blade.php ENDPATH**/ ?>