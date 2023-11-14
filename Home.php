<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Trang chủ</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="./css/style.css" rel="stylesheet" type="text/css"/>
        <link href="./css/3w.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            </head>
        
    <body>
        <?php include("./menu.php"); ?>
        <style>
             
            body {
            background: #C1CDC1;
            }
        </style>
        
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./Home.php">Trang chủ</a></li>
                          <!--  <li class="breadcrumb-item"><a href="date">Sắp xếp hsd gần nhất</a></li>
                            <li class="breadcrumb-item"><a href="quantity">Sắp xếp theo số lượng</a></li>
                            <li class="breadcrumb-item active" aria-current="#">Sub-category</li> -->
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

            <?php include("./left.php"); ?>
        <div class="col-sm-9">
            <div class="row">
                <?php
                    if(isset($_GET['category'])){
                        $url = $_GET['category'];
                        include("./category.php");
                    }else if(isset($_GET['detail_pid'])){
                        $url = $_GET['detail_pid'];
                        include("./detail.php");
                    }else{
                        include("./main.php");;
                    }
                ?>
            </div>
        </div>

            </div>
        </div>
          
        
        <?php include("./footer.php"); ?>

    </body>
</html>