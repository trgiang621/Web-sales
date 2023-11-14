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
                if ($_SESSION['chucvu'] == 'member') {
                $id_name = $_SESSION['user'][0];
                $query = sqlsrv_query($conn,"SELECT * FROM oder WHERE id_name = '$id_name'");
        ?>
            <div class="shopping-cart">
                <div class="px-4 px-lg-0">

                    <div class="pb-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                                    <!-- Shopping cart table -->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="p-2 text-uppercase">Mã đơn hàng</div>
                                                    </th>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="py-2 text-uppercase">Thành tiền</div>
                                                    </th>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="py-2 px-3 text-uppercase">Tình trạng đơn hàng</div>
                                                    </th>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="py-2 px-3 text-uppercase"></div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while ($row = sqlsrv_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <th scope="row">
                                                        <div class="p-2">
                                                            <img src="${o.image}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                            <div class="ml-3 d-inline-block align-middle">
                                                                <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block"><?php echo $row['id_oder'] ?></a></h5><span class="text-muted font-weight-normal font-italic"></span>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <td class="align-middle"><strong><?php echo $row['tongtien'] ?></strong></td>
                                                    <?php if ($row['trangthai'] == 0) {?>
                                                        <td class="align-middle">
                                                            <strong>Đang chờ xác nhận</strong>
                                                        </td>
                                                        <td class="align-middle">
                                                        <a href="./php/checkCart.php?delete=<?php echo $row['id_oder'] ?>" class="text-dark">
                                                            <button type="button" class="btn btn-danger" name="delete">Huỷ đơn hàng</button>
                                                        </a>
                                                    </td>
                                                    <?php }else if($row['trangthai'] == 1){ ?> 
                                                        <td class="align-middle">
                                                            <strong>Đang chuẩn bị hàng</strong>
                                                        </td>
                                                        <td class="align-middle">
                                                        <a href="./checkCart.php?id_oder=<?php echo $row['id_oder'] ?>" class="text-dark">
                                                            <button type="button" class="btn btn-danger" name="delete">Xem đơn hàng</button>
                                                        </a>
                                                    </td>
                                                    <?php }else if($row['trangthai'] == 2){ ?>
                                                        <td class="align-middle">
                                                            <strong>Đang giao hàng</strong>
                                                        </td>
                                                        <td class="align-middle">
                                                        <a href="./checkCart.php?id_oder=<?php echo $row['id_oder'] ?>" class="text-dark">
                                                            <button type="button" class="btn btn-danger" name="delete">Xem đơn hàng</button>
                                                        </a>
                                                    </td>
                                                    <?php }else{ ?> 
                                                        <td class="align-middle">
                                                            <strong>Hoàn thành</strong>
                                                        </td>
                                                        <td class="align-middle">
                                                        <a href="./checkCart.php?id_oder=<?php echo $row['id_oder'] ?>" class="text-dark">
                                                            <button type="button" class="btn btn-danger" name="delete">Xem đơn hàng</button>
                                                        </a>
                                                    </td>
                                                    <?php } ?>
                                                    
                                                </tr> 
                                            <?php }
                                            ?> 
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }else if ($_SESSION['chucvu'] == 'seller' || $_SESSION['chucvu'] == 'admin') { 
            $query = sqlsrv_query($conn,"SELECT * FROM oder");
        ?>
            <div class="shopping-cart">
                <div class="px-4 px-lg-0">

                    <div class="pb-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                                    <!-- Shopping cart table -->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="p-2 text-uppercase">Mã đơn hàng</div>
                                                    </th>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="py-2 text-uppercase">Thành tiền</div>
                                                    </th>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="py-2 px-3 text-uppercase">Tình trạng đơn hàng</div>
                                                    </th>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="py-2 px-3 text-uppercase"></div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while ($row = sqlsrv_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <th scope="row">
                                                        <div class="p-2">
                                                            <img src="${o.image}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                            <div class="ml-3 d-inline-block align-middle">
                                                                <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block"><?php echo $row['id_oder'] ?></a></h5><span class="text-muted font-weight-normal font-italic"></span>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <td class="align-middle"><strong><?php echo $row['tongtien'] ?></strong></td>
                                                    <?php if ($row['trangthai'] == 0) {?>
                                                        <td class="align-middle">
                                                            <strong>Đang chờ xác nhận</strong>
                                                        </td>
                                                        <td class="align-middle">
                                                        <a href="./php/checkCart.php?active=<?php echo $row['id_oder'] ?>" class="text-dark">
                                                            <button type="button" class="btn btn-danger" name="delete">Xác nhận đơn hàng</button>
                                                        </a>
                                                    </td>
                                                    <?php }else if($row['trangthai'] == 1){ ?> 
                                                        <td class="align-middle">
                                                            <strong>Đang chuẩn bị hàng</strong>
                                                        </td>
                                                        <td class="align-middle">
                                                        <a href="./php/checkCart.php?ship=<?php echo $row['id_oder'] ?>" class="text-dark">
                                                            <button type="button" class="btn btn-danger" name="delete">Giao hàng</button>
                                                        </a>
                                                    </td>
                                                    <?php }else if($row['trangthai'] == 2){ ?>
                                                        <td class="align-middle">
                                                            <strong>Đang giao hàng</strong>
                                                        </td>
                                                        <td class="align-middle">
                                                        <a href="./php/checkCart.php?success=<?php echo $row['id_oder'] ?>" class="text-dark">
                                                            <button type="button" class="btn btn-danger" name="delete">Hoàn thành</button>
                                                        </a>
                                                    </td>
                                                    <?php }else{ ?> 
                                                        <td class="align-middle">
                                                            <strong>Hoàn thành</strong>
                                                        </td>
                                                        <td class="align-middle">
                                                        <a href="./checkCart.php?id_oder=<?php echo $row['id_oder'] ?>" class="text-dark">
                                                            <button type="button" class="btn btn-danger" name="delete">Xem đơn hàng</button>
                                                        </a>
                                                    </td>
                                                    <?php } ?>
                                                    
                                                </tr> 
                                            <?php }
                                            ?> 
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
         <?php include("./footer.php"); ?>
    </body>

</html>
</html>
