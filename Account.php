<?php 
    include('./php/connection.php');
    $query = sqlsrv_query($conn, "SELECT * FROM Account");
    
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Quản lý người dùng</title>
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
                            <h2>Quản lý <b>tài khoản</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal"  class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm tài khoản</span></a>
                            <a href="./Home.php" class="btn btn-primary" role="button"><i class="material-icons">&#xe88a;</i> <span>TRỞ VỀ TRANG CHỦ</span></a>
                            
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                           
                            <th>ID</th>
                            <th>Tên</th>                
                            <th>Số điện thoại</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = sqlsrv_fetch_array($query)){ ?>
                            <tr>
                               
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['lastname']; ?></td>
                                <td><?php echo $row['phone']; ?> </td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" onClick="Show()" id="edit" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <a href="./php/delete.php?id=<?php echo $row['id']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
               
            </div>
        </div>
            
        <!-- Edit Modal HTML -->
        <div id="addEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="./php/add.php" method="post">
                        <div class="modal-header">						
                            <h4 class="modal-title">Thêm tài khoản</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">					
                            <div class="form-group">
                                <label>Họ Tên</label>
                                <input name="lastName" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tài khoản</label>
                                <input name="staff_name" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input name="phone" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input name="pass" type="text" class="form-control" required>
                            </div>
                            <div>
                                <input type="checkbox" name="admin">
                                <label for="vehicle1"> Admin</label><br>
                                <input type="checkbox" name="seller">
                                <label for="vehicle1"> Seller</label><br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Thoát">
                            <input type="submit" class="btn btn-success" value="Thêm" name="addAccount">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Edit account -->
        
        
        <script src="js/manager.js" type="text/javascript"></script>
        <script>
               
        </script>
    </body>
</html>