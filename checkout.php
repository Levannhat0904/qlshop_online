<?php 
$id = '';$ht = '';$dc = '';$sdt = '';
//Kết nối database
$con=mysqli_connect('localhost','root','','qlshop_online') or die('Lỗi kết nối');
session_start();
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
if (isset($_POST['addcart']) && ($_POST['addcart'])) {
    $idsanpham = $_POST['idsanpham'];
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $sp = [$idsanpham, $tensp, $gia, $soluong];
    $_SESSION['giohang'][] = $sp;  
}
$sql = "SELECT * FROM giohang";
$data = mysqli_query($con, $sql);
// Lấy thông tin khách hàng
$sql1 = "SELECT * FROM khachhang";
$data =mysqli_query($con, $sql1);

if (isset($_POST['order'])) {
    $id = $_POST['id'];
    $ten = $_POST['name'];
    $dc = $_POST['address'];
    $sdt = $_POST['phonenumnber'];
    if ($id == "") {
        echo "<script> alert('Phải nhập mã!')</script>";
    } else {
        $sql1 = "SELECT * FROM khachhang WHERE idkhachhang = '$id'";
        $check = mysqli_query($con, $sql1);
        if (mysqli_num_rows($check) > 0) {
            echo "<script> alert('Trùng ID!')</script>";
        } else {
            $sql = "INSERT INTO khachhang VAlUES ('$id','$ten','$dc','$sdt')";
            $kq = mysqli_query($con, $sql);
            if ($kq){
                echo "<script> alert('Đặt hàng thành công')</script>";
                header("location: phone.php");
                exit;   
            }   
        }
    }
}
$sql="SELECT * FROM donhang";
$data=mysqli_query($con,$sql);
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./temp/style.css">
</head>

<body>
    <?php
    include_once './menu.php'
    ?>
       <form action="http://localhost/qlshop_online/bill.php" method="POST">
            <div class="payment-customer-left">
                <h2><b><u>THÔNG TIN KHÁCH HÀNG</u></b></h2>
                <h2></h2>
             
                    <table>
                        <tr>
                            <td class="col1">Mã khách hàng<span style="color: red;">*</span></td>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <input type="text" name="id" value="<?php echo $id ?>" >
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">Họ tên<span style="color: red;">*</span></td>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <input type="text" name="name" value="<?php echo $ht ?>" >
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">Địa chỉ<span style="color: red;">*</span></td>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <input type="text" name="address" value="<?php echo $dc ?>" >
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">Số điện thoại<span style="color: red;">*</span></td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <input type="text" name="phonenumber" value="<?php echo $sdt ?>" >
                            </td>
                        </tr>
                    </table>
            </div>
        <div class="payment-right">
            <h2 style="text-align:left"><b><u>THÔNG TIN ĐƠN HÀNG</u></b></h2>
            <table>
                <tr>
                    <th style="width: 100px">Mã sản phẩm</th>
                    <th style="width: 250px">Tên sản phẩm</th>
                    <th style="width: 100px">Số lượng</th>
                    <th style="width: 50px">Giá </th>
                    <th style="width: 50px">Thành tiền</th>
                </tr>
                <?php

                if (isset($data) && $data != null) {
                    $total = 0;
                    while ($row = mysqli_fetch_array($data)) {
                        $total= $row['gia'] * $row['soluong'];
                        $row['thanhtien'] += $total;
                        $totalAll+= $total;
                ?>
                        <tr align="center">
                            <td><?php echo $row['idsanpham'] ?></td>
                            <td><?php echo $row['tensanpham'] ?></td>
                            <td><?php echo $row['soluong'] ?></td>
                            <td><?php echo $row['gia'] ?></td>
                            <td><?php echo $row['thanhtien']?></td>
                        </tr>
                <?php
                       
                    }
                }
                ?>
                <tr style="background-color: lightcoral;">
                    <th>Tổng</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th><?php echo $totalAll?></th>
                </tr>
                <tr>    
                    <td>
                        <input type="submit" name="order" value="ĐẶT HÀNG">
                    </td>
                </tr>
            </table>
        </div>
                  
        </form>
</body>

</html>