<?php 
//Kết nối database
$con=mysqli_connect('localhost','root','','qlshop_online') or die('Lỗi kết nối');
//Thực hiện truy vấn
$sql="SELECT * FROM khachhang ";
$data=mysqli_query($con,$sql);
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link ref = "stylesheet" href="./temp/style.css">
</head>
<body>
    <?php 
    include_once'./menu.php'
    ?>
    <h2><u>THÔNG TIN KHÁCH HÀNG</u></h2>
    <form method ="POST" action="">
    <table border="1" style="background-color: black; color:aliceblue" >
            <tr align="center">
                <th>Mã khách hàng</th>
                <th>Họ tên</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
            </tr>
            <?php
            if (isset($data) && $data != null) {
                while ($row = mysqli_fetch_array($data)) {
            ?>
                    <tr class="col1" style="text-align: center;">
                        <td><?php echo $row['idkhachhang'] ?></td>
                        <td><?php echo $row['hoten'] ?></td>
                        <td><?php echo $row['diachi'] ?></td>
                        <td><?php echo $row['sdt'] ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
        </form>
    <h2><u>ĐƠN HÀNG SẢN PHẨM</u></h2>
            
    
</body>
</html>
