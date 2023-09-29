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
        {
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
    <link rel="stylesheet" href="/admin/public/css/style1.css">
</head>
<body>
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
      <input type="text" name="txt_ten" required placeholder="enter your username">
      <input type="password" name="txt_mk" required placeholder="enter your password">
      <input class="form-btn" type="submit" value="Đăng nhập" name="dangnhap">
      <p>Bạn chưa có tài khoản? <a href="dangky.php">Đăng ký</a></p>     
   </form>
</div>
</body>
</html>