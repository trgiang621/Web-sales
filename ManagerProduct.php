<?php 
    include('./php/connection.php');
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }else{
       $page = 1;
    }
    $number_page = 05;
    $start_form = ($page - 1)*05;
    $params = array();
    $options =  array( 'Scrollable' => SQLSRV_CURSOR_KEYSET );
    $query = sqlsrv_query($conn, "SELECT * FROM Products order by product_id
                                    OFFSET $start_form ROWS  
                                    FETCH NEXT $number_page ROWS ONLY");
    $query1 = sqlsrv_query($conn, "SELECT * FROM Products", $params, $options);
    $num_rows = sqlsrv_num_rows($query1);
    $total_page = ceil($num_rows/$number_page);
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Quản lý sản phẩm</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/manager.css" rel="stylesheet" type="text/css"/>
        <style>
            img{
                width: 200px;
                height: 120px;
            }
        </style>
    <body>
         <style>
             
    body {
        background: #C1CDC1;
    }
            </style>
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Quản lý <b>Sản phẩm</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal"  class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm sản phẩm</span></a>
                            <a href="./Home.php" class="btn btn-primary" role="button"><i class="material-icons">&#xe88a;</i> <span>Trở về trang chủ</span></a>
                            
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                          
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>                         
                            <th>Giá tiền</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = sqlsrv_fetch_array($query)) {?>
                            <tr>
                                <td><?php echo $row['product_id']; ?></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td>
                                    <img src="<?php echo $row['images']; ?>">
                                </td>
                                <td><?php echo $row['price']; ?> vnd</td>
                                <td>
                                    <a href="./edit.php?pid=<?php echo $row['product_id']; ?>"  class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <a href="./php/delete.php?pid=<?php echo $row['product_id']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b><?php echo $num_rows; ?></b> entries</div>
                    <ul class="pagination">
                        <?php if ($page > 1) {
                            ?>
                        <li class="page-item "><a href="?page=<?php echo $page-1; ?>">Previous</a></li>
                    <?php } ?>
                        <?php
                            for ($i=1; $i <= $total_page; $i++) { 
                         ?>
                             <li class="page-item <?php echo $i ?>"><a href="?page=<?php echo $i ?>" class="page-link"><?php echo $i ?></a>
                      <?php } ?>
                      <?php if ($page < $total_page) {
                      ?>
                        <li class="page-item"><a href="?page=<?php echo $page+1; ?>" class="page-link">Next</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
            
        <!-- Edit Modal HTML -->
        <div id="addEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="./php/add.php" method="post">
                        <div class="modal-header">                      
                            <h4 class="modal-title">Add Product</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">                    
                            <div class="form-group">
                                <label>product_id</label>
                                <input name="product_id" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input name="product_name" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>quantity</label>
                                <input name="quantity" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input name="images" type="text" class="form-control" required>
                            </div>
                              <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input name="price" type="text" class="form-control" required>
                            </div>  
                           <div class="form-group">
                                    <label>Category</label>
                                  <select name="category_id[]" class="form-select" aria-label="Default select example">
                                    <?php 
                                        $query2 = sqlsrv_query($conn, "SELECT * FROM Category");
                                        $category_id = $row['category_id'];
                                        while ($row1 = sqlsrv_fetch_array($query2)) {
                                    ?>
                                    <option  value="<?php echo $row1['category_name']; ?>"><?php echo $row1['category_name']; ?></option>
                                    <?php }?>
                                </select>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-success" value="Add" name="add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
        <script src="js/manager.js" type="text/javascript"></script>
        <script>
               
        </script>
    </body>
</html>