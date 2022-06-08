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
                      $updateproduct = $controller->updateproduct($_GET['idproduct']);
                      $findAllProductById = $controller->findAllProductById($_GET['idproduct']);
                      foreach($findAllProductById as $rs){
                      
                   ?>
                    <form method="POST"  enctype="multipart/form-data">
                      
                        <div style=" display: flex;">
                            <div style="width: 400px;">
                                <label for="product-name">Tên sản phẩm</label>
                                <textarea style="display: block;width: 300px;height :70px " name="name" rows="4" cols="50" id="product-name"  > <?= $rs['nameproduct']  ?> </textarea>
                   
                                <label for="product-code">Mã sản phẩm</label>
                                <textarea style="display: block;width: 300px;height :70px " name="code" rows="4" cols="50" id="product-code"  ><?= $rs['codeproduct'] ?> </textarea>
                                <label for="price">Giá sản phẩm</label>
                                <input value = <?= $rs['price'] ?> type="text" name="price" id="price" style="display: block;width: 300px;">
                                <label for="price">Giá khuyến mãi</label>
                                <input value = <?= $rs['price_sale'] ?> type="text" name="price_sale" id="price" style="display: block;width: 300px;">

                                <label for="price">Kích Thước</label>
                                <input value = <?= $rs['size_pr'] ?> type="text" name="size" id="price" style="display: block;width: 300px;">
                            </div>
                           
                        <div style="width: 400px;">
                        <label for="price">Chống Nước</label>
                                <select name="Waterproofing" style="display: block;width: 300px;" value =  >
                                    <option value=<?=$rs['Waterproofing']?> > <?= $rs['Waterproofing']?> </option>
                                    <option value="Có">Có</option>
                                    <option value="không">Không</option>
                                 
                                </select>
                                <label for="status">Trạng thái</label>
                                <select name="status" style="display: block;width: 300px;" >
                                    <option value=<?= $rs['status'] ?>><?= $rs['status'] ?></option>
                                    <option value="còn hàng">còn hàng</option>
                                    <option value="hết hàng">hết hàng</option>
                                    <option value="hàng sắp về">hàng sắp về</option>
                                </select>
                                <label for="category ">Danh mục sản phẩm</label>
                                <select name="id_category" style="display: block;width: 300px;" >
                                <option value="<?=  $rs['id_category']?>" ><?= $rs['id_category'] ?></option>
                                    <?php 
                                       $findAllCategory = $controller->findAllCategory();
                                       foreach ($findAllCategory as $i){
                                    ?>
                          
                                    <option value="<?=  $i['id'] ?>" ><?= $i['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <label for="brand">Thương hiệu sản phẩm</label>
                           
                                <select name="id_brand" style="display: block;width: 300px;">
                                <option value="<?=  $rs['id_brand']?>" ><?= $rs['id_brand'] ?></option>
                                    <?php
                                      $findAllBrand = $controller->findAllBrand();
                                      foreach($findAllBrand as $i){
                                    ?>
                                    <option value="<?=  $i['id'] ?>"><?= $i['name'] ?></option>
                                    <?php } ?>
                                </select>
                                
                                <label>Hình ảnh</label>
                                <div id="uploadFile">
                                    <input type="file" name="image" id="upload-thumb" >
                                    <input style="display: none;" type="text" name = "image_ori" value = <?= $rs['imageproduct'] ?>  >
                                    <img src="<?= $rs['imageproduct'] ?>">
                                </div>
                        </div>
                        </div>
                        <label for="desc">Mô tả sản phẩm</label>
                        <textarea name="description" id="desc" class="ckeditor"  > <?= $rs['description'] ?></textarea>
                        
                        <input type="submit" name="updateproduct" id="btn-submit" value="Chỉnh Sửa" style="height: 40px;
                                                                                                border-radius: 60px;
                                                                                                width: 150px;
                                                                                                color: green;
                                                                                                border-color: white;
                                                                                                color: white;
                                                                                                background-color: #48ad48;">

                    </form>
                   <?php } ?>
                 
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include 'layout/footer.php';

?>
