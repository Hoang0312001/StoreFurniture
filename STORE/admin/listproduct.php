<?php include 'layout/header.php'; ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
    <?php include 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới sản phẩm</h3>
                    <a href="addproduct.php" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="listproduct.php">Tất cả <span class="count">(69)</span></a> |</li>
                            <li class="publish"><a href="listproduct.php?idcategory=13">Ghế Gaming<span class="count"></span></a> |</li>
                            <li class="pending"><a href="listproduct.php?idcategory=12">Bàn Gaming<span class="count"></span> |</a></li>
                            <li class="pending"><a href="listproduct.php?idcategory=14">Ghế Công Thái Học<span class="count"></span></a></li>
                        </ul>
                        <!-- <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form> -->
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Công khai</option>
                                <option value="1">Chờ duyệt</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá</span></td>
                                    <td><span class="thead-text">Khuyến mại</span></td>
                                    <td><span class="thead-text">Trạng Thái</span></td>
                             
                                    <td><span class="thead-text">Chống Nước</span></td>
                                    <td><span class="thead-text">Kích Thước</span></td>
                                    <td><span class="thead-text">Thể Loại</span></td>
                                    <td><span class="thead-text">Thương hiệu</span></td>
                                    <td><span class="thead-text">Mô Tả</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                   $i=0;
                                   $limit = 4; 
                                   $currentPage =!empty($_GET["page"]) ? $_GET["page"]:1;
                                   $offset = ($currentPage - 1)*$limit;
                                 if(isset( $_GET['idcategory'])) {
                                    $idcategory = $_GET['idcategory'];
                                    $total= $controller->totalOnePage($idcategory);
                                    $totalPages = ceil($total/$limit);
                                    $findAllProductByIdCategory = $controller->findOneProductByIdCategory($limit,$offset,$idcategory);
                                }else{
                            
                                    $total= $controller->totalAllPage();
                                    $totalPages = ceil($total/$limit);
                                    $findAllProductByIdCategory = $controller->findAllProductByIdCategory($limit,$offset);
                                } 
                             
                                foreach($findAllProductByIdCategory as $rs){
                                    $i++;
                                 ?>
                                <tr>
                                   
                                    <td><span class="tbody-text"><?php echo $i; ?></span></td>
                                    <td><span class="tbody-text"><?= $rs['codeproduct']; ?></span></td>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?= $rs['imageproduct'] ?>" alt="">
                                        </div>
                                    </td>
                                    <td><span class="tbody-text"><?= $rs['nameproduct']; ?></span></td>
                                    <td><span class="tbody-text"><?= $rs['price']; ?></span></td>
                                    <td><span class="tbody-text"><?= $rs['price_sale']; ?></span></td>
                                    <td><span class="tbody-text"><?= $rs['status']; ?></span></td>
                                  
                                    <td><span class="tbody-text"><?= $rs['Waterproofing']; ?></span></td>
                                    <td><span class="tbody-text"><?= $rs['size_pr']; ?></span></td>
                                    <td><span class="tbody-text"><?= $rs['namecategory']; ?></span></td>
                                    <td><span class="tbody-text"><?= $rs['namebrand']; ?></span></td>
                                    <td><span class="tbody-text"><?= $rs['createBy']; ?></span></td>
                                    <td><span class="tbody-text"><?= $rs['create_date']; ?></span></td>
                                    <td>
                                        <ul class="list-operation ">
                                            <li><a href="updateproduct.php?idproduct=<?= $rs['productid'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="delproduct.php?idproduct=<?= $rs['productid'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
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
            <?php include 'pagination.php'; ?>
        </div>
    </div>
</div>
<?php include 'layout/footer.php'; ?>