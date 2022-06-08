<?php 
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 
  include '../database/connect.php';
  class controller {
    public function login(){
        global $conn;
        if (isset($_POST['login'])) {
          $username = $_POST["username"];
          $password = md5($_POST["password"]);
          $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
          $result = mysqli_query($conn,$sql);
          $count = mysqli_num_rows($result);
          if($count == 0) {
                
            echo "<script> alert('Sai tài khoản hoặc mật khẩu'); </script>";
             
                 }else{
                  if ($count >= 0) {
                    // output data of each row
      
                    while($row = mysqli_fetch_assoc($result)) {
                          $_SESSION['currUser'] = $row['username'];
                          $_SESSION['fullname'] = $row['fullname'];
                          $_SESSION['id'] = $row['id'];
                          $_SESSION['role'] = $row['roleId'];
                      if($row['roleId'] == 1 && $row['activity_user'] == 1){
                        $_SESSION['currAdmin'] = $row['roleId'];
                         header("location:listproduct.php");
            

                  
                      }else{
                        echo "<script> alert('Sai tài khoản hoặc mật khẩu'); </script>";
                      
                      }
                     
                    }
                  } 
      
                 }
        }

      
          }
          function saveUser() {
            if (isset($_POST['send'])) { 
                $userName = $_POST["username"];
                $address = $_POST["address"];
                $phone = $_POST["phone"];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $pass = md5($_POST["password"]);
                $role = $_POST['role'];
                $date = date("Y/m/d");
                  if($userName == "" && $address == "" && $phone == "" && $fullname == "" && $email == ""){
                    echo "<script> alert('Nhập hết không được để rỗng'); </script>";
                  }else{

                    $sql = "INSERT INTO users (`username`,`password`,fullname,`mail`,`address`,`phone`,`create_date`,`roleId`,`activity_user`) VALUES ('$userName','$pass','$fullname','$email','$address','$phone','$date','$role',1)";
                    query($sql);
                    echo "<script> alert('Thêm Thành Công ')  window.location =('adduser.php');</script>";
               
                  }
            }
          }
          function updateUser($id){
            if(isset($_POST['updateUser'])){
              $address = $_POST["address"];
              $phone = $_POST["phone"];
              $fullname = $_POST['fullname'];
              $email = $_POST['email'];
              $sql = "update users set fullname = '$fullname',address = '$address',phone = '$phone',mail = '$email' where id = '$id'";
              query($sql);
              echo "Sửa thành Công";
            }
       
            
          }
          function deluser($id){
              $sql = "update users set activity_user = 0 where id = '$id'";
              query($sql);
              
          }
          function findUserById($id){
              $sql = "select * from users where id = '$id'";
              return query_return($sql);
          }
          function findAllCategory(){
            $sql = "select * from category ";
            return query_return($sql);
          }

          function findAllBrand(){
            $sql = "select * from brand ";
            return query_return($sql);
          }
          function saveProduct(){
              if(isset($_POST['addproduct'])){
                  $name = $_POST['name'];
                  $code = $_POST['code'];
                  $price = $_POST['price'];
                  $price_sale = $_POST['price_sale'];
                  $size = $_POST['size'];
                  $Waterproofing = $_POST['Waterproofing'];
                  $status = $_POST['status'];
                  $id_category = $_POST['id_category'];
                  $id_brand = $_POST['id_brand'];
                  $description = $_POST['description'];
                  $createBy =  $_SESSION['currUser'];
                  $create_date =  date("Y/m/d");
                  $filename = $_FILES['image']['name'];
                  $target_dir = '../public/uploads/';
                  $target_file = $target_dir. basename($filename);
                    $checkfile =  checkfile($filename,$target_file);
                  if ( $checkfile != null){
                    echo "<script> alert('$checkfile') </script>";
                    echo $checkfile;
                     
                   } else{
                     $sql  = "insert into product(id_category,id_brand ,name,code,price,price_sale,status,description,createBy,Waterproofing,size_pr,create_date,image,activity) 
                     value('$id_category','$id_brand','$name','$code','$price','$price_sale','$status','$description','$createBy','$Waterproofing','$size','$create_date','$target_file ',1)";
                     query($sql);
                     echo "<script> alert('Thêm thành công') </script>";
                   }
              }
           
          }
          function updateproduct($id){
            if(isset($_POST['updateproduct'])){
              $name = $_POST['name'];
              $code = $_POST['code'];
              $price = $_POST['price'];
              $price_sale = $_POST['price_sale'];
              $size = $_POST['size'];
              $Waterproofing = $_POST['Waterproofing'];
              $status = $_POST['status'];
              $id_category = $_POST['id_category'];
              $id_brand = $_POST['id_brand'];
              $description = $_POST['description'];
              $createBy =  $_SESSION['currUser'];
              $create_date =  date("Y/m/d");
          
              if($_FILES['image']['size'] > 0){
                $filename = $_FILES['image']['name'];
                $target_dir = '../public/uploads/';
                $target_file = $target_dir. basename($filename);
                $checkfile =  checkfile($filename,$target_file);
                if ( $checkfile != null){
                  echo "<script> alert('$checkfile') </script>";
                  echo $_FILES['image']['size'] ;
               
                }else{
                  $sql = "update product set id_category = '$id_category',id_brand  = '$id_brand',name = '$name',code = '$code',price = '$price',price_sale = '$price_sale',status = '$status',description = '$description',Waterproofing = '$Waterproofing',size_pr = '$size',image= '$target_file' where id = '$id'";
                  query($sql);
                  echo "<script> alert('Cập Nhật Thành Công') </script>";
                }
              }else{
                $image_ori = $_POST['image_ori'];
                $sql = "update product set id_category = '$id_category',id_brand  = '$id_brand',name = '$name',code = '$code',price = '$price',price_sale = '$price_sale',status = '$status',description = '$description',Waterproofing = '$Waterproofing',size_pr = '$size',image= '$image_ori' where id = '$id'";
                query($sql);
                echo "<script> alert('Cập Nhật Thành Công') </script>";
              }
             
    
          }
          }
          function totalOnePage($idcategory){
            $sql = "SELECT COUNT(id_category) as total FROM product WHERE id_category = '$idcategory' and activity = 1";
            $result= query_return($sql);
            $data=mysqli_fetch_assoc($result);
            return $data['total'];
          }
          function findOneProductByIdCategory($limit,$offset,$idcategory){
            $sql = "select *,product.id as productid,product.name as nameproduct,brand.name as namebrand,category.name as namecategory,product.code as codeproduct,product.image as imageproduct from product INNER JOIN brand on brand.id = product.id_brand INNER JOIN category on category.id = product.id_category where id_category = '$idcategory' and activity = 1 LIMIT $limit OFFSET $offset";
            return query_return($sql);
          }
          function totalAllPage(){
            $sql = "SELECT COUNT(id_category) as total FROM product where activity = 1";
            $result= query_return($sql);
            $data=mysqli_fetch_assoc($result);
            return $data['total'];
          }
          function findAllProductByIdCategory($limit,$offset){
            $sql = "select *,product.id as productid,product.name as nameproduct,brand.name as namebrand,category.name as namecategory,product.code as codeproduct,product.image as imageproduct from product INNER JOIN brand on brand.id = product.id_brand INNER JOIN category on category.id = product.id_category where activity = 1 LIMIT $limit OFFSET $offset";
            return query_return($sql);
          }
          function findAllProductById($idproduct){
            $sql = "select *,product.name as nameproduct,brand.name as namebrand,category.name as namecategory,product.code as codeproduct,product.image as imageproduct from product 
             INNER JOIN brand on brand.id = product.id_brand 
            INNER JOIN category on category.id = product.id_category where  product.id  = '$idproduct'";
            return query_return($sql);
          }
          function delproductById($id){
            $sql = "update product set activity = 0 where id = '$id'";
            query($sql);
          }
          function saveBrand(){
            if(isset($_POST['addbrand'])){
            $name = $_POST['name'];
            $code = $_POST['code'];
            $user = $_SESSION['currUser'];
            $sql = "insert into brand (name,code,user,activity_brand) value ('$name','$code','$user',1)";
            query($sql);
            echo "<script> alert('thêm thành công'); window.location =('addbrand.php')</script>";
            }
          }
          function findBrandByActivity(){
            $sql = "select * from brand where activity_brand = 1";
            return query_return($sql);
          }
          function updateBrand(){
            if(isset($_POST['updatebrand'])){
              $name = $_POST['name'];
              $code = $_POST['code'];
              $id = $_POST['id'];
              $sql = "update brand set name = '$name',code = '$code' where id = '$id'";
              query($sql);
              echo "<script> alert('Sửa thành công'); window.location =('listbrand.php')</script>";
            }
          
          }

          function delbrand(){
            if(isset($_POST['delbrand'])){
              $id = $_POST['id'];
            $sql = "update brand set activity_brand = 0 where id = '$id'";
            query($sql);
            echo "<script> alert('Xóa thành công'); window.location =('listbrand.php')</script>";
            }
          }

          function saveCategory(){
            if(isset($_POST['addcategory'])){
            $name = $_POST['name'];
            $code = $_POST['code'];
            $user = $_SESSION['currUser'];
            $sql = "insert into category (name,code,user,activity_cate) value ('$name','$code','$user',1)";
            query($sql);
            echo "<script> alert('thêm thành công'); window.location =('addcategory.php')</script>";
            }
          }

          function findCategoryByActivity(){
            $sql = "select * from category where activity_cate = 1";
            return query_return($sql);
          }
          function updateCategory(){
            if(isset($_POST['updatecategory'])){
              $name = $_POST['name'];
              $code = $_POST['code'];
              $id = $_POST['id'];
              $sql = "update category set name = '$name',code = '$code' where id = '$id'";
              query($sql);
              echo "<script> alert('Sửa thành công'); window.location =('listcategory.php')</script>";
            }
          
          }

          function delCategory(){
            if(isset($_POST['delcategory'])){
            $id = $_POST['id'];
            $sql = "update category set activity_cate = 0 where id = '$id'";
            query($sql);
            echo "<script> alert('Xóa thành công'); window.location =('listcategory.php')</script>";
            }
          }
          function findOrderWaitByStatus(){
               $sql = "SELECT *,orders.id as idorder from orders INNER JOIN users on orders.custom_id = users.id where status = 2 ORDER BY orders.create_date ASC";
               return query_return($sql);
          }
          function findOrderSuccessByStatus(){
            $sql = "SELECT *,orders.id as idorder from orders INNER JOIN users on orders.custom_id = users.id where status = 1 ORDER BY orders.create_date ASC";
            return query_return($sql);
       }
          function findDetailOrderByIdOrder($idorder){
            $sql = "SELECT * FROM detail_order INNER JOIN product on detail_order.id_product = product.id WHERE detail_order.id_order =  '$idorder' ";
            return query_return($sql);
          }
          function updateOrderById(){
            if(isset($_POST['accept']) ||isset($_POST['deny']) ){
              $id = $_POST['idorder'];
              if(isset($_POST['accept']) ){
                $status = 1;
              }else{
                $status = 3;
              }
              $sql = "update orders set status = $status where id = '$id'";
               query($sql);
              echo "<script> alert('Đã Phê Duyệt'); window.location =('listwaithand.php')</script>";
        
            }
         
          }
          function findAllCustomer(){
            $sql = "select * from users where activity_user = 1";
            return query_return($sql);
          }
// end
        }

        function query_return($sql){
            global $conn;
            $result = mysqli_query($conn, $sql);
            return $result;
        }
        function query($sql){
            global $conn;
            $result = mysqli_query($conn, $sql);
        }
        function countRow($sql){
          global $conn;
          $result = mysqli_query($conn,$sql);
          $count = mysqli_num_rows($result);
          return $count;
        }
        function checkfile($filename,$target_file){  
            $result = false;
            $type_file = pathinfo($filename, PATHINFO_EXTENSION);
            $error['image'] = null;
            $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
            if (!in_array(strtolower($type_file), $type_fileAllow)) {
                $error['image'] = "định dạng file không hỗ trợ";
            }
            $size_file = $_FILES['image']['size'];
            if ($size_file > 5200000) {
                $error['image'] = "file chọn vượt quá dung lương cho phép";
            }
          
            // Kiểm tra file đã tồn tại trê hệ thống
            //  if (file_exists($target_file)) {
            //     $error['image'] = "File bạn chọn đã tồn tại trên hệ thống";
            //      }
                
            if(empty($error)){
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                  
                    $result = true;
               
                } else {
                  return $result;
                }
            
          }
        
          return $error['image'];
          
          }


?>