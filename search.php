<?php 
		include './php/connection.php';
		if (isset($_GET['sanpham'])) {
			$search = $_GET['sanpham'];
		}
		$params = array();
		$options =  array( 'Scrollable' => SQLSRV_CURSOR_KEYSET );
		$query2 = sqlsrv_query($conn, "SELECT * FROM Products WHERE product_name like N'%$search%'", $params, $options);
		$num_rows = sqlsrv_num_rows($query2);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $search ?></title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="./css/style.css" rel="stylesheet" type="text/css"/>
    </head>
        
    <body>
        <?php include("./menu.php"); ?>
        <style>
             
            body {
            background: #C1CDC1;
            }
        </style>
        
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./Home.php">Trang chủ</a></li>
                          	<li class="breadcrumb-item"><a href="#">Tìm kiếm</a></li>
                            <li class="breadcrumb-item active" aria-current="#"><?php echo $search; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

            <?php include("./left.php"); ?>

	<?php	if ($num_rows == 0) { 
	?>
			<h3> Không tìm thấy sản phẩm nào</h3>
	<?php  }
		else{
			$query = sqlsrv_query($conn, "SELECT * FROM Products WHERE product_name like N'%$search%'");
		while($row = sqlsrv_fetch_array($query)){
	?>
	     <div class="col-12 col-md-6 col-lg-3">
	        <div class="card">
	            <div class="img-body" style="width: 252.98px; height: 252.98px;">
	                <img class="card-img-top" src="<?php echo $row['images'] ?>" alt="Card image cap" >
	            </div>
	            
	            <div class="card-body">
	                <h4 class="card-title show_txt" style=" text-align: center;">
	                	<a href="Home.php?detail_pid=<?php echo $row['product_id'] ?>" title="View Product"><?php echo $row['product_name'] ?></a>
	                </h4>
	                <p class="card-text show_txt"><?php echo $row['description']; ?></p>
	                <div class="row">
	                    <div class="col">
	                        <p class="btn btn-primary"><?php echo $row['price'] ?></p>
	                    </div>
	                    <div class="col">
	                        <a href="#" class="btn btn-success btn-block"><i class="fa fa-cart-plus fa-1.5x" aria-hidden="true"></i></a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	<?php } 
		}
?>
	<?php include("./footer.php"); ?>

    </body>
</html>