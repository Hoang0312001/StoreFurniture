<?php include 'layout/header.php'; ?>

<div id="main-content-wp" class="list-product-page" >
    <div class="wrap clearfix">
    <?php include 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                    <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
               
                     
                    <div class="table-responsive">
                        <form  method="post">
                    <input type="text" name = 'idorder' value =<?php echo $_GET['idorder'] ?> hidden >
                    <input id="add-new" name = "accept" class="fl-left" style = "width:100px;margin: 0px;border: aquamarine;
                                                             cursor: pointer;text-align: center;    border-radius: 5px;" type="submit" value = 'Duyệt Đơn'  >
                    <input id="add-new" name = "deny" class="fl-left" style = "width:100px;margin: 0px;border: aquamarine;
                                                             cursor: pointer;text-align: center;    background-color: red;    margin-left: 15px;    border-radius: 5px;" type="submit" value = 'Hủy Đơn'  >
                        </form>
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                             
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá</span></td>
                                    <td><span class="thead-text">Số lượng</span></td>
                                    <td><span class="thead-text">Tổng tiền</span></td>
                            
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $key = 0;
                                $updateOrderById = $controller->updateOrderById();
                                $findDetailOrderByIdOrder = $controller->findDetailOrderByIdOrder($_GET['idorder']);
                                foreach($findDetailOrderByIdOrder as $rs){
                                    $key++;
                                ?>
                                <tr>
                                   
                                    <td><span class="tbody-text"><?=  ($key +1) ;?></h3></span>
                                    <td><span class="tbody-text"><?= $rs['code']; ?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?= $rs['image']; ?>" alt="">
                                        </div>
                                    </td>
                                    <td><span class="tbody-text"><?= $rs['name']; ?></h3></span>
                                    <td><span class="tbody-text"><?= $rs['price'] ;?></span></td>
                                    <td><span class="tbody-text"><?= $rs['qty'] ;?></span></td>
                                    <td><span class="tbody-text"><?= $rs['sub_total_price']; ?></span></td>
                            
                                </tr> 

                            <?php }  ?>
                            </tbody>
                        </table>
                        <hr>;
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>


<?php include 'layout/footer.php'; ?> 