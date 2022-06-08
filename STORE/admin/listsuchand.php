<?php include 'layout/header.php'; ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
    <?php include 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng cần xử lý</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
              
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Khách hàng</span></td>
                                    <td><span class="thead-text">Thời gian đặt</span></td>
                                    <td><span class="thead-text">Tổng số mặt hàng</span></td>
                                    <td><span class="thead-text">Tổng tiền</span></td>
                                    <td><span class="thead-text">Yêu Cầu</span></td>
                                    <td><span class="thead-text">Phương thức thanh toán</span></td>
                                    <td><span class="thead-text">Hoàn tác</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                     $key = 0;
                                    $findOrderWaitByStatus = $controller->findOrderSuccessByStatus();
                                   foreach($findOrderWaitByStatus as $rs){
                                       $key++;
                                    ?>
                                <tr>
                                
                                    <td><span class="tbody-text"><?= ($key); ?></span></td>
                                    <td><span class="tbody-text"><?=  $rs['fullname']; ?></span></td>
                                    <td><span class="tbody-text"><?=  $rs['create_date']; ?></span></td>
                                    <td><span class="tbody-text"><?=  $rs['total_num_product']; ?></span></td>
                                    <td><span class="tbody-text"><?=  $rs['total_price']; ?></h3></span>
                                    <td><span class="tbody-text"><?=  $rs['note']; ?></h3></span>
                                    <td><span class="tbody-text"><?=  $rs['payment_method']; ?></span></td>
                                    <td><span class="tbody-text" style = "color:#21be18"><?=  $rs['status']; ?></span></td>
                                </tr>
                               
                                
                                <?php }; ?>
                            </tbody>
                            
                        </table>
                        <hr>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</div>


<?php include 'layout/footer.php'; ?> 