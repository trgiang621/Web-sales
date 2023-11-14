<?php
	include('./connection.php');
	session_start();
	if(isset($_GET['pid'])){
            $id = $_GET['pid'];
            
            $delete = "DELETE FROM Products
      WHERE product_id = '$id'";
         if(sqlsrv_query($conn, $delete)){
		    header("Location: ../ManagerProduct.php");
		}else{
		    echo "ERROR: Không thể cập nhật bản ghi $delete";
		}
   }else if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            $delete = "DELETE FROM account
      WHERE id = '$id'";
         if(sqlsrv_query($conn, $delete)){
		    header("Location: ../Account.php");
		}else{
		    echo "ERROR: Không thể cập nhật bản ghi $delete";
		}
   }else if (isset($_GET['delete'])) {
   	array_splice($_SESSION['giohang'],$_GET['delete'],1);
   	header("location:../Cart.php");
   }
?>
