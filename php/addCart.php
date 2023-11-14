<?php
	include("./connection.php");
	session_start();
	if (isset($_POST['muangay'])) {
		if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
		$pid = $_GET['pid'];
		if (isset($_POST['amount'])) {
			$amount = $_POST['amount'];
		}else $amount = 1;
		
		$query = sqlsrv_query($conn, "SELECT * FROM Products WHERE product_id='$pid'");
			while($row = sqlsrv_fetch_array($query)){
	            $name = $row['product_name'];
	            $price = $row['price'];
	            
	        }
	    $fl = 0;
	    for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
	    	if ($_SESSION['giohang'][$i][0] == $name) {
	    		$fl = 1;
	    		$_SESSION['giohang'][$i][2] += $amount;
	    		break;
	    	}
	    }
	    if ($fl == 0) {
		$sp = [$name, $price, $amount];
	    $_SESSION['giohang'][] = $sp;
	    header("location:../Cart.php");
	    }else header("location:../Cart.php");
	}else{
		if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
		$pid = $_GET['pid'];
		if (isset($_POST['amount'])) {
			$amount = $_POST['amount'];
		}else $amount = 1;
		
		$query = sqlsrv_query($conn, "SELECT * FROM Products WHERE product_id='$pid'");
			while($row = sqlsrv_fetch_array($query)){
	            $name = $row['product_name'];
	            $price = $row['price'];
	            
	        }
	    $fl = 0;
	    for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
	    	if ($_SESSION['giohang'][$i][0] == $name) {
	    		$fl = 1;
	    		$_SESSION['giohang'][$i][2] += $amount;
	    		break;
	    	}
	    }
	    if ($fl == 0) {
		$sp = [$name, $price, $amount];
	    $_SESSION['giohang'][] = $sp;
	    if (isset($_GET['ct'])) {
	    	header("location:../Cart.php");
	    }
	    else header("location:../Home.php");
	    }else header("location:../Home.php");
	}
	
    
 ?>