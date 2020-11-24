
<?php $__env->startSection('content'); ?>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Kết quả tìm kiếm theo "<?php echo e($keywords); ?>"</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $search_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $search): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 col-sm-6">
                <div class="single-product">
                                <a href="<?php echo e(url('/chi-tiet-san-pham&'.$search->product_slug.'&'.$search->shop_id)); ?>">
                                <div class="product-f-image">
                                    <img src="<?php echo e(('public/uploads/product/'.$search->product_image)); ?>" alt="">
                                </div>
                                <div class="product-name">
                                <h2><?php echo e($search->product_name); ?></h2>
                                </div>
                                <div class="product-carousel-price">
                                    <ins style="color: #da1821;">Giá : <?php echo e(number_format($search->product_price ,0,',','.')); ?>đ</ins>
                                </div> 
                                </a>
                </div>
                </div>   
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sieuthionline\resources\views/pages/product/result_search.blade.php ENDPATH**/ ?>