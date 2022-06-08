<?php include "../layout/header.php" ?>

<div id="main-content-wp" class="cart-page" style="padding-bottom: 300px;">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="home.php" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Mã đơn hàng [---> <?php  ?> <---]</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td>Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        $findDetailOrder = $controller->findDetailOrder($_GET['idorder']);
                        foreach($findDetailOrder as $rs){
                        ?>
                        <tr>
                            <td><?= $rs['code']; ?></td>
                            <td>
                                <a href="" title="" class="thumb">
                                    <img src="<?= $rs['image'] ;?>" alt="">
                                </a>
                            </td>
                            <td><?= $rs['name']; ?> </td>
                            <td><?= $rs['price_sale'] != null ? $rs['price_sale'] : $rs['price']  ?></td>
                            <td>
                                <input type="text" name="num-order" value="<?= $rs['qty'] ;?>" class="num-order">
                            </td>
                            <td><?= $rs['sub_total_price'].' .VNĐ'; ?></td>
                        </tr>
                        <?php } ?>

                    </tbody>
                    
                </table>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            
        </div>
    </div>
</div>

<?php include "../layout/footer.php" ?>