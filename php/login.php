<?php
//Khai báo sử dụng session
session_start();
 
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
 
//Xử lý đăng nhập

    //Kết nối tới database
    include('connection.php');
     
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['user']);
    $password = addslashes($_POST['pass']);
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Kiểm tra tên đăng nhập có tồn tại không
        $query = sqlsrv_query($conn, "SELECT * FROM Account WHERE username='$username'");
         $row = sqlsrv_fetch_array($query);
    if ($row['username'] != $username || $password != $row['pass']) {
        $_SESSION['mess'] = "Tài khoản hoặc mật khẩu không chính xác";
        header("Location: ../Login.php");
    }
    else {
        $_SESSION['user'] = $row;
        if(1 == $row['admin'] && 1 == $row['seller']){
            $_SESSION['chucvu'] = "admin";
        }else if(1 == $row['seller'] && 0 == $row['admin']){
            $_SESSION['chucvu'] = "seller";
        }else{
             $_SESSION['chucvu'] = "member";
        }
        header("Location: ../Home.php");
    }
?>