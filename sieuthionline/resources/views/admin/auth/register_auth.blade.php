<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('public/backend/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/css/style.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <h1>Đăng ký Auth</h1>
                    </a>
                </div>
                <div class="login-form">
                    
                    <form action="{{URL::to('/register')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" name="admin_name" value="{{old('admin_name')}}" placeholder="Họ tên">
                            @if($errors->has('admin_name'))
                                <p class="alert alert-danger">{{ $errors->first('admin_name') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control" name="admin_email" value="{{old('admin_email')}}" placeholder="Email">
                           @if($errors->has('admin_email'))
                                <p class="alert alert-danger">{{ $errors->first('admin_email') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control" name="admin_phone" value="{{old('admin_phone')}}" placeholder="Số điện thoại">
                           @if($errors->has('admin_phone'))
                                <p class="alert alert-danger">{{ $errors->first('admin_phone') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="admin_password" placeholder="Mật khẩu">
                            @if($errors->has('admin_password'))
                                <p class="alert alert-danger">{{ $errors->first('admin_password') }}</p>
                            @endif
                        </div>
                        <?php
                        $message = Session::get('message');
                        if($message){
                                echo '<p class="alert alert-success">'.$message.'</p>';
                                Session::put('message',null);
                            }
                        ?>
                        <input type="submit" name="register" value="Đăng ký" class="btn btn-primary btn-flat m-b-30 m-t-30">
                        <div class="register-link m-t-15 text-center">
                            <p>Bạn đã có tài khoản chưa ? <a href="{{URL::to('/login-admin')}}"> Đăng nhập</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
