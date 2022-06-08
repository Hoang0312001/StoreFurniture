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
                   
                    header("location:./login.php");

                
                 }else{
                  if ($count >= 0) {
                    // output data of each row
      
                    while($row = mysqli_fetch_assoc($result)) {
                          $_SESSION['currUser'] = $row['username'];
                          $_SESSION['fullname'] = $row['fullname'];
                          $_SESSION['id'] = $row['id'];
                          $_SESSION['role'] = $row['roleId'];
                      if($row['rolesid'] == 1 && $row['activity_user'] != 1){
                        $_SESSION['currAdmin'] = $row['rolesid'];
                        // header("location:../admin.php");
                        echo "<script> alert('Sai tài khoản hoặc mật khẩu'); </script>";

                  
                      }else{
                        header("location:./home.php");
                      
                      }
                     
                    }
                  } 
      
                 }
        }

      
          }
          function register() {
            if (isset($_POST['send'])) { 
                $userName = $_POST["username"];
                $address = $_POST["address"];
                $phone = $_POST["phone"];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $pass = md5($_POST["password"]);
                $repass = md5($_POST["repassword"]);
                $date = date("Y/m/d");
                if( $_POST['password'] !=$_POST['repassword'] ){
                    header("location:./register.php");
                }else{
                  $sql = "INSERT INTO users (`username`,`password`,fullname,`mail`,`address`,`phone`,`create_date`,`roleId`) VALUES ('$userName','$pass','$fullname','$email','$address','$phone','$date','2')";
                  $sql1 = "select id from users where username = '$userName' ";
                  query($sql);
                  $rs = query_return($sql1);
                  foreach($rs as $j){
                   $sql2 = "insert into cart (id_customer,total_num,total_price) value ('$j[id]',0,0)";
                   query($sql2);
                  }
                 
                  header("location:./login.php");
                }

            }else{ echo "NOT POST";}
          }
   function findslider(){
       $sql = "select * from slider ORDER BY RAND() limit 1";
       return  query_return($sql);
   }
   function findAllProduct(){
       $sql = "select * from product where activity = 1";
       return  query_return($sql);
   }
   function findAllProductByDate(){
       $sql = "SELECT * FROM product where activity = 1 ORDER BY create_date desc limit 12";
       return  query_return($sql);
   }
   function findOneProductPhone(){
       $sql = " select *,product.image as imagehd,product.name as nameservice,product.id as idproduct from product INNER JOIN category on product.id_category = category.id  where category.code = '2' and activity = 1 limit 8";
       return  query_return($sql);
   }
   function findOneProductTablet(){
    $sql = " select *,product.image as imagehd,product.name as nameservice ,product.id as idproduct from product INNER JOIN category on product.id_category = category.id where category.code = '3' and activity = 1 limit 8";
    return  query_return($sql);
}
function findOneProductLaptop(){
    $sql = " select *,product.image as imagehd,product.name as nameservice ,product.id as idproduct from product INNER JOIN category on product.id_category = category.id where category.code = '1' and activity = 1 limit 8";
    return  query_return($sql);
}
function saveCart(){
    global $conn;
      if (isset( $_POST["addcart"])){
        if(isset($_SESSION['role'])){
          $price = $_POST['price'];
          $price_sale = $_POST['price_sale'];
          $idproduct = $_POST['id'];
           $iduser = $_SESSION['id'];
           $num_total = 1;
           $price_curr = $price_sale != null ? $price_sale : $price;
           $sql1 = "select * from cart  where id_customer = '$iduser'";
           $query = "select * from  detail_cart where id_product = '$idproduct'";
           $countRowDetailCartByIdproduct = countRow($query);
           $rs = query_return($sql1);
           foreach($rs as $i){
                $sql = "";
               if($countRowDetailCartByIdproduct == 0){
                $sql = "insert into detail_cart(id_cart,id_product,num_total,sub_total_price) value ('$i[id]','$idproduct','$num_total','$price_curr'*num_total)";
                  
               }else{    
                  $sql = "update detail_cart set num_total = num_total + '$num_total',sub_total_price = num_total * '$price_curr'  where  id_product =  '$idproduct' ";   
               }
                query_return($sql);
               $sql2 = "select cart.id as idcart,SUM(detail_cart.num_total) as total_num,SUM(detail_cart.sub_total_price) as  total_price FROM detail_cart INNER JOIN cart on detail_cart.id_cart = cart.id WHERE id_cart = '$i[id]'";
               $result = query_return($sql2);
               foreach($result as $j){
                 $sql3 = " update cart set total_num = '$j[total_num]' ,total_price = '$j[total_price]' where id = '$j[idcart]' ";
                  query($sql3);
            
               }
              
           echo "<script>  window.location =('./cart.php')</script>";
          //  echo "<script> alert('Thêm vào giỏ hàng thành công');</script>";
           }
       
         
        
      }else{
        echo "<script> alert('Bạn Phải Đăng Nhập Để Mua Hàng');</script>";
      }
     }
     
    
}
function addCartDetail(){
    if (isset( $_POST["addproduct"])){
      if(isset($_SESSION['role'])){
        $price = $_POST['price'];
        $price_sale = $_POST['price_sale'];
        $idproduct = $_POST['idproduct'];
         $iduser = $_SESSION['id'];
         $num_total =  $_POST['qlt']; 
         $price_curr = $price_sale != null ? $price_sale : $price;
         $sql1 = "select * from cart  where id_customer = '$iduser'";
         $query = "select * from  detail_cart where id_product = '$idproduct'";
         $countRowDetailCartByIdproduct = countRow($query);
         $rs = query_return($sql1);
         foreach($rs as $i){
              $sql = "";
             if($countRowDetailCartByIdproduct == 0){
              $sql = "insert into detail_cart(id_cart,id_product,num_total,sub_total_price) value ('$i[id]','$idproduct','$num_total','$price_curr'*num_total)";
                
             }else{    
                $sql = "update detail_cart set num_total = num_total + '$num_total',sub_total_price = num_total * '$price_curr'  where  id_product =  '$idproduct' ";   
             }
              query_return($sql);
             $sql2 = "select cart.id as idcart,SUM(detail_cart.num_total) as total_num,SUM(detail_cart.sub_total_price) as  total_price FROM detail_cart INNER JOIN cart on detail_cart.id_cart = cart.id WHERE id_cart = '$i[id]'";
             $result = query_return($sql2);
             foreach($result as $j){
               $sql3 = " update cart set total_num = '$j[total_num]' ,total_price = '$j[total_price]' where id = '$j[idcart]' ";
               return query($sql3);
             }
         }
       
      
    }else{
      echo "<script> alert('Bạn Phải Đăng Nhập Để Mua Hàng');</script>";
    }
   }
   
  
}
    function findProductSelling(){
      $sql = "SELECT *,product.id as idproduct   from detail_order INNER JOIN product on detail_order.id_product = product.id  where  activity = 1 group by id_product ORDER BY sum(detail_order.qty) desc limit 10";
      return query_return($sql);
    }
    function findProductDetailById($id){
      $sql = "select * from product where id = '$id'  and activity = 1";
      return query_return($sql);
    }
    function findProductSimmilar($id){
      $sql = "select * from product where id_category = '$id'  and activity = 1 limit 8";
      return query_return($sql);
    }
    function findByProductByDetailCart(){
      $iduser = $_SESSION['id'];
        $sql = "SELECT id_cart,product.id as idproduct,code,image,name,price,price_sale,num_total,sub_total_price,total_price
         from detail_cart 
        INNER JOIN cart on cart.id = detail_cart.id_cart 
        INNER JOIN product on product.id = detail_cart.id_product  
        where cart.id_customer ='$iduser' and activity = 1";
        return query_return($sql);
    }
    function delCartByIdProduct($idproduct,$idcart){
        $sql = "delete from detail_cart where id_product = '$idproduct'";
         query($sql);
        $sql2 = "select cart.id as idcart,SUM(detail_cart.num_total) as total_num,SUM(detail_cart.sub_total_price) as  total_price FROM detail_cart INNER JOIN cart on detail_cart.id_cart = cart.id WHERE id_cart = '$idcart'";
        $result = query_return($sql2);
        foreach($result as $j){
          $sql3 = " update cart set total_num = '$j[total_num]' ,total_price = '$j[total_price]' where id = '$j[idcart]' ";
          return query($sql3);
        }
       
      
    }
    function buynow($id){
      $sql = "select * from product where id = '$id' ";
      return query_return($sql);
    }
    function buyNowByCart(){
      $queryFindCartByIdUser = "select * from cart  where id_customer = '$_SESSION[id]'";
      $findCartByIdUser = query_return($queryFindCartByIdUser);
      foreach($findCartByIdUser as $rs){
        $sql = "SELECT * FROM detail_cart INNER JOIN product on detail_cart.id_product = product.id where id_cart = '$rs[id]'";
      }
       $findCartById = query_return($sql);
        if(isset($_POST['checkout'])){
          $paymethod = isset($_POST['payment_method'])  ? $_POST['payment_method'] : null;
          $fullname = $_POST['fullname'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $email = $_POST['email'];
          $note =  $_POST['note'];
   
          $date = date("Y/m/d");
          $status = 'Chờ xác nhận';
          if($paymethod != null){
            $queryUserUpdate = "update users set fullname = '$fullname' , phone = '$phone' , mail = '$email',address = '$address' where id = '$_SESSION[id]'";
            query($queryUserUpdate);
            $querySaveOrder = "insert into orders (custom_id,create_date,note,payment_method,status)
            value('$_SESSION[id]','$date','$note','$paymethod','$status')";
            query($querySaveOrder);
            $queryFindOrder  = "SELECT id FROM `orders` WHERE custom_id = '$_SESSION[id]' order BY id desc limit 1";
            $findOrder = query_return($queryFindOrder);
            foreach($findOrder as $i){
              foreach($findCartById  as $rs){
                $price = $rs['price_sale'] != null ? $rs['price_sale']:$rs['price'];
                $querySaveDetailOrder = "insert into detail_order (id_order,id_product ,qty,sub_total_price) 
                value('$i[id]','$rs[id_product]','$rs[num_total]','$rs[sub_total_price]') ";
                query($querySaveDetailOrder);
              }
              $queryFindDetailOrder = "select sum(sub_total_price) as totalprice,SUM(detail_order.qty) as totalqlt from detail_order
               WHERE  id_order ='$i[id]' ";
              $findDetailOrder = query_return($queryFindDetailOrder);
              foreach($findDetailOrder as $j){
                  $queryUpdateOrder = "update orders set total_price = '$j[totalprice]',	total_num_product = '$j[totalqlt]' where id = '$i[id]'";
                  query($queryUpdateOrder);
              }
           }
           foreach($findCartByIdUser  as $rs){
             $queryDelDetailCart = "delete from detail_cart where id_cart = '$rs[id]'";
             $queryDelCart = "update cart set total_num = '0',total_price = '0' where id = '$rs[id]'";
             query($queryDelDetailCart);
             query($queryDelCart);
             
           }
           echo "<script>  window.location =('home.php')</script>";
          }else{
            echo "<script> alert('Không được để phương thức thanh toán trống'); </script>";
          }
     
        }
      return $findCartById;
    }
    function findAllUserById(){
      $sql = "select * from users where id = '$_SESSION[id]'";
      return query_return($sql);
    }
   
    function checkoutByOneProduct(){
      if(isset($_POST['checkout'])){
        $idproduct = $_POST['idproduct'];
        $paymethod = isset($_POST['payment_method'])  ? $_POST['payment_method'] : null;
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $idproduct = $_POST['idproduct'];
        $note =  $_POST['note'];
        $price = $_POST['price'];
        $date = date("Y/m/d");
         if( $paymethod != null){
          $queryUserUpdate = "update users set fullname = '$fullname' , phone = '$phone' , mail = '$email',address = '$address' where id = '$_SESSION[id]'";
          query($queryUserUpdate);
          $queryFindProductById = "select * from product where id = '$_SESSION[id]'";
          $findProductById = query_return($queryFindProductById);
         
            $total_num_product = 1;
            $status = 'Chờ xác nhận';
            $querySaveOrder = "insert into orders (custom_id,total_price,total_num_product,create_date,note,payment_method,status)
          value('$_SESSION[id]','$price','$total_num_product','$date','$note','$paymethod','$status')";
          query($querySaveOrder);
          $queryFindOrder  = "SELECT id FROM `orders` WHERE custom_id = '$_SESSION[id]' order BY id desc limit 1";
          $findOrder = query_return($queryFindOrder);
          foreach($findOrder as $i){
             $qlt = 1;
             $querySaveDetailOrder = "insert into detail_order (id_order,	id_product ,qty,sub_total_price)
              value('$i[id]','$idproduct','$qlt','$price') ";
             query($querySaveDetailOrder);
          } 
          echo "<script>  window.location =('home.php')</script>";
         }else{
          echo "<script> alert('Không được để phương thức thanh toán trống'); </script>";
     
         }
      }
    
    }

   function coutCartByIdUser($id){
     $sql = "select * from cart where id_customer = '$id'";
     return query_return($sql);
   }
  
   function findDetailCartByIdCart($idcart){
     $sql = "SELECT id_product,name,detail_cart.sub_total_price as total_price,num_total,image FROM detail_cart
      INNER JOIN product on detail_cart.id_product = product.id WHERE detail_cart.id_cart = '$idcart'";
     return query_return($sql);
   }
   function findHistoryOrder($iduser){
     $sql = "select * from orders where custom_id = '$iduser'  order by create_date desc";
     return query_return($sql);
   }
   function findDetailOrder($idorder){
     $sql = "SELECT code,image,name,sub_total_price,price,price_sale,qty FROM detail_order 
     INNER JOIN product on detail_order.id_product  = product.id  WHERE id_order = '$idorder' ";
     return query_return($sql);
   }
   function totalPage($idcategory){
     $sql = "SELECT COUNT(id_category) as total FROM product WHERE id_category = '$idcategory' and activity = 1";
     $result= query_return($sql);
     $data=mysqli_fetch_assoc($result);
     return $data['total'];
   }
   function findAllProductByIdCategory($limit,$offset,$idcategory){
     $sql = "select * from product where id_category = '$idcategory' and activity = 1 LIMIT $limit OFFSET $offset";
     return query_return($sql);
   }
   function findProductBySearch(){
     if (isset($_POST['btnsearch'])) {
      $key = $_POST['key'];
      if($key == null && $key=" "){
        echo "<script> alert('Nhập Nội Dung tìm kiếm'); </script>";
      }else{
        $sql = "SELECT * from product WHERE (name like '$key%' or code like '$key%')  and activity = 1";
        return query_return($sql);
     
      }
     }

   }
   function countProductBySearch(){
    if (isset($_POST['btnsearch'])) {
      $key = $_POST['key'];
      if($key == null && $key=" "){
         return 0;
      }else{
        $sql = "SELECT * from product WHERE (name like '$key%' or code like '$key%') and activity = 1";
        return countRow($sql);
      }
     
     
    }
   }

   function countAllProductBySearch(){
    if (isset($_POST['btnsearch'])) {
      $sql = "SELECT * from product where activity = 1";
      return countRow($sql);

    }
   }
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
    $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
    if (!in_array(strtolower($type_file), $type_fileAllow)) {
        $error['upfile'] = "định dạng file không hỗ trợ";
    }
    $size_file = $_FILES['upfile']['size'];
    if ($size_file > 5200000) {
        $error['upfile'] = "file chọn vượt quá dung lương cho phép";
    }
  
    // Kiểm tra file đã tồn tại trê hệ thống
     if (file_exists($target_file)) {
        $error['upfile'] = "File bạn chọn đã tồn tại trên hệ thống";
         }
        
    if(empty($error)){
        if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $target_file)) {
          
            $result = true;
       
        } else {
          return $result;
        }
    
  }

  
  
  }

?>