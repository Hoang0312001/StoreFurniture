<?php include 'layout/header.php'; ?>

<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
    <?php include 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách khách hàng</h3>
                    <a href="adduser.php" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                   
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Họ tên</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    <td><span class="thead-text">Địa chỉ</span></td>
                                    <td><span class="thead-text">Ngày đăng kí</span></td>>
                                    <td><span class="thead-text">Hoàn tác</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $key = 0;
                                $findAllCustomer = $controller->findAllCustomer();
                                foreach($findAllCustomer as $rs)
                                {  $key++;
                                    ?>
                                <tr>
                                
                                    <td><span class="tbody-text"><?php echo ($key); ?></h3></span>
                                    <td><span class="tbody-text"><?=  $rs['fullname']; ?></h3></span>
                                    <td><span class="tbody-text"><?=  $rs['mail']; ?></span></td>
                                    <td><span class="tbody-text"><?=  $rs['phone']; ?></span></td>
                                    <td><span class="tbody-text"><?=  $rs['address']; ?></span></td>
                                    <td><span class="tbody-text"><?=  $rs['create_date']; ?></span></td>
                                    <td>
                                        <ul class="list-operation ">
                                            <li><a href="updateuser.php?id=<?=  $rs['id']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="deluser.php?id=<?=  $rs['id']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
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