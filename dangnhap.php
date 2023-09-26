<?php
session_start();
$con=mysqli_connect('localhost','root','','test2');
if(isset($_POST['dangnhap'])){
    $name=mysqli_real_escape_string($con,$_POST['txt_ten']);
    $pass=mysqli_real_escape_string($con,$_POST['txt_mk']);
    $select="SELECT * from users where username='$name' && pass='$pass'";
    $result=mysqli_query($con,$select);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        if($row['usertype']=='user'){
            $_SESSION['user_name']==$row['username'];
            header('location:cart.php');
        }
        elseif($row['usertype']=='admin'){
            $_SESSION['admin_name']==$row['username'];
            header('location:phone.php');
        }
    }else{
        $error[]='Mật khẩu hoặc tên đăng nhập sai';
    }
    
    
} if(isset($_POST['dangky']))
    {
        header('location:dangky.php');
        exit;
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
    <!-- <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container-fluid mt-3" style="align-items: center;">
         <h2>Đăng nhập</h2>
       
          <div class="form-group">
      <label >Tên đăng nhập</label>
      <input type="text" name="txt_ten" class="form-control" >
      <label >Mật khẩu</label>
      <input type="password" name="txt_mk" class="form-control" ><br>
      <input class="btn btn-primary" type="submit" value="Đăng nhập" name="dangnhap">
        <input class="btn btn-primary"type="submit" value="Đăng ký" name="dangky"><br>
   </div>
        
        
    </form> -->
    <div class="form-container">

   <form action="" method="post">
      <h3>Đăng nhập</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="txt_ten" required placeholder="enter your email">
      <input type="password" name="txt_mk" required placeholder="enter your password">
      <input class="form-btn" type="submit" value="Đăng nhập" name="dangnhap">
        
      <p>Bạn chưa có tài khoản? <a href="dangky.php">Đăng ký</a></p> 
      
      
   </form>

</div>

</body>
</html>