<?php include 'layout/header.php'; ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php include 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới thương hiệu sản phẩm</h3>
                    <a href="?modules=brands&controllers=index&action=list" title="" id="add-new" class="fl-left">Danh sách</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <?php 
                    $saveUser = $controller->saveUser();
                    ?>

                    <form method="POST">
                        <div style="display: flex;">
                            <div style="width: 400px;">
                                 <label for="title">Tài Khoản</label>
                                <input type="text" name="username" id="title" style="display: block;width: 300px;">
                                <label for="title">Mật Khẩu</label>
                                <input type="text" name="password" id="title" style="display: block;width: 300px;">
                                <label for="title">Họ Tên</label>
                                <input type="text" name="fullname" id="title" style="display: block;width: 300px;">
                                <label for="title">Điện Thoại</label>
                                <input type="text" name="phone" id="title" style="display: block;width: 300px;">
                                <label for="title">Email</label>
                                <input type="text" name="email" id="title" style="display: block;width: 300px;">
                                <label for="title">Địa Chỉ</label>
                                <input type="text" name="address" id="title" style="display: block;width: 300px;">
                                <label for="title">Quyền</label>
                                <select name="role" id="title">
                                <option value = 1>Admin</option>
                                <option value = 2>customer</option>
                                </select>
                                
                            </div>
                            
                        </div>
                    
                        <input type="submit" name="send" id="btn-submit" value="Thêm Mới" style="height: 40px;
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