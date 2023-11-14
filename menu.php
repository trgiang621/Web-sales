 <?php session_start();
    $username = (isset($_SESSION['user']) ? $_SESSION['user'][3] : []);
?>
<style>
body {
    background: #eeeeee;
}
.form-inline {
    display: inline-block;
}
.navbar-header.col {
    padding: 0 ;
}
.navbar {       
    background: #fff;
    padding-left: 16px;
    padding-right: 16px;
    border-bottom: 1px solid #d6d6d6;
    box-shadow: 0 0 4px rgba(0,0,0,.1);

}
.nav-link img {
    border-radius: 50%;
    width: 36px;
    height: 36px;
    margin: -8px 0;
    float: left;
    margin-right: 10px;
}
.navbar .navbar-brand {
    color: #555;
    padding-left: 0;
    padding-right: 50px;
    font-family: 'Merienda One', sans-serif;
}
.navbar .navbar-brand i {
    font-size: 20px;
    margin-right: 5px;
}
.search-box {
    position: relative;
}   
.search-box input {
    box-shadow: none;
    padding-right: 35px;
    border-radius: 3px !important;
}
.search-box .input-group-addon {
    min-width: 35px;
    border: none;
    background: transparent;
    position: absolute;
    right: 0;
    z-index: 9;
    padding: 7px;
    height: 100%;
}
.search-box i {
    color: #a0a5b1;
    font-size: 19px;
}
.navbar .nav-item i {
    font-size: 18px;
}
.navbar .dropdown-item i {
    font-size: 16px;
    min-width: 22px;
}
.navbar .nav-item.open > a {
    background: none ;
}
.navbar .dropdown-menu {
    border-radius: 1px;
    border-color: #e5e5e5;
    box-shadow: 0 2px 8px rgba(0,0,0,.05);
}
.navbar .dropdown-menu a {
    color: #777;
    padding: 8px 20px;
    line-height: normal;
}
.navbar .dropdown-menu a:hover, .navbar .dropdown-menu a:active {
    color: #333;
}   
.navbar .dropdown-item .material-icons {
    font-size: 21px;
    line-height: 16px;
    vertical-align: middle;
    margin-top: -2px;
}
.navbar .badge {
    color: #fff;
    background: #f44336;
    font-size: 11px;
    border-radius: 20px;
    position: absolute;
    min-width: 10px;
    padding: 4px 6px 0;
    min-height: 18px;
    top: 5px;
}
.navbar a.notifications, .navbar a.messages {
    position: relative;
    margin-right: 10px;
}
.navbar a.messages {
    margin-right: 20px;
}
.navbar a.notifications .badge {
    margin-left: -8px;
}
.navbar a.messages .badge {
    margin-left: -4px;
}   
.navbar .active a, .navbar .active a:hover, .navbar .active a:focus {
    background: transparent ;
}
@media (min-width: 1200px){
    .form-inline .input-group {
        width: 300px;
        margin-left: 30px;
    }
}
@media (max-width: 1199px){
    .form-inline {
        display: block;
        margin-bottom: 10px;
    }
    .input-group {
        width: 100%;
    }
}
</style>
</head> 
<body>
<nav class="navbar navbar-expand-xl navbar-light bg-light">
    <a href="./Home.php" class="navbar-brand"><i class="fa fa-cube"></i>WHOLE<b> FOOD</b></a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
        <div class="navbar-nav">
            <a href="Home.php" class="nav-item nav-link active">Trang chủ</a>
            <a href="#" class="nav-item nav-link">About</a>
            <?php if (isset($_SESSION['chucvu'])) {
                if( $_SESSION['chucvu'] == "admin") {?>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Quản lý</a>
                    <div class="dropdown-menu">
                        <a href="./Account.php" class="dropdown-item">Tài khoản</a>
                        <a href="./ManagerProduct.php" class="dropdown-item">Sản phẩm</a>
                        <a href="./ManagerCart.php" class="dropdown-item">Đơn hàng</a>  
                    </div>
                </div>
            <?php }else if($_SESSION['chucvu'] == "seller"){ ?>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Quản lý</a>
                    <div class="dropdown-menu">
                        <a href="./ManagerProduct.php" class="dropdown-item">Sản phẩm</a>
                        <a href="./ManagerCart.php" class="dropdown-item">Đơn hàng</a>  
                    </div>
                </div>
            <?php }else if ($_SESSION['chucvu'] == "member") {?>
                
            <?php }}?>
            <a href="#" class="nav-item nav-link">Blog</a>
            <a href="#" class="nav-item nav-link">Contact</a>
        </div>
        <form action="search.php" method="get" class="navbar-form form-inline">
            <div class="input-group search-box">
                <input value="" name="sanpham" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search..." required="required">
                <div class="input-group-append">
                    <button type="submit" class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link messages" href="./Cart.php">
                            <i class="fa fa-shopping-cart"></i>
                            <?php if (isset($_SESSION['giohang'])){ ?>
                                <span class="badge badge-light"><?php echo sizeof($_SESSION['giohang']) ?></span>
                            <?php }else { ?>
                                <span class="badge badge-light">0</span>
                            <?php } ?>
            </a>
            <?php if($username != []){ ?>
            <div class="nav-item dropdown" style="margin-right: 50px;">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action" ><img src="./icon/person-circle.svg" class="avatar" alt="Avatar"> <?php echo $username; ?><b class="caret"></b></a>
                <div class="dropdown-menu" >
                    <a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Trang cá nhân</a></a>
                    <a href="./ManagerCart.php" class="dropdown-item"><i class="fa fa-calendar-o"></i>Đơn hàng</a></a>
                    <a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Cài đặt</a></a>
                    <div class="dropdown-divider"></div>
                    <a href="./php/signout.php" class="dropdown-item"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></a>
                </div>
            </div>
            <?php }else{ ?>
                <a href="./Login.php" class="nav-link dropdown-toggle user-action">Đăng nhập <b class="caret"></b></a>
            <?php } ?>
        </div>
    </div>
</nav>
<section class="jumbotron text-center">
            <div class="container">
                <h1 class="text black" class="jumbotron-heading">WHOLE FOOD</h1>
                <p class="lead text-muted mb-0">Thực phẩm sạch và an toàn</p>
            </div>
</section> 
</body>                           