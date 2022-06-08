        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">
                      
                        <li>
                            <a href="../viewsclient/categoryproduct.php?idcategory=13" title="">Ghế Gaming</a>
                        </li>
                        <li>
                            <a href="../viewsclient/categoryproduct.php?idcategory=14" title="">Ghế Công Thái Học</a>
                        </li>
                        <li>
                            <a href="../viewsclient/categoryproduct.php?idcategory=12" title="">Bàn Gaming</a>
                        </li>
                    
                    </ul>
                </div>
            </div>
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">

                        <?php 
                       
                             $controller = new controller();
                           $findProductSelling = $controller->findProductSelling();
                           foreach ($findProductSelling as $rs){
                            ?>
                           
                        <li class="clearfix">
                            <a href="detailProduct.php?idproduct=<?= $rs['id'] ?>&idcategory=<?= $rs['id_category'] ?>" title="" class="thumb fl-left">
                                <img src="<?= $rs['image'] ?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="detailProduct.php?idproduct=<?= $rs['id'] ?>&idcategory=<?= $rs['id_category'] ?>" title="" class="product-name"><?= $rs['name']  ?></a>
                                <div class="price"> 
                                    <span style="display: block;" class="new"><?= $rs['price_sale'] != null ? $rs['price_sale'] : null  ?></span>
                                    <span style="display: block;" class="old"><?= $rs['price'] ?></span>
                                </div>
                                <a href="checkout.php?id=<?= $rs['id'] ?>" class="buy-now fl-right">Mua Ngay</a>
                            </div>
                        </li>
                    <?php } ?>
                        
                    </ul>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="/public/images/banner00.jpg" alt="">
                    </a>
                   
                </div>
            </div>
        </div>