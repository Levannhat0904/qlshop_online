<?php 
//Kết nối database
// $con=mysqli_connect('localhost','root','','test2') or die('Lỗi kết nối');
require_once './connectdb.php';
//Thực hiện truy vấn
$sql="SELECT giohang.*, color.name AS color_name FROM giohang INNER JOIN color ON giohang.mausac = color.id";
$data=mysqli_query($con,$sql);
//Tìm kiếm
if(isset($_POST['btnTim']))
{
    $tensanpham=$_POST['txt_tensp'];
    $idsanpham=$_POST['txt_masp'];
    $sqltk="SELECT giohang.*, color.name AS color_name FROM giohang LEFT JOIN color ON giohang.mausac = color.id WHERE giohang.idsanpham LIKE '%$idsanpham%' AND giohang.tensanpham LIKE '%$tensanpham%'";
    $data=mysqli_query($con,$sqltk);
}
//đóng kết nối
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .but{
            width: 50px;
        }
        a{
            text-decoration: none;
        }
    </style>
    <link rel="stylesheet" href="./css/menu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include_once'./menu.php'?>
    <form action="" method="post">
        <table align="center">
    <tr>
                <td colspan="2">
                    <h4>Thông tin hóa đơn</h4>
                </td>
            </tr>
            
            <tr>
                <td class="col1">Mã sản phẩm</td>
                <td class="col2">
                <input type="text" name="txt_masp">
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td class="col1">Tên sản phẩm</td>
                <td class="col2">
                    <input type="text" name="txt_tensp">
                </td>
            </tr>
            <tr>
            <td class="col1"></td>
                <td class="col2">
                <input type="submit" name="btnTim" value="Tìm kiếm">
                </td> 
            </tr>
        </table>
        <br><br>
        <table width="1000px" height="250px" align="center" border="1">
            <tr align="center">
                <th >STT</th>
                <th>Tên sản phẩm</th>
                <th>Màu sắc</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php 
        if(isset($data)&& $data!=null){
            $i=1;
            while($row=mysqli_fetch_array($data)){
         ?>
         <tr align="center">
            <td><?php echo $i++ ?></td>
            <td ><?php echo $row['tensanpham'] ?></td>
            <td><?php echo $row['color_name']?></td>
            <td><?php echo $row['dongia'] ?></td>
            <td><?php echo $row['soluong']?> </td>
            <td><?php echo $row['soluong']*$row['dongia']?></td>
         </tr> 
         <?php 
            }
        }
        ?>
        </table>
    </form>  
</body>
</html>
