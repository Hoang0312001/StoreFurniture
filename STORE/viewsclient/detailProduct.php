<?php include "../layout/header.php" ?>

<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title=""></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-content fl-right">
            <?php 
         
            $findProductDetailById = $controller->findProductDetailById($_GET['idproduct']);
            $addCartDetail = $controller->addCartDetail();
            foreach($findProductDetailById as $rs){
            ?>
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img  src="<?= $rs['image'] ?>" />
                        </a>
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name"><?= $rs['name'] ?></h3>
                        <div class="desc">
                            <p>Cấu Tạo :<?= $rs['createBy']  ?></p>
                            <p>Chống thấm :<?= $rs['Waterproofing']  ?></p>
                            <p>Kích Thước :<?= $rs['size_pr']  ?></p>
                            <p>Mô Tả :<?= $rs['description']  ?></p>
                          
                         
                        </div>
                        <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <span class="status" style="background-color: green; color: white; border-radius: 5px;">:<?= $rs['status']?></span>
                        </div>
                        <p class="price"><?= $rs['price_sale'] != null ? $rs['price_sale']  : $rs['price']   ?> VND</p>
                        <form action="" method="post">
                        <div id="num-order-wp">
                            <p style="display: inline-block; ">Số lượng </p>
                            <input type="text" name = "price" value = <?= $rs['price'] ?> hidden>
                                <input type="text" name = "price_sale" value = <?= $rs['price_sale'] != null ? $rs['price_sale'] : null  ?> hidden>
                                <input type="text" name = "idproduct" value = <?= $_GET['idproduct'] ?> hidden>
                            <input type="number" name="qlt" style="width: 40px;text-align: center;" min= 1 value = 1>
                        </div>
                        <input type="submit" name = "addproduct"  value = "Thêm vào giỏ hàng" class="add-cart">
                        </form>
                    </div>
                </div>
            </div>
           <?php } ?>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php 
                        $findProductSimmilar = $controller->findProductSimmilar($_GET['idcategory']);
                        foreach($findProductSimmilar as $rs){
                        ?>

                        <li>
                        <a href="detailProduct.php?idproduct=<?= $rs['id'] ?>&idcategory=<?= $rs['id_category'] ?>" title="" class="thumb">
                                <img src="<?= $rs['image'] ?>">
                            </a>
                            <a href="detailProduct.php?idproduct=<?= $rs['id'] ?>" title="" class="product-name"><?= $rs['name'] ?></a>
                            <div class="price">
                                <span style="display: block;" class="new"> <?= $rs['price_sale'] != null ? $rs['price_sale'] : null ?> VND</span>
                                <span style="display: block;" class="old"><?= $rs['price'] ?> VND</span>
                            </div>
                            <div class="action clearfix">
                            <form  method="post">
                                <input type="text" name = "price" value = <?= $rs['price'] ?> hidden>
                                <input type="text" name = "price_sale" value = <?= $rs['price_sale'] != null ? $rs['price_sale'] : null  ?> hidden>
                                <input type="text" name = "id" value = <?= $rs['id'] ?> hidden>

                                <input type="submit" value="Thêm giỏ hàng" class="add-cart fl-left" name ="addcart">
                                <input type="submit" value="Mua ngay"  class="buy-now fl-right" name = "cartnow">
                                </form>
                            </div>
                        </li>
                        
                    <?php } ?>
                    
                    </ul>
                </div>
            </div>
        </div>

        <?php include "../layout/sidebar.php" ?>
    </div>
</div>

<?php include "../layout/footer.php" ?>