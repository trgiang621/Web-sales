<?php 
    include("./php/connection.php");
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="./css/style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <?php include("./menu.php"); 
                if($_SESSION['user'] == []){
                    header("Location: ./Login.php");
                }else{
                    $username = $_SESSION['user'][3];
                }
        ?>
            <div class="shopping-cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="./php/oders.php?active=check-out" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ tên</label>
                                    <input type="text" name="lastName" value="<?php echo $username ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số điện thoại</label>
                                    <input type="text" name="phone" value="<?php echo $_SESSION['user'][4] ?>" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ghi chú</label>
                                    <textarea type="text" name="note" class="form-control" id="exampleInputPassword1"></textarea>
                                </div>
                                    <button type="submit" class="btn btn-primary">Đặt hàng</button>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <!-- Shopping cart table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="p-2 px-3 text-uppercase">Sản Phẩm</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Đơn Giá</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Số Lượng</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))) {
                                        for ($i=0; $i < sizeof($_SESSION['giohang']) ; $i++) { 
                                    ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="p-2">
                                                    <img src="${o.image}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block"><?php echo $_SESSION['giohang'][$i][0] ?></a></h5><span class="text-muted font-weight-normal font-italic"></span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="align-middle"><strong><?php echo $_SESSION['giohang'][$i][1] ?></strong></td>
                                            <td class="align-middle">
                                                <strong><?php echo $_SESSION['giohang'][$i][2] ?></strong>
                                            </td>
                                        </tr> 
                                    <?php }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tổng tiền hàng</strong><strong><?php echo $_SESSION['tong'] ?></strong></li>
                                    
                                </ul>
                            </div>
                        </div>
                        
                        <!-- End -->
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
         <?php include("./footer.php"); ?>
    </body>

</html>
</html>
