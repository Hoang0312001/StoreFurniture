<?php include 'layout/header.php'; ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php include 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh Sách Thương Hiệu Sản Phẩm</h3>
                    <a href="addbrand.php" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                     
                  
                    </div>
                   
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã thương hiêu</span></td>
                                    <td><span class="thead-text">Tên Thương Hiệu</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $i=0;
                                 $findBrandByActivity = $controller->findBrandByActivity();
                                 $updateBrand = $controller->updateBrand();
                                 $delbrand = $controller->delbrand(); 
                                 foreach($findBrandByActivity as $rs)
                                { $i++;?>
                              <form  method="post">
                                <tr>
                                 
                                    <td><span class="tbody-text"><?php echo $i; ?></h3></span>
                               
                                    <td><span class ="tbody-text"><input name = 'code' style = "border:none" type="text" value = <?= $rs['code'];?>></span></td>
                                 
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <h3><input name = 'name' style = "border:none" type="text" value = <?= $rs['name'];?>></h3>
                                        </div>
                                        
                                    </td>
                                    <td><span class="tbody-text"><?= $rs['user']; ?></span></td>
                                    <input name = 'id' type="text" value = <?= $rs['id']; ?> hidden>
                                    <td>
                                        <!-- <ul class="list-operation ">
                                             
                                            <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul> -->
                                        <input id="add-new" name = "updatebrand" class="fl-left" style = "width:70px;margin: 0px;border: aquamarine;
                                                             cursor: pointer;text-align: center;" type="submit" value = 'Sửa'  >
                                    </td>
                                    <td>
                                    <input  id="add-new" type="submit" class="fl-left" style = "width:70px;margin: 0px;border: aquamarine;
                                                             cursor: pointer;text-align: center;"  value = 'Xóa' name = "delbrand" >
                                    </td>
                                </tr>
                             
                                <?php }; ?>
                                </form>
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