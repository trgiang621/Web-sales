<?php
	include('./connection.php');
	if(isset($_POST['edit'])){
            $id = $_POST['product_id'];
            $name = $_POST['product_name'];
            $quantity = $_POST['quantity'];
            $images = $_POST['images'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $selling = $_POST['selling'];
            foreach ($_POST['category'] as $value) {
                $category_value = $value;
            }
            $category_query = sqlsrv_query($conn, "SELECT * FROM Category WHERE category_name = N'$category_value'");
            $category_row = sqlsrv_fetch_array($category_query);
            $category_valueId = $category_row['category_id'];
            $update = "UPDATE Products
            SET
                product_name = N'$name'
               ,quantity = '$quantity'
               ,images = N'$images'
               ,description = N'$description'
               ,category_id = '$category_valueId'
               ,price = N'$price'
               ,selling = '$selling'
          WHERE product_id = '$id'";
         if(sqlsrv_query($conn, $update)){
		    header("Location: ../ManagerProduct.php");
		}else{
		    echo "ERROR: Không thể cập nhật bản ghi $update";
		}
    }else if(isset($_POST['editAccount'])){
            $id = $_POST['id'];
            $name = $_POST['username'];
            $lastName = $_POST['lastname'];
            $phone = $_POST['phone'];
            $pass = $_POST['pass'];
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
            $update = "UPDATE account
            SET
                username = '$name'
               ,lastname = N'$lastName'
               ,phone = '$phone'
               ,pass = '$pass'
               ,admin = '$admin'
               ,seller = '$seller'
          WHERE id = '$id'";
         if(sqlsrv_query($conn, $update)){
            header("Location: ../Account.php");
        }else{
            echo "ERROR: Không thể cập nhật bản ghi $update";
        }
    }
?>
