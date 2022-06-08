<?php
        include "controller/controller.php";
        $controller = new controller();
    $deluser = $controller->deluser($_GET['id']);
    echo "<script> alert('Xóa thành công'); window.location =('inforuser.php')</script>";
?>