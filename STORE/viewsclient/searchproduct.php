<?php include "../layout/header.php" ?>

<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="home.php" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title=""><?php ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?php ?></h3>
                    <div class="filter-wp fl-right">
                        <?php
                        $countProductBySearch = $controller->countProductBySearch();
                        $countAllProductBySearch = $controller->countAllProductBySearch();
                        ?>
                        <p class="desc">Hiển thị <?=  $countProductBySearch ?> trên <?= $countAllProductBySearch  ?> sản phẩm</p>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">

                        <?php
                       
                        $findProductBySearch = $controller->findProductBySearch();
                        if ( $findProductBySearch !=null){
                         foreach($findProductBySearch as $rs){
                        ?>
                        <li>
                            <a href="detailProduct.php?idproduct=<?= $rs['id'] ?>&idcategory=<?= $rs['id_category'] ?>" title="" class="thumb">
                                <img src="<?= $rs['image'] ?>">
                            </a>
                            <a href="detailProduct.php?idproduct=<?= $rs['id'] ?>&idcategory=<?= $rs['id_category'] ?>" class="product-name"><?=  $rs['name'] ?></a>
                            <div class="price">
                                <span style="display: block;" class="new"><?=  $rs['price'] ?> VND</span>
                                <span style="display: block;" class="old"><?=  $rs['price_sale'] != null ? $rs['price_sale'] : $rs['price'] ?> VND</span>
                            </div>
                            <div class="action clearfix">
                            <form  method="post">
                                <input type="text" name = "price" value = <?= $rs['price'] ?> hidden>
                                <input type="text" name = "price_sale" value = <?= $rs['price_sale'] != null ? $rs['price_sale'] : null  ?> hidden>
                                <input type="text" name = "id" value = <?= $rs['id'] ?> hidden>
                             
                       
                                <input type="submit" value="Thêm giỏ hàng" class="add-cart fl-left" name ="addcart">
                                <a href="checkout.php?id=<?= $rs['id'] ?>" class="buy-now fl-right">Mua Ngay</a>
                                </form>
                            </div>
                        </li>
                        <?php }} ?>
                         
                    </ul>
                </div>
            </div>
            <!-- <?php include "pagination.php" ?> -->
        </div>
        <?php include "../layout/sidebar.php" ?>
    </div>
</div>

<?php include "../layout/footer.php" ?>