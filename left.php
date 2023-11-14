<?php include './php/connection.php';
    $query = sqlsrv_query($conn, "SELECT * FROM Category");
    $query1 = sqlsrv_query($conn, "SELECT TOP 1 * FROM Products ORDER BY selling desc");
    $row1 = sqlsrv_fetch_array($query1);
 ?>
<div class="col-sm-3">
                    <div class="card bg-light mb-3">
                        <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Thể loại</div>
                        <ul class="list-group category_block">
                            <?php while($row = sqlsrv_fetch_array($query)){ ?>
                                <li class="list-group-item text-white "><a href="./Home.php?category=<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a></li>
                            <?php } ?>

                        </ul>
                    </div>
                    <div class="card bg-light mb-3">
                        <div class="card-header bg-success text-white text-uppercase">Bán chạy nhất</div>
                        <div class="card-body">
                            <img class="img-fluid" src="<?php echo $row1['images']; ?>" />
                            <h5 class="card-title" style=" text-align: center;"><?php echo $row1['product_name']; ?></h5>
                            <p class="card-text" style=" text-align: center;"><?php echo $row1['description']; ?></p>
                            <a href="./php/addCart.php?pid=<?php echo $row1['product_id'] ?>&amount=1&ct=1" class="btn btn-danger btn-block"><?php echo $row1['price'] ?></a>
                        </div>
                    </div>
                </div>