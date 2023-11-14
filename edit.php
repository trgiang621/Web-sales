
<?php 
        include ('./php/connection.php');
        if (isset($_GET['pid'])) {
            $pid = $_GET['pid'];
        }else if (isset($_GET['id'])) {
            $pid = $_GET['id'];
        }
        else header("Location: ./Home.php");
        
        
        
        

    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sửa thông tin sản phẩm</title>
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
                            <?php if (isset($_GET['pid'])) {?>
                                <h2>Edit <b>Product</b></h2>
                            <?php }else {?>
                                <h2>Edit <b>Account</b></h2>
                            <?php } ?>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($_GET['pid'])) { 
                $params = array();
                $options =  array( 'Scrollable' => SQLSRV_CURSOR_KEYSET );
                $query = sqlsrv_query($conn, "SELECT * FROM Products WHERE product_id='$pid'", $params, $options); 
                $row = sqlsrv_fetch_array($query);
            ?>
            
            <div id="editEmployeeModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="./php/xuly.php?pid=<?php echo $row['product_id']; ?>" method="post" name="edit">
                            <div class="modal-header">						
                                <h4 class="modal-title">Edit Product</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><a href="./ManagerProduct.php"></a> &times;</button>
                            </div>
                            <div class="modal-body">					
                                <div class="form-group">
                                    <label>ID</label>
                                    <input value="<?php echo $row['product_id']; ?>" name="product_id" type="text" class="form-control" readonly required>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input value="<?php echo $row['product_name']; ?>" name="product_name" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>quantity</label>
                                     <input value="<?php echo $row['quantity']; ?>" name="quantity" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input value="<?php echo $row['images']; ?>" name="images" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" required><?php echo $row['description']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input value="<?php echo $row['price']; ?>" name="price" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Selling</label>
                                    <input value="<?php echo $row['selling']; ?>" name="selling" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                  <select name="category[]" class="form-select" aria-label="Default select example">
                                    <?php 
                                        $query2 = sqlsrv_query($conn, "SELECT * FROM Category");
                                        $category_id = $row['category_id'];
                                        $query3 = sqlsrv_query($conn, "SELECT * FROM Category WHERE category_id = '$category_id'");
                                        $row2 = sqlsrv_fetch_array($query3);
                                    ?>
                                    <option  value="<?php echo $row2['category_name']; ?>"><?php echo $row2['category_name']; ?></option>
                                    <?php 
                                        while ($row1 = sqlsrv_fetch_array($query2)) {
                                            if($row1['category_name'] == $row2['category_name']){
                                                continue;
                                            }else{
                                    ?>
                                        <option  value="<?php echo $row1['category_name']; ?>"><?php echo $row1['category_name']; ?></option>
                                    <?php  } }?>
                                </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" value="Sửa" name="edit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php } else if (isset($_GET['id'])) {
                $params = array();
                $options =  array( 'Scrollable' => SQLSRV_CURSOR_KEYSET );
                $query = sqlsrv_query($conn, "SELECT * FROM account WHERE id='$pid'", $params, $options); 
                $row = sqlsrv_fetch_array($query);
             ?>
                <div id="editEmployeeModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                <form action="./php/xuly.php?id=<?php echo $row['id']; ?>" method="post" name="editAccount">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Edit Account</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><a href="./Account.php"></a>&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>ID</label>
                            <input value="<?php echo $row['id']; ?>" name="id" type="text" class="form-control" readonly required>
                        </div>
                        <div class="form-group">
                            <label>Tài khoản</label>
                            <input value="<?php echo $row['username']; ?>" name="username" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Họ tên</label>
                             <input value="<?php echo $row['lastname']; ?>" name="lastname" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input value="<?php echo $row['phone']; ?>" name="phone" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input value="<?php echo $row['pass']; ?>" name="pass" type="text" class="form-control" required>
                        </div>
                        <?php if ($row['admin'] == 1 && $row['seller'] == 1) { ?>
                        <div class="form-group">
                                <input type="checkbox" checked="true" name="admin">
                                <label for="vehicle1"> Admin</label><br>
                                <input type="checkbox" name="seller">
                                <label for="vehicle1"> Seller</label><br>
                        <?php }elseif ($row['seller'] == 1 && $row['admin'] == 0) {?>
                                <input type="checkbox" name="admin">
                                <label for="vehicle1"> Admin</label><br>
                                <input type="checkbox" name="seller" checked="true">
                                <label for="vehicle1"> Seller</label><br>
                        </div>
                        <?php }else { ?>
                                <input type="checkbox" name="admin">
                                <label for="vehicle1"> Admin</label><br>
                                <input type="checkbox" name="seller">
                                <label for="vehicle1"> Seller</label><br>
                        <?php } ?>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Sửa" name="editAccount">
                    </div>
                </form>
                </div>
                </div>
            </div>
            <?php } ?>
        </div>


        <script src="js/manager.js" type="text/javascript"></script>
    </body>
</html>