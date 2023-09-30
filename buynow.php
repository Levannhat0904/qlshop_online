<?php
//Kết nối database
$con=mysqli_connect('localhost','root','','qlshop_online') or die('Lỗi kết nối');
session_start();
        //lấy dữ liệu trên các control của form
        $id=$_GET['id'];
        $name=$_GET['name'];
        $price=$_GET['price'];
       
        //tạo và thực hiện truy vấn
        $sql="INSERT INTO donhang(idsanpham,tensanpham,gia) VALUES('$id','$name','$price')";
        $kq=mysqli_query($con,$sql);
        echo "<script>window.location.href='./checkout.php'</script>";
        mysqli_close($con);

?>
