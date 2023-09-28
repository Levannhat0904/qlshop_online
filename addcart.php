<?php
//Kết nối database
$con=mysqli_connect('localhost','root','','test2') or die('Lỗi kết nối');
session_start();
        //lấy dữ liệu trên các control của form
        $id=$_GET['id'];
        $name=$_GET['name'];
        $price=$_GET['price'];
       
        //tạo và thực hiện truy vấn
        $sql="INSERT INTO giohang(idsanpham,tensanpham,dongia) VALUES('$id','$name','$price')";
        $kq=mysqli_query($con,$sql);
        if($kq){
          echo "<script>alert('Đã thêm vào giỏ hàng')</script>";  
       
        }else
        {
            echo"<script>alert('Thêm mới thất bại')</script>"; 
        }
        echo "<script>window.location.href='./cart.php'</script>";
        mysqli_close($con);
?>
