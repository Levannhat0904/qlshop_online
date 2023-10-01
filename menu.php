<?php 
//Kết nối database
// $con=mysqli_connect('localhost','root','','test2') or die('Lỗi kết nối');
require_once './connectdb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <base href="http://localhost/qlshop_online/phone.php" target="_self"> -->
    <base href="http://localhost:8088/nhom1/" target="_self">
    <link rel="stylesheet" href="./css/menu.css">  
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <nav class="container">
                <a href="./phone.php" id="logo"><img src="./picture/logo.png" width="60px" height="60px" alt="home"></a>
            
            <ul id="main-menu">
                <li><a href="./phone.php">Trang chủ</a></li>
                <li><a href="">Sản phẩm</a>
                <ul class="sub-menu">
                    <li><a href="./phone.php">Điện thoại</a>
                    <ul class="sub-menu">
                    <li><a href="">IPHONE</a></li>
                    <li><a href="">SAMSUNG</a></li>
                    <li><a href="">OPPO</a></li>
                    <li><a href="">PIXEL</a></li>
                </ul>
                </li>
                    <li><a href="">Laptop</a>
                    <ul class="sub-menu">
                    <li><a href="">ACER</a></li>
                    <li><a href="">DELL</a></li>
                    <li><a href="">ASUS</a></li>
                    <li><a href="">LENOVO</a></li>
                </ul>
                </li>
                    <li><a href="">Phụ kiện</a></li>
                    <li><a href="">Sản phẩm khác</a></li>
                </ul>

            </li>
                <li><a href="">Blog</a></li>
                <li><a href="">Liên hệ</a></li>
                <li><a href="./cart.php">Đơn hàng</a></li>
                <li><a href="./admin/modules/users/login.php">Đăng nhập</a></li>
                <li><a href="./admin/modules/users/logout.php">Đăng xuất</a></li>
            </ul></nav>
        </div>
    </div>
</body>
</html>