<?php 
 include "../controller/controller.php";
 $controller = new controller();
$buynow = $controller->buynow($_GET['id']);
?>