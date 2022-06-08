<?php include 'layout/header.php'; ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php include 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới Thể Loại</h3>
                    <a href="listcategory.php" title="" id="add-new" class="fl-left">Danh sách</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <?php 
                    $saveBrand = $controller->savecategory();
                    ?>

                    <form method="POST"  enctype="multipart/form-data">
                        <div style="display: flex;">
                            <div style="width: 400px;">
                                <label for="title">Tên Thể Thoải</label>
                                <input type="text" name="name" id="title" style="display: block;width: 300px;">
                                <label for="title">Mã Code</label>
                                <input type="text" name="code" id="title" style="display: block;width: 300px;">
                     
                                
                            </div>
                            
                        </div>
                    
                        <input type="submit" name="addcategory" id="btn-submit" value="Thêm Mới" style="height: 40px;
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
<?php include 'layout/footer.php'; ?>