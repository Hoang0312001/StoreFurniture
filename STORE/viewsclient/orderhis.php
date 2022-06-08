<?php include "../layout/header.php" ?>
<?php 

    if(!empty($_SESSION['success'])) 
        {echo " <script type='text/javascript'> alert('Chúc mừng bạn đã đặt hàng thành công!!!');</script>";
        unset($_SESSION['success']);}

 ?>
<div id="main-content-wp" class="cart-page" style="padding-bottom: 500px;">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Lịch sử đơn hàng</a>
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
                            <td>STT</td>
                            <td>Mã đơn hàng</td>
                            <td>Thời gian đặt</td>
                            <td>Tổng sản phẩm</td>
                            <td>Tổng giá tiền</td>
                            <td>Trạng thái</td>
                            <td>Hoàn tác</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $key = 0;
                        $findHistoryOrder = $controller->findHistoryOrder($_SESSION['id']);
                        foreach($findHistoryOrder as $rs){
                             $key  = $key + 1; 
                        ?>
                        <tr>
                            <td><?= ($key) ?></td>
                            <td><?= $rs['id']; ?></td>
                            <td><?= $rs['create_date']; ?></td>
                            <td><?= $rs['total_num_product']; ?></td>
                            <td><?= $rs['total_price'].' .VNĐ' ?></td>
                            <td><?= $rs['status'] ;?></td>
                            <td><a href="orderdetail.php?idorder=<?=  $rs['id'] ?>" title="" class="name-product">Chi tiết</a></td>
                           <?php }; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php include "../layout/footer.php" ?>