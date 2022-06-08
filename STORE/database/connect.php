<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "storeFurniture";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn) {
  mysqli_query($conn,"SET NAMES 'utf8' ");

}else{
    echo "fail !".mysqli_connect_error();
}


?>
