<?php
//Kết nối database
$con=mysqli_connect('localhost','root','','test2') or die('Lỗi kết nối');
session_start();
        //lấy dữ liệu trên các control của form
        $id=$_GET['id'];
        $name=$_GET['name'];
        $price=$_GET['price'];
        $soluong=1;
        $thanhtien='';
         //Kiểm tra trùng mã id
         $sql1="SELECT * FROM giohang WHERE idsanpham='$id'";
         $dt=mysqli_query($con,$sql1);
         if(mysqli_num_rows($dt)>0){
           $sql2 = "UPDATE giohang SET soluong = soluong + $soluong WHERE idsanpham = '$id'";
            mysqli_query($con, $sql2);
            echo "Số lượng sản phẩm đã được cập nhật.";
         }
         else
         {
            // tạo và thực hiện truy vấn
        $sql="INSERT INTO giohang(idsanpham,tensanpham,dongia,soluong,thanhtien) VALUES('$id','$name','$price','$soluong','$thanhtien')";
        $kq=mysqli_query($con,$sql);
        if($kq)
          echo "<script>alert('Đã thêm vào giỏ hàng')</script>"; 
        
         }   
       
        echo "<script>window.location.href='./cart.php'</script>";
        mysqli_close($con);
?>
