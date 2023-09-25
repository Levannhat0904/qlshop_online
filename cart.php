<?php 
//Kết nối database
$con=mysqli_connect('localhost','root','','test2') or die('Lỗi kết nối');
//Thực hiện truy vấn
$sql="SELECT * FROM giohang";
$data=mysqli_query($con,$sql);
//Tìm kiếm
if(isset($_POST['btnTim']))
{
    $tensanpham=$_POST['txt_tensp'];
    $idsanpham=$_POST['txt_masp'];
    $sqltk="SELECT * FROM giohang WHERE  idsanpham like '%$idsanpham%'and tensanpham like '%$tensanpham%'";
    $data=mysqli_query($con,$sqltk);
}
function showgiohang(){
        if(isset($_SESSION['giohang'])&&is_array($_SESSION['giohang'])){
        for($i=0;$i<sizeof($_SESSION['giohang']);$i++){
            $tt=$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][3];
            echo'
            <tr>
            <td>'.($i+1).'</td>
            <td><img src="./picture/'.$_SESSION['giohang'][$i][0].'"></td>
            <td>'.$_SESSION['giohang'][$i][1].'</td>
            <td>'.$_SESSION['giohang'][$i][2].'</td>
            <td>'.$_SESSION['giohang'][$i][3].'</td>
             <td><div>'.$tt.'</div></td>
            </tr>'; 
        }
    }
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
</head>
<body>
    <?php 
    include_once './header.php'
    ?>
    <form action="" method="post">
        <table>
    <tr>
                <td colspan="2">
                    <h4>Thông tin tìm kiếm sản phẩm</h4>
                </td>
            </tr>
            
            <tr>
                <td class="col1">Mã sản phẩm</td>
                <td class="col2">
                <input type="text" name="txt_masp">
                </td>
            </tr>
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
        <table >
            <tr align="center">
                <th >STT</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
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
            <td><?php echo $row['idsanpham'] ?></td>
            <td ><?php echo $row['tensanpham'] ?></td>
            <td><?php echo $row['dongia'] ?></td>
            <td><?php echo $row['soluong']?></td>
            <td><?php echo $row['thanhtien']?></td>
            <td>
                <a href="./cart_delete.php?idsanpham=<?php echo $row['idsanpham'] ?>">Xóa</a>&nbsp;&nbsp;
                <a href="">Thanh toán</a>
            </td>
         </tr>
         <?php 
            }
        }
        ?>
        </table>
    </form>
</body>
</html>