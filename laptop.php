<?php
    //kết nối database
    $con=mysqli_connect('localhost','root','','qlshop_online');
    if(isset($_POST['them'])){
        //lấy dữ liệu trên các control của form
        $ml=$_POST['txt_maloai'];
        $tl=$_POST['txt_tenloai'];
        $mt=$_POST['txt_mota'];
            //tạo và thực hiện truy vấn
        $sql="INSERT INTO giohang VALUES('$ml','$tl','$mt')";
        $kq=mysqli_query($con,$sql);
        if($kq)
        echo "<script>alert('Thêm vào giỏ hàng thành công')</script>";
        else
        echo"<script>alert('Thêm vào giỏ hàng thất bại')</script>";
        }   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css_bootstrap.min.css" >
</head>
<body>
    <?php
    include_once './header.php' 
    ?>
    <form action="" method="POST">
        <table>
            <tr>
                <td>
                <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./picture/img-pro-07.png" width="200px" height="200px" >
            <div class="card-body">
                <h5 class="card-title">Laptop 2017</h5>
                <p class="card-text">9.790.000</p>
                <a href="#" class="btn btn-primary">Mua ngay</a> &nbsp;&nbsp;
                <a href="./cart.php" class="btn btn-primary" name="them">Thêm giỏ hàng</a>
            </div>
            </div>
                </td>
                <td>
                <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./picture/img-pro-05.png" width="200px" height="200px" >
            <div class="card-body">
                <h5 class="card-title">Laptop</h5>
                <p class="card-text">10.000.000</p>
                <a href="#" class="btn btn-primary">Mua ngay</a> &nbsp;&nbsp;
                <a href="#" class="btn btn-primary">Thêm giỏ hàng</a>
            </div>
            </div>
                </td>
                <td>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./picture/img-pro-07.png" width="200px" height="200px"  >
                <div class="card-body">
                <h5 class="card-title">Laptop</h5>
                <p class="card-text">10.000.000</p>
                <a href="#" class="btn btn-primary">Mua ngay</a> &nbsp;&nbsp;
                <a href="#" class="btn btn-primary">Thêm giỏ hàng</a>
            </div>
            </div>   
            </td>
            </tr>
            <tr> 
                <td>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./picture/img-pro-07.png" width="200px" height="200px"  >
                <div class="card-body">
                <h5 class="card-title">Laptop</h5>
                <p class="card-text">10.000.000</p>
                <a href="#" class="btn btn-primary">Mua ngay</a> &nbsp;&nbsp;
                <a href="#" class="btn btn-primary">Thêm giỏ hàng</a>
                </div>
                </div>
                </td>
                <td>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./picture/img-pro-05.png" width="200px" height="200px"  >
                <div class="card-body">
                <h5 class="card-title">Laptop</h5>
                <p class="card-text">10.000.000</p>
                <a href="#" class="btn btn-primary">Mua ngay</a> &nbsp;&nbsp;
                <a href="#" class="btn btn-primary">Thêm giỏ hàng</a>
                </div>
                </div>
                </td>
                <td>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./picture/img-pro-06.png" width="200px" height="200px"  >
                <div class="card-body">
                <h5 class="card-title">Laptop</h5>
                <p class="card-text">10.000.000</p>
                <a href="#" class="btn btn-primary">Mua ngay</a> &nbsp;&nbsp;
                <a href="#" class="btn btn-primary">Thêm giỏ hàng</a>
                </div>
                </div>
                </td>
            </tr>
            <tr>
            <td>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./picture/img-pro-07.png" width="200px" height="200px"  >
                <div class="card-body">
                <h5 class="card-title">Laptop</h5>
                <p class="card-text">10.000.000</p>
                <a href="#" class="btn btn-primary">Mua ngay</a> &nbsp;&nbsp;
                <a href="#" class="btn btn-primary">Thêm giỏ hàng</a>
                </div>
                </div>
                </td>
                <td>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./picture/img-pro-07.png" width="200px" height="200px"  >
                <div class="card-body">
                <h5 class="card-title">Laptop</h5>
                <p class="card-text">10.000.000</p>
                <a href="#" class="btn btn-primary">Mua ngay</a> &nbsp;&nbsp;
                <a href="#" class="btn btn-primary">Thêm giỏ hàng</a>
                </div>
                </div>
                </td>
                <td>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./picture/img-pro-05.png" width="200px" height="200px"  >
                <div class="card-body">
                <h5 class="card-title">Laptop</h5>
                <p class="card-text">10.000.000</p>
                <a href="#" class="btn btn-primary">Mua ngay</a> &nbsp;&nbsp;
                <a href="#" class="btn btn-primary">Thêm giỏ hàng</a>
                </div>
                </div>
                </td>
            </tr>
        </table>
    </form>
    <?php
    include_once './footer.php' 
    ?>
</body>
</html>