<?php
 include "../controller/controller.php";
 $controller = new controller();
 $controller->delCartByIdProduct($_GET['idproduct'],$_GET['idcart']);
 header("location:cart.php");
?>