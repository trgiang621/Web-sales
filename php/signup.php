<?php
//Khai báo sử dụng session
session_start();
 
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
 
//Xử lý đăng ký

    //Kết nối tới database
    include('connection.php');
     
    //Lấy dữ liệu nhập vào
    $user = addslashes($_POST['user']);
    $password = addslashes($_POST['pass']);
    $confirm_pass = addslashes($_POST['confirm_pass']);
    $first_name = addslashes($_POST['first_name']);
    $last_name = addslashes($_POST['last_name']);
    $phone = addslashes($_POST['phone']);
    $Name = $first_name.' '.$last_name;
    //Kiểm tra tên đăng nhập có tồn tại không

    $params = array();
    $options =  array( 'Scrollable' => SQLSRV_CURSOR_KEYSET );
    $check = sqlsrv_query($conn, "SELECT * FROM account WHERE username='$user'", $params, $options);
    $num_rows = sqlsrv_num_rows($check);
    if ($num_rows == 0) {
        //đăng ký
        if ($password == $confirm_pass) {
        $query = sqlsrv_query($conn, "INSERT INTO account
               (username
               ,pass
               ,lastname
               ,phone
               ,seller
               ,admin)
         VALUES
               ('$user'
               ,'$password'
               ,N'$Name'
               ,'$phone'
               ,'0'
               ,'0')
        ");
        if ($query) {
            header("Location: ../Login.php");
            }
        }else{
            $_SESSION['mess1'] = "mật khẩu không trùng khớp";
            header("Location: ../signup.php");
        }
    }else {
        $_SESSION['mess1'] = "Tài khoản đã tồn tại";
            header("Location: ../signup.php");
    }
?>