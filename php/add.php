<?php
	include('./connection.php');
	if(isset($_POST['add'])){
            $id = $_POST['product_id'];
            $name = $_POST['product_name'];
            $quantity = $_POST['quantity'];
            $images = $_POST['images'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            foreach ($_POST['category_id'] as $value) {
                $category_value = $value;
            }
            $category_query = sqlsrv_query($conn, "SELECT * FROM Category WHERE category_name = N'$category_value'");
            $category_row = sqlsrv_fetch_array($category_query);
            $category_valueId = $category_row['category_id'];
            $insert = "INSERT INTO Products
           (product_id
           ,product_name
           ,quantity
           ,images
           ,description
           ,category_id
           ,price
           ,selling)
     VALUES
           ('$id'
           ,'$name'
           ,'$quantity'
           ,'$images'
           ,'$description'
           ,'$category_valueId'
           ,'$price'
           ,'0')";
         if(sqlsrv_query($conn, $insert)){
		    header("Location: ../ManagerProduct.php");
		}else{
		    echo "ERROR: Không thể thêm bản ghi $insert";
		}  
    }
    if(isset($_POST['addAccount'])){
            $username = $_POST['staff_name'];
            $phone = $_POST['phone'];
            $pass = $_POST['pass'];
            $lastName = $_POST['lastName'];
            if (isset($_POST['admin'])) {
                $admin = 1;
                $seller = 1;
            }else if ($_POST['seller']) {
                $admin = 0;
                $seller = 1;
            }else{
                $admin = 0;
                $seller = 0;
            }
            $insert = "INSERT INTO account
           (
           username
           ,pass
           ,lastname
           ,phone
           ,seller
           ,admin)
     VALUES
           ('$username'
           ,'$pass'
           ,N'$lastName'
           ,'$phone'
           ,'$seller'
           ,'$admin')";
         if(sqlsrv_query($conn, $insert)){
            header("Location: ../Account.php");
        }else{
            echo "ERROR: Không thể thêm bản ghi $insert";
        }  
    }
?>