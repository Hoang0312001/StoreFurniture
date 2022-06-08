<?php  
	  session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LOCAL STORE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="../public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="../public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="../public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../public/style.css" rel="stylesheet" type="text/css"/>
        <link href="../public/responsive.css" rel="stylesheet" type="text/css"/>

        <script src="../public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="../public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
        <script src="../public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="../public/js/carousel/owl.carousel.js" type="text/javascript"></script>
        <script src="../public/js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    
                                  
                                    <li>
                                        <a href="../viewsclient/login.php" title=""><?php if(!empty($_SESSION['fullname'])) echo $_SESSION['fullname'];else echo "Tài khoản"; ?></a>
                                    </li>
                                    <?php if(!empty($_SESSION['fullname'])) { ?>
                                    <li>
                                        <a href="../viewsclient/logout.php" title="">(Đăng xuất)</a>
                                    </li>
                                <?php }; ?>
                                   

                                <!--     <li>
                                        <a href="?modules=users&controllers=index&action=index" title="">Đăng kí</a>
                                    </li>
                                    <li>
                                        <a href="?modules=users&controllers=index&action=index" title="">Đăng nhập</a>
                                    </li> -->
                                    <a style="display: inline;" href=""></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="../viewsclient/home.php" title="" id="logo" class="fl-left"><img  id ="logoimg" src="../public/images/logo.png"/></a>
                            <div id="search-wp" class="fl-left">
                                <form method="post" action="../viewsclient/searchproduct.php">
                                    <input type="text" name="key" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                    <input type="submit" id="sm-s" name="btnsearch" value="Tìm kiếm">
                                </form>
                            </div>
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">Tư vấn</span>
                                    <span class="phone">0987.654.321</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">2</span>
                                </a>
                                <?php    
                                        include "../controller/controller.php";
                                        $controller = new controller();
                                        if(isset($_SESSION['id'])){
                                        $coutCartByIdUser = $controller->coutCartByIdUser($_SESSION['id']);
                                        foreach($coutCartByIdUser as $rs){
                                ?>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num"><?= $rs['total_num'] ?></span>
                                    </div>
                                    <div id="dropdown">
                                        <!-- giỏ hangd -->
                                        <p class="desc">Có <span><?= $rs['total_num']?> sản phẩm</span> trong giỏ hàng</p>
                                        <ul class="list-cart">
                                            <?php 
                                                $findDetailCartByIdCart = $controller->findDetailCartByIdCart($rs['id']);
                                                foreach($findDetailCartByIdCart as $i){
                                             ?>
                                      
                                            <li class="clearfix">
                                                <a href="" title="" class="thumb fl-left">
                                                    <img src="<?= $i['image'] ?>" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="" title="" class="product-name"><?= $i['name'] ?></a>
                                                    <p class="price"><?= $i['total_price'] ?> VND</p>
                                                    <p class="qty">Số lượng: <span> <?= $i['num_total'] ?> </span></p>
                                                </div>
                                            </li>
                                             <?php } ?>
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right"><?= $rs['total_price'] ?> VND</p>
                                        </div>
                                     
                                        <div class="action-cart clearfix">
                                            <a href="../viewsclient/cart.php" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="../viewsclient/checkout.php" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                        </div>
                                        <?php } } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>