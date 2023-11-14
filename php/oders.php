<?php 
	include("./connection.php");
	session_start();
	$user = $_SESSION['user'];
	if (isset($_GET['active'])) {
		$id = $user[0];
		$name = $_POST['lastName'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$note = $_POST['note'];
		$tongtien = $_SESSION['tong'];
		$query = sqlsrv_query($conn,"INSERT INTO oder
           (	id_name
	           ,lastName
	           ,phone
	           ,address
	           ,note
	           ,trangthai
	           ,tongtien)
     		VALUES
	           ('$id'
	           ,N'$name'
	           ,'$phone'
	           ,N'$address'
	           ,N'$note'
	           ,'0'
	       	   ,'$tongtien')");
		if ($query) {
			$query2 = sqlsrv_query($conn,"SELECT TOP 1 * FROM oder ORDER BY id_oder desc");
			$row = sqlsrv_fetch_array($query2);
			$oder_id = $row['id_oder'];
			echo $oder_id;
			for ($i=0; $i < sizeof($_SESSION['giohang']) ; $i++) {
				$product_name = $_SESSION['giohang'][$i][0];
				$quantity = $_SESSION['giohang'][$i][2] ;
				$price = $_SESSION['giohang'][$i][1];
				$query1 = sqlsrv_query($conn,"INSERT INTO oder_detail
	           	(	 id_oder
	           		,product_name
	           		,quantity
	           		,price
           		)
     			VALUES
		           ($oder_id
		           ,N'$product_name'
		           ,$quantity
		           ,$price
	       		)");
			
			}
			if ($query1) {
				unset($_SESSION['giohang']);
				header("location:../Home.php");
			}
		}else echo "UPDATE không thành công $query";
	}
 ?>