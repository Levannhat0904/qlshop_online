<?php
    //kết nối database
    $con=mysqli_connect('localhost','root','','test2');
    $tendn='';
    $matkhau='';
    $email='';
    if(isset($_POST['btnDangky'])){
        //lấy dữ liệu trên các control của form
        $tendn=$_POST['txtUsername'];
        $matkhau=$_POST['txtPassword'];
        $email=$_POST['txtEmail'];
        //Kiểm tra dữ liệu rỗng
        if($tendn==''&&$matkhau==''&&$email==''){
            echo "<script>alert('Kiểm tra lại thông tin')</script>";
        }
        else{
            //Kiểm tra trùng tên đăng nhập
        $sql1="SELECT * FROM users WHERE username='$tendn'";
        $dt=mysqli_query($con,$sql1);
        if(mysqli_num_rows($dt)>0){
            echo "<script>alert('Tên đã được đăng ký')</script>";
        }
        else
        {
            //tạo và thực hiện truy vấn
        $sql="INSERT INTO users(username,email,pass) VALUES('$tendn','$email','$matkhau')";
        $kq=mysqli_query($con,$sql);
        if($kq)
        echo "<script>alert('Đăng ký  thành công')</script>";
        else
        echo"<script>alert('Đăng ký thất bại')</script>";
        }   
        }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Trang đăng ký</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <div class="form-container">
   <form action="" method="post">
      <h3>Đăng ký</h3>
      <input type="text" name="txtUsername" required placeholder="enter your name">
      <input type="email" name="txtEmail" required placeholder="enter your email">
      <input type="password" name="txtPassword" required placeholder="enter your password">
      <input type="submit" name="btnDangky" value="Đăng ký" class="form-btn">
      <p>Bạn đã có tài khoản? <a href="dangnhap.php">Đăng nhập</a></p>      
   </form>
</div>
    </body>
</html>