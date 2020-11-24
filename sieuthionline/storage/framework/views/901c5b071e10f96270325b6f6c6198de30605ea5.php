<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Siêu Thị Online</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    
    <!-- Bootstrap -->
    <link href="<?php echo e(asset('public/frontend/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/bootstrap.min.css')); ?>" rel="stylesheet">
    
    <!-- Font Awesome -->
    
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('public/frontend/css/owl.carousel.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/responsive.css')); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
 
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-phone"></i> 0969710597</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Yêu thích</a></li>
                            <li><a href="<?php echo e(URL::to('/register-now-sale')); ?>"><i class="fa fa-user"></i> Bán hàng cùng chúng tôi</a></li>
                            <li><a href="<?php echo e(URL::to('/login-shop')); ?>"><i class="fa fa-user"></i> Đăng nhập gian hàng</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Thanh toán</a></li>                
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-question"></i><span class="value"> Trợ giúp</span></a>
                            </li>
                            <?php
                            $customer_id = Session::get('customer_id');
                            $shop_id = Session::get('shop_id');
                            if($customer_id!=NULL && $shop_id==NULL) {
                                ?>
                                <li class="dropdown dropdown-small">
                                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="value">
                                        <?php
                                        $customer_name = Session::get('customer_name');
                                        echo $customer_name;
                                        ?>
                                    </span><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a style="float: left;" href="#">Tài khoản của tôi</a></li>
                                        <li><a style="float: left;" href="#">Đơn mua</a></li>
                                        <li><a style="float: left;" href="<?php echo e(URL::to('/logout-customer')); ?>">Đăng xuất</a></li>
                                    </ul>
                                </li>
                                <?php
                            }
                            if($shop_id!=NULL && $customer_id==NULL){
                                ?>
                                <li class="dropdown dropdown-small">
                                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="value">
                                        <?php
                                        $shop_name = Session::get('shop_name');
                                        echo $shop_name;
                                        ?>
                                    </span><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a style="float: left;" href="<?php echo e(URL::to('/add-product')); ?>">Đăng sản phẩm</a></li>
                                        <li><a style="float: left;" href="<?php echo e(URL::to('/profile-shop&'.$shop_id)); ?>">Gian hàng của tôi</a></li>
                                        <li><a style="float: left;" href="#">Đơn hàng của tôi</a></li>
                                        <li><a style="float: left;" href="<?php echo e(URL::to('/logout-shop')); ?>">Đăng xuất</a></li>
                                    </ul>
                                </li>
                                <?php
                            }if($customer_id!=NULL && $shop_id!=NULL) {
                                ?>  
                                <li class="dropdown dropdown-small">
                                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="value">
                                        <?php
                                        $shop_name = Session::get('shop_name');
                                        echo $shop_name;
                                        ?>
                                    </span><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a style="float: left;" href="#">Đăng sản phẩm</a></li>
                                        <li><a style="float: left;" href="#">Gian hàng của tôi</a></li>
                                        <li><a style="float: left;" href="#">Đơn hàng của tôi</a></li>
                                        <li><a style="float: left;" href="<?php echo e(URL::to('/logout-shop')); ?>">Đăng xuất</a></li>
                                    </ul>
                                </li>
                                <?php
                                }else if($customer_id==NULL && $shop_id==NULL) {
                                ?>
                                <li class="dropdown dropdown-small">
                                    <a href="<?php echo e(URL::to('/login-customer')); ?>">Đăng nhập</a>
                                </li>|
                                <li class="dropdown dropdown-small">
                                    <a href="<?php echo e(URL::to('/register-customer')); ?>">Đăng ký</a>
                                </li>
                                <?php                                  
                            }
                            ?>

                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="<?php echo e(('public/frontend/images/logo.png')); ?>"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="<?php echo e(URL::to('/cart')); ?>"><i class="fa fa-shopping-cart fa-lg"></i> <span class="product-count" style="background: red;">5</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo e(url('/trangchu')); ?>">Trang chủ</a></li>
                        <li><a href="#">Danh mục</a></li>
                        <li><a href="single-product.html">Khuyến mãi</a></li>
                        <li><a href="cart.html">Giỏ hàng</a></li>
                    </ul>
                    <form class="form-inline active-cyan-4" action="<?php echo e(URL::to('/tim-kiem')); ?>" method="POST" style="float: right;padding-top: 12px;">
                        <?php echo e(csrf_field()); ?>

                      <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Nhập tên sản phẩm cần tìm..." style="width: 450px;height: 40px;" name="keywords_submit">
                      <input type="submit" name="search_items" class="btn btn-primary btn-sm btn-search" value="Tìm kiếm">
                  </form>
              </div>  
          </div>
      </div>
  </div> <!-- End mainmenu area -->
  <?php echo $__env->yieldContent('content'); ?>
  <div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>u<span>Stora</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                    <div class="footer-social">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">User Navigation </h2>
                    <ul>
                        <li><a href="#">My account</a></li>
                        <li><a href="#">Order history</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Vendor contact</a></li>
                        <li><a href="#">Front page</a></li>
                    </ul>                        
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Categories</h2>
                    <ul>
                        <li><a href="#">Mobile Phone</a></li>
                        <li><a href="#">Home accesseries</a></li>
                        <li><a href="#">LED TV</a></li>
                        <li><a href="#">Computer</a></li>
                        <li><a href="#">Gadets</a></li>
                    </ul>                        
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="footer-newsletter">
                    <h2 class="footer-wid-title">Newsletter</h2>
                    <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                    <div class="newsletter-form">
                        <form action="#">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer top area -->

<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <p>&copy; 2015 uCommerce. All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a></p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="footer-card-icon">
                    <i class="fa fa-cc-discover"></i>
                    <i class="fa fa-cc-mastercard"></i>
                    <i class="fa fa-cc-paypal"></i>
                    <i class="fa fa-cc-visa"></i>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer bottom area -->

<!-- Latest jQuery form server -->

<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="<?php echo e(asset('public/frontend/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/js/jquery.sticky.js')); ?>"></script>

<!-- jQuery easing -->
<script src="<?php echo e(asset('public/frontend/js/jquery.easing.1.3.min.js')); ?>"></script>

<!-- Main Script -->
<script src="<?php echo e(asset('public/frontend/js/main.js')); ?>"></script>

<!-- Slider -->
<script type="text/javascript" src="<?php echo e(asset('public/frontend/js/bxslider.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/frontend/js/script.slider.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/frontend/js/choices.js')); ?>"></script>
<script>
  const choices = new Choices('[data-trigger]',
  {
    searchEnabled: false,
    itemSelectText: '',
});

</script>
<script src="<?php echo e(asset('public/backend/ckeditor/ckeditor.js')); ?>"></script>
<script>
 CKEDITOR.replace('ckeditor');
 CKEDITOR.replace('ckeditor1');
 CKEDITOR.replace('ckeditor2');
 CKEDITOR.replace('ckeditor3');
 CKEDITOR.replace('id4');
</script>
<script type="text/javascript">
   
    function ChangeToSlug()
    {
        var slug;
        
            //Lấy text từ thẻ input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
                document.getElementById('convert_slug').value = slug;
            }
            
        </script>
    </body>
    </html><?php /**PATH C:\xampp\htdocs\sieuthionline\resources\views/layout.blade.php ENDPATH**/ ?>