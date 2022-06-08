<?php include 'layout/header.php'; ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php include 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
            <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa Thông Tin Khách Hàng</h3>
                    <a href="inforuser.php" title="" id="add-new" class="fl-left">Danh sách</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <?php
                    $updateUser = $controller->updateUser($_GET['id']); 
                    $saveUser = $controller->findUserById($_GET['id']);
                     foreach($saveUser as $rs){
                    ?>

                    <form method="POST">
                        <div style="display: flex;">
                            <div style="width: 400px;">
                            <label for="title">Họ Tên</label>
   
                                 <textarea cols="30" rows="10" name="fullname" id="title" style="display: block;width: 300px;height: 40px;"><?= $rs['fullname'] ?></textarea>
                                <label for="title">Điện Thoại</label>
                                <input value = <?= $rs['phone'] ?> type="text" name="phone" id="title" style="display: block;width: 300px;">
                                <label for="title">Email</label>
                                <input value = <?= $rs['mail'] ?> type="text" name="email" id="title" style="display: block;width: 300px;">
                                <label for="title">Địa Chỉ</label>
                                <textarea cols="30" rows="10" name="address" id="title" style="display: block;width: 300px;height: 40px;"><?= $rs['address'] ?></textarea>
                
                                
                            </div>
                            
                        </div>
                    
                        <input type="submit" name="updateUser" id="btn-submit" value="Sửa" style="height: 40px;
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
<?php include 'layout/footer.php'; ?>