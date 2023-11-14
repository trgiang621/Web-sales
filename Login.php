<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Đăng Nhập</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
    body {
        color: #000000;
        background:     #C1CDC1;
    }
    .form-control {
        min-height: 41px;
        background: #fff;
        box-shadow: none !important;
        border-color: #e3e3e3;
    }
    .form-control:focus {
        border-color: #70c5c0;
    }
    .form-control, .btn {        
        border-radius: 2px;
    }
    .login-form {
        width: 450px;
        margin: 0 auto;
        padding: 100px 0 30px;      
    }
    .login-form form {
        color: #7a7a7a;
        border-radius: 2px;
        margin-bottom: 15px;
        font-size: 13px;
        background: #ececec;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;  
        position: relative; 
    }
    .login-form h2 {
        font-size: 22px;
        margin: 35px 0 25px;
    }
    .login-form input[type="checkbox"] {
        margin-top: 2px;
    }
    .login-form .btn {        
        font-size: 16px;
        font-weight: bold;
        background: #70c5c0;
        border: none;
        margin-bottom: 20px;
    }
    .login-form .btn:hover, .login-form .btn:focus {
        background: #50b8b3;
        outline: none !important;
    }    
    .login-form a {
        color: #009ACD;
        text-decoration: underline;
    }
    .login-form a:hover {
        text-decoration: none;
    }
    .login-form form a {
        color: #7a7a7a;
        text-decoration: none;
    }
    .login-form form a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
<div class="login-form">
    <form action="./php/login.php" method="post">
        <h2 class="text-center">Đăng nhập</h2>   
        <div class="form-group">
            <input type="text" class="form-control" name="user" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng nhập</button>
        </div>
        <?php if(isset($_SESSION['mess'])){ ?>
            <p class="alert alert-danger" role="alert"> <?php echo $_SESSION['mess']; ?> </p>
        <?php } 
            unset($_SESSION['mess']);
        ?>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Nhớ mật khẩu</label>
            <a href="#" class="pull-right">Quên mật khẩu?</a>
        </div>
    </form>
    <p class="text-center small">Bạn chưa có tài khoản? <a href="./signup.php">Đăng ký.</a></p>
</div>
</body>
</html>