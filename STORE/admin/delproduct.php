<?php 
   include "controller/controller.php";
   $controller = new controller();
   $delproductById = $controller->delproductById($_GET['idproduct']);
   echo "<script>  alert('Xóa Thành Công'); window.location =('listproduct.php');</script>";
?>