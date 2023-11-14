
	<?php 
		include './php/connection.php';
		$cid = $_GET['category'];
		$params = array();
		$options =  array( 'Scrollable' => SQLSRV_CURSOR_KEYSET );
		$query2 = sqlsrv_query($conn, "SELECT * FROM Products WHERE category_id='$cid'", $params, $options);
		$num_rows = sqlsrv_num_rows($query2);
		if ($num_rows == 0) { 
	?>
			<h3> Không tìm thấy sản phẩm nào</h3>
	<?php  }
		else{
			$query = sqlsrv_query($conn, "SELECT * FROM Products WHERE category_id='$cid'");
		while($row = sqlsrv_fetch_array($query)){
	?>
	     <div class="col-12 col-md-6 col-lg-4">
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
	                        <a href="./php/addCart.php?pid=<?php echo $row['product_id']?>&amount=1" class="btn btn-success btn-block"><i class="fa fa-cart-plus fa-1.5x" aria-hidden="true"></i></a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	<?php } 
		}
?>