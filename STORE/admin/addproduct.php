<?php 
 include 'layout/header.php'
 ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php include 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh Sản Phẩm</h3>
                    <a href="listproduct.php" title="" id="add-new" class="fl-left">Danh sách</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                   <?php 
                   $saveProduct = $controller->saveProduct();
                   ?>
                    <form method="POST"  enctype="multipart/form-data">
                      
                        <div style=" display: flex;">
                            <div style="width: 400px;">
                                <label for="product-name">Tên sản phẩm</label>
                                <input type="text" name="name" id="product-name" style="display: block;width: 300px;">
                                <label for="product-code">Mã sản phẩm</label>
                                <input type="text" name="code" id="product-code" style="display: block;width: 300px;">
                                <label for="price">Giá sản phẩm</label>
                                <input type="text" name="price" id="price" style="display: block;width: 300px;">
                                <label for="price">Giá khuyến mãi</label>
                                <input type="text" name="price_sale" id="price" style="display: block;width: 300px;">

                                <label for="price">Kích Thước</label>
                                <input type="text" name="size" id="price" style="display: block;width: 300px;">
                            </div>
                           
                        <div style="width: 400px;">
                        <label for="price">Chống Nước</label>
                                <select name="Waterproofing" style="display: block;width: 300px;">
                                    <option value="Có">Có</option>
                                    <option value="không">Không</option>
                                 
                                </select>
                                <label for="Waterproofing">Trạng thái</label>
                                <select name="status" style="display: block;width: 300px;">
                                    <option value="còn hàng">còn hàng</option>
                                    <option value="hết hàng">hết hàng</option>
                                    <option value="hàng sắp về">hàng sắp về</option>
                                </select>
                                <label for="category ">Danh mục sản phẩm</label>
                                <select name="id_category" style="display: block;width: 300px;">
                                    <?php 
                                        $findAllCategory = $controller->findAllCategory();
                                        foreach ($findAllCategory as $rs){
                                    ?>
                                    <option value="<?=  $rs['id'] ?>" ><?= $rs['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <label for="brand">Thương hiệu sản phẩm</label>
                                <select name="id_brand" style="display: block;width: 300px;">
                                    <?php
                                     $findAllBrand = $controller->findAllBrand();
                                     foreach($findAllBrand as $rs){
                                    ?>
                                    <option value="<?=  $rs['id'] ?>"><?= $rs['name'] ?></option>
                                    <?php } ?>
                                </select>
                                
                                <label>Hình ảnh</label>
                                <div id="uploadFile">
                                    <input type="file" name="image" id="upload-thumb">
                                    <img src="public/images/img-thumb.png">
                                </div>
                        </div>
                        </div>
                        <label for="desc">Mô tả sản phẩm</label>
                        <textarea name="description" id="desc" class="ckeditor"></textarea>
                        
                        <input type="submit" name="addproduct" id="btn-submit" value="Thêm mới" style="height: 40px;
                                                                                                border-radius: 60px;
                                                                                                width: 150px;
                                                                                                color: green;
                                                                                                border-color: white;
                                                                                                color: white;
                                                                                                background-color: #48ad48;">

                    </form>
                   
                 
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include 'layout/footer.php';

?>
