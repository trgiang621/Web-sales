<?php
	include("./connection.php");
	 if (isset($_GET['active'])) {
		$id_oder = $_GET['active'];
		sqlsrv_query($conn,"UPDATE oder
	   SET trangthai = '1'
	   WHERE id_oder = '$id_oder'");
		header("Location: ../ManagerCart.php");
	}else if (isset($_GET['ship'])) {
		$id_oder = $_GET['ship'];
		sqlsrv_query($conn,"UPDATE oder
	   SET trangthai = '2'
	   WHERE id_oder = '$id_oder'");
		header("Location: ../ManagerCart.php");
	}else if (isset($_GET['success'])) {
		$id_oder = $_GET['success'];
		sqlsrv_query($conn,"UPDATE oder
	   SET trangthai = '3'
	   WHERE id_oder = '$id_oder'");
		header("Location: ../ManagerCart.php");
	}else if(isset($_GET['delete'])){
		$id_oder = $_GET['delete'];
		sqlsrv_query($conn,"DELETE FROM oder
      WHERE id_oder = '$id_oder'");
		sqlsrv_query($conn,"DELETE FROM oder_detail
      WHERE id_oder = '$id_oder'");
		header("Location: ../ManagerCart.php");
	}
?>