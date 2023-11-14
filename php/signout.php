<?php
	session_start();
	include './php/connection.php';
	unset($_SESSION['user']);
	unset($_SESSION['giohang']);
	unset($_SESSION['chucvu']);
	header("Location: ../Home.php");
?>