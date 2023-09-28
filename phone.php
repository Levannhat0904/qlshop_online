<?php
//Kết nối database
$con=mysqli_connect('localhost','root','','test2') or die('Lỗi kết nối');
//Thực hiện truy vấn
$sql="SELECT * FROM products";
$data=mysqli_query($con,$sql);
    if(isset($_POST['addcart'])){
        //lấy dữ liệu trên các control của form
        $id=$_POST['id'];
        //$img=$_POST['img'];
        $name=$_POST['name'];
        $price=$_POST['price'];
            //tạo và thực hiện truy vấn
        $sql="INSERT INTO giohang(idsanpham,tensanpham,dongia) VALUES('$id','$name','$price')";
        $kq=mysqli_query($con,$sql);
        if($kq)
        echo "<script>alert('Đã thêm vào giỏ hàng')</script>";
        else
        echo"<script>alert('Thêm mới thất bại')</script>";
        }   
        mysqli_close($con);
    // session_start();
    // if(isset($_POST['addcart'])&&($_POST['addcart'])){
    //     //lấy giá trị
        
    //     $name=$_POST['name'];
    //     $price=$_POST['price'];
    //     $id=$_POST['id'];
    //     $sl=1;
    //     //tạo mảng con
    //     $sp=array($id,$name,$price,$sl);
    //     //add vào giỏ hàng
    //     if(!isset($_SESSION['cart'])) $_SESSION['cart']=array();
    //     array_push($_SESSION['cart'],$sp);
    //     header('location:cart.php');
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone</title>
    <style>
    </style>
</head>
<body>
    <form action=""method="POST">
        <?php include_once'./header.php'?>
          <?php  
          if(isset($data)&& $data!=null){
            $i=1;
            while($row=mysqli_fetch_array($data)){
          ?>
         <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo $row['img'] ?>" width="200px" height="200px" name="img" >
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['name'] ?></h5>
                <input type="hidden" name="name" value="<?php echo $row['name']?>">
                <a href=""></a>
                <p class="card-text"><?php echo $row['price'] ?></p>
                <input type="hidden" name="price" value="<?php echo $row['price']?>">
                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                <input type="hidden" name="number" value="1">
                <form action="cart.php" method="POST">
                     <input class="btn btn-primary" type="submit" value="Thêm giỏ hàng" name="addcart">
                </form>
                <input class="btn btn-primary" type="submit" value="Mua ngay" name="buy">&nbsp;&nbsp;
                <!-- <a class="btn btn-primary" href="">Thêm giỏ hàng</a> -->
               
                <a href=""></a>
            </div>
            </div>
         <?php 
            }
        }
        ?>  
    </form>
</body>
</html>
