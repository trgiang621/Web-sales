<?php 
    include './php/connection.php';
    $pid = $_GET['detail_pid'];
    $query2 = sqlsrv_query($conn, "SELECT * FROM Products WHERE product_id='$pid'");
    while($row = sqlsrv_fetch_array($query2)){
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <link href="css/style.css" rel="stylesheet" type="text/css"/>

        <!------ Include the above in your HEAD tag ---------->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <style>
            body {
    
        background: #C1CDC1;
        font-family: 'Roboto', sans-serif;
    }
            .gallery-wrap .img-big-wrap img {
                height: 450px;
                width: auto;
                display: inline-block;
                cursor: zoom-in;
            }


            .gallery-wrap .img-small-wrap .item-gallery {
                width: 60px;
                height: 60px;
                border: 1px solid #ddd;
                margin: 7px 2px;
                display: inline-block;
                overflow: hidden;
            }

            .gallery-wrap .img-small-wrap {
                text-align: center;
            }
            .gallery-wrap .img-small-wrap img {
                max-width: 100%;
                max-height: 100%;
                object-fit: cover;
                border-radius: 4px;
                cursor: zoom-in;
            }
            .img-big-wrap img{
                width: 100% !important;
                height: auto !important;
            }
            <b:tag name='style'>/* <![CDATA[ */
            .buttons_added {
                opacity:1;
                display:inline-block;
                display:-ms-inline-flexbox;
                display:inline-flex;
                white-space:nowrap;
                vertical-align:top;
            }
            .is-form {
                overflow:hidden;
                position:relative;
                background-color:#f9f9f9;
                height:2.2rem;
                width:1.9rem;
                padding:0;
                text-shadow:1px 1px 1px #fff;
                border:1px solid #ddd;
            }
            .is-form:focus,.input-text:focus {
                outline:none;
            }
            .is-form.minus {
                border-radius:4px 0 0 4px;
            }
            .is-form.plus {
                border-radius:0 4px 4px 0;
            }
            .input-qty {
                background-color:#fff;
                height:2.2rem;
                width: 30px;
                text-align:center;
                font-size:1rem;
                display:inline-block;
                vertical-align:top;
                margin:0;
                border-top:1px solid #ddd;
                border-bottom:1px solid #ddd;
                border-left:0;
                border-right:0;
                padding:0;
            }
            .input-qty::-webkit-outer-spin-button,.input-qty::-webkit-inner-spin-button {
                -webkit-appearance:none;
                margin:0;
            }
            /* ]]> */</b:tag>
        </style>
    </head>
    <body>
                <div class="col-sm-10">
                    <div class="container">
                        <div class="card">
                            <div class="row">
                                <aside class="col-sm-5 border-right">
                                    <article class="gallery-wrap"> 
                                        <div class="img-big-wrap">
                                            <div> <a href="#"><img src="<?php echo $row['images']; ?>"></a></div>
                                        </div> <!-- slider-product.// -->
                                        <div class="img-small-wrap">
                                        </div> <!-- slider-nav.// -->
                                    </article> <!-- gallery-wrap .end// -->
                                </aside>
                                </aside>
                                <aside class="col-sm-7">
                                    <article class="card-body p-5">
                                        <h3 class="title mb-3"><?php echo $row['product_name']; ?></h3>

                                        <p class="price-detail-wrap"> 
                                            <span class="price h3 text-warning"> 
                                                <span class="num"><?php echo $row['price']; ?></span><span class="currency">VNĐ</span>
                                            </span> 
                                            <!--<span>/per kg</span>--> 
                                        </p> <!-- price-detail-wrap .// -->
                                        <dl class="item-property">
                                            <dt>Mô tả</dt>
                                            <dd><p><?php echo $row['description']; ?> </p></dd>
                                        </dl>
                                        
                                            <p>Tồn kho: <?php echo $row['quantity']; ?> </p>
<!--                                        <dl class="param param-feature">
                                            <dt>Model#</dt>
                                            <dd>12345611</dd>
                                        </dl>   item-property-hor .// 
                                        <dl class="param param-feature">
                                            <dt>Color</dt>
                                            <dd>Black and white</dd>
                                        </dl>   item-property-hor .// 
                                        <dl class="param param-feature">
                                            <dt>Delivery</dt>
                                            <dd>Russia, USA, and Europe</dd>
                                        </dl>   item-property-hor .// -->

                                        <hr>
                                        <form action="./php/addCart.php?pid=<?php echo $row['product_id']?>" method="post">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <dl class="param param-inline">
                                                        <dt>Số lượng: </dt>
                                                        <div class="buttons_added">
                                                          <input class="minus is-form" type="button" value="-">
                                                          <input aria-label="quantity" class="input-qty" max="<?php echo $row['quantity'] ?>" min="0" name="amount" type="number" value="0">
                                                          <input class="plus is-form" type="button" value="+">
                                                        </div>
                                                    </dl>  <!-- item-property .// -->
                                                </div> <!-- col.// -->
                                            </div> <!-- row.// -->
                                        <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <button type="submit" name="muangay" class="btn btn-lg btn-primary text-uppercase" style="font-size: medium;"> Mua ngay </button>
                                                </div>
                                                <div class="row">
                                                    <button type="submit" class="btn btn-lg btn-outline-primary text-uppercase" style="font-size: medium;"><i class="fa fa-shopping-cart"></i> Thêm giỏ hàng </button>
                                                </div>
                                            </div>
                                        </form>
                                    </article> <!-- card-body.// -->
                                </aside> <!-- col.// -->    
                            </div> <!-- row.// -->
                        </div> <!-- card.// -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
      
    </body>
    <script>
        $('input.input-qty').each(function() {
          var $this = $(this),
            qty = $this.parent().find('.is-form'),
            min = Number($this.attr('min')),
            max = Number($this.attr('max'))
          if (min == 0) {
            var d = 0
          } else d = min
          $(qty).on('click', function() {
            if ($(this).hasClass('minus')) {
              if (d > min) d += -1
            } else if ($(this).hasClass('plus')) {
              var x = Number($this.val()) + 1
              if (x <= max) d += 1
            }
            $this.attr('value', d).val(d)
          })
        })
    </script>
</html>
<?php } ?>