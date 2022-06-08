<?php include "../layout/header.php" ?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <?php 
                 
               
                    $findslider = $controller->findslider();
                    foreach($findslider as $rs){
                    ?>
                    <div class="item">
                        <img src= <?= $rs['image'] ?> alt="">
                    </div>
                    <?php  }?>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="../public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="../public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="../public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="../public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="../public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">

                        <?php 
                        $findAllProduct = $controller->findAllProductByDate();
                        foreach($findAllProduct as $rs){
                        ?>

                        <li>
                        <a href="detailProduct.php?idproduct=<?= $rs['id'] ?>&idcategory=<?= $rs['id_category'] ?>" title="" class="thumb">
                                <img src= <?= $rs['image'] ?>>
                            </a>
                            <a href="detailProduct.php?idproduct=<?= $rs['id'] ?>&idcategory=<?= $rs['id_category'] ?>" title="" class="product-name"><?= $rs['name'] ?></a>
                            <div class="price">
                                <span style="display: block;" class="new"><?= $rs['price_sale'] != null ? $rs['price_sale'] : null  ?> VND</span>
                                <span style="display: block;" class="old"><?= $rs['price'] ?> VND</span>
                            </div>
                            <div class="action clearfix">
                                <!-- <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="" title="" class="buy-now fl-right">Mua ngay</a> -->
                                <form  method="post">
                                <input type="text" name = "price" value = <?= $rs['price'] ?>  hidden>
                                <input type="text" name = "price_sale" value = <?= $rs['price_sale'] != null ? $rs['price_sale'] : null  ?> hidden>
                                <input type="text" name = "id" value = <?= $rs['id'] ?> hidden>
                                
                                <input type="submit" value="Thêm giỏ hàng" class="add-cart fl-left" name ="addcart">
                                <!-- <input type="submit" value="Mua ngay"  class="buy-now fl-right" name = "cartnow"> -->
                                <a href="checkout.php?id=<?= $rs['id'] ?>" class="buy-now fl-right">Mua Ngay</a>
                                </form>
                            </div>
                        </li>
                        
                    <?php } ?>

                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">GHÊ GAMING</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">

                        <?php 
                        $findOneProductPhone = $controller->findOneProductPhone();
                         $controller->saveCart();
                        foreach($findOneProductPhone as $rs){
                        ?>
                         <li>
                            <a href="detailProduct.php?idproduct=<?= $rs['idproduct'] ?>&idcategory=<?= $rs['id_category'] ?>" title="" class="thumb">
                                <img src= <?= $rs['imagehd'] ?>>
                            </a>
                            <a href="detailProduct.php?idproduct=<?= $rs['id'] ?>&idcategory=<?= $rs['id_category'] ?>" title="" class="product-name"><?= $rs['nameservice'] ?></a>
                            <div class="price">
                                <span style="display: block;" class="new"><?= $rs['price_sale'] != null ? $rs['price_sale'] : null  ?> VND</span>
                                <span style="display: block;" class="old"><?= $rs['price'] ?> VND</span>
                            </div>
                           
                            <div class="action clearfix">
                                <!-- <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="" title="" class="buy-now fl-right">Mua ngay</a> -->
                                <form  method="post">
                                <input type="text" name = "price" value = <?= $rs['price'] ?> hidden>
                                <input type="text" name = "price_sale" value = <?= $rs['price_sale'] != null ? $rs['price_sale'] : null  ?> hidden>
                                <input type="text" name = "id" value = <?= $rs['idproduct'] ?> hidden>

                                <input type="submit" value="Thêm giỏ hàng" class="add-cart fl-left" name ="addcart">
                                <a href="checkout.php?id=<?= $rs['id'] ?>" class="buy-now fl-right">Mua Ngay</a>
                                </form>
                            </div>
                        </li>
                 
                        <?php }  ?>

                    </ul>
                   
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">GHẾ CÔNG THÁI HỌC</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                    <?php 
                        $findOneProductPhone = $controller->findOneProductTablet();
                        foreach($findOneProductPhone as $rs){
                        ?>
                         <li>
                         <a href="detailProduct.php?idproduct=<?= $rs['idproduct'] ?>&idcategory=<?= $rs['id_category'] ?>" title="" class="thumb">
                                <img src= <?= $rs['imagehd'] ?>>
                            </a>
                            <a href="detailProduct.php?idproduct=<?= $rs['id'] ?>&idcategory=<?= $rs['id_category'] ?>" title="" class="product-name"><?= $rs['nameservice'] ?></a>
                            <div class="price">
                                <span style="display: block;" class="new"><?= $rs['price_sale'] != null ? $rs['price_sale'] : null  ?> VND</span>
                                <span style="display: block;" class="old"><?= $rs['price'] ?> VND</span>
                            </div>
                            <div class="action clearfix">
                                <!-- <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="" title="" class="buy-now fl-right">Mua ngay</a> -->
                                <form  method="post">
                                <input type="text" name = "price" value = <?= $rs['price'] ?> hidden>
                                <input type="text" name = "price_sale" value = <?= $rs['price_sale'] != null ? $rs['price_sale'] : null  ?> hidden>
                                <input type="text" name = "id" value = <?= $rs['idproduct'] ?> hidden>

                                <input type="submit" value="Thêm giỏ hàng" class="add-cart fl-left" name ="addcart">
                                <a href="checkout.php?id=<?= $rs['id'] ?>" class="buy-now fl-right">Mua Ngay</a>
                                </form>
                            </div>
                        </li>
                        
                        <?php }  ?>


                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">BÀN GAMING</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">

                    <?php 
                        $findOneProductPhone = $controller->findOneProductLaptop();
                        foreach($findOneProductPhone as $rs){
                        ?>
                         <li>
                         <a href="detailProduct.php?idproduct=<?= $rs['idproduct'] ?>&idcategory=<?= $rs['id_category'] ?>" title="" class="thumb">
                                <img src= <?= $rs['imagehd'] ?>>
                            </a>
                            <a href="detailProduct.php?idproduct=<?= $rs['id'] ?>&idcategory=<?= $rs['id_category'] ?>" title="" class="product-name"><?= $rs['nameservice'] ?></a>
                            <div class="price">
                                <span style="display: block;" class="new"><?= $rs['price_sale'] != null ? $rs['price_sale'] : null  ?> VND</span>
                                <span style="display: block;" class="old"><?= $rs['price'] ?> VND</span>
                            </div>
                            <div class="action clearfix">
                                <!-- <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="" title="" class="buy-now fl-right">Mua ngay</a> -->
                                <form  method="post">
                                <input type="text" name = "price" value = <?= $rs['price'] ?> hidden>
                                <input type="text" name = "price_sale" value = <?= $rs['price_sale'] != null ? $rs['price_sale'] : null  ?> hidden>
                                <input type="text" name = "id" value = <?= $rs['idproduct'] ?> hidden>

                                <input type="submit" value="Thêm giỏ hàng" class="add-cart fl-left" name ="addcart">
                                <a href="checkout.php?id=<?= $rs['id'] ?>" class="buy-now fl-right">Mua Ngay</a>
                                </form>
                            </div>
                        </li>
                        
                        <?php }  ?>


                    </ul>
                </div>
            </div>
        </div>
        <?php include "../layout/sidebar.php" ?>
      
    </div>
</div>

<?php include "../layout/footer.php" ?>