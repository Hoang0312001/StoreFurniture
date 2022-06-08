
<?php 
 include "../layout/header.php";
 if(isset($_SESSION['currUser']) &&  $_SESSION['id']){
   
?>

<div id="main-content-wp" class="cart-page" style="padding-bottom: 200px;">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table">
                    <form action="?modules=carts&controllers=index&action=update" method="post">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td >Thành tiền</td>
                            <td>Hoàn tác</td>
                            <td>Cập Nhật</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                    
                        $findByProductByDetailCart = $controller->findByProductByDetailCart();
                        foreach($findByProductByDetailCart as $rs){
                            $total_price = $rs['total_price']
                        ?>
                       
                        <tr>
                            <td><?= $rs['code'] ?></td>
                            <td>
                                <a href="" title="" class="thumb">
                                    <img src="<?= $rs['image'] ?>" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="" title="" class="name-product"><?= $rs['name'] ?></a>
                            </td>
                            <td><?= $rs['price_sale'] != null ? $rs['price_sale'].'đ' : $rs['price'].'đ'  ?></td>
                            <td>              
                                <!-- <p ><?= $rs['num_total'] ?></p> -->
                                <input min="1" style="width: 60px;" type="number" value =<?= $rs['num_total'] ?>  class="num-order" >
                            </td>
                            <td><?= $rs['sub_total_price'].'đ' ?></td>
                            <td>
                                <p ><a href="delcartdetail.php?idproduct=<?= $rs['idproduct'] ?>&idcart=<?= $rs['id_cart'] ?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a></p> 
                           
                            </td>
                            <td> 
                            <p ><a href="#" title="" class="del-product"><i class="fa fa-upload"></i></a></p>   
                            </td>
                        </tr>
                      
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá:  <span><?php echo $total_price.'đ' ?></span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div  class="fl-right">
                                        <a style="margin-right: 660px;background-color: #dc5c2f;" href="orderhis.php" title="" id="checkout-cart">Lịch sử đơn hàng</a>
                                        
                                        <a href="checkout.php" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <hr>
                </form>
            </div>
        </div>
     
    </div>
</div>

<?php include "../layout/footer.php" ?>
<?php 
 }else{
    echo "<script>  window.location =('home.php')</script>";
 }
 ?>