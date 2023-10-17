<?php
// Kết nối database
require_once './connectdb.php';
// Thực hiện truy vấn
$sql = "SELECT giohang.*, color.name AS color_name, products.name AS products_name, products.price AS products_price FROM giohang LEFT JOIN color ON giohang.mausac = color.id LEFT JOIN products ON giohang.idsanpham COLLATE utf8mb4_general_ci = products.id COLLATE utf8mb4_general_ci";
$data = mysqli_query($con, $sql);
// Tìm kiếm
if (isset($_POST['btnTim'])) {
    $tensanpham = $_POST['txt_tensp'];
    $idsanpham = $_POST['txt_masp'];
    $sqltk = "SELECT giohang.*, color.name AS color_name, products.name AS products_name, products.price AS products_price FROM giohang LEFT JOIN color ON giohang.mausac = color.id LEFT JOIN products ON giohang.idsanpham COLLATE utf8mb4_general_ci = products.id COLLATE utf8mb4_general_ci  WHERE giohang.idsanpham LIKE '%$idsanpham%' AND products.name LIKE '%$tensanpham%'";
    $data = mysqli_query($con, $sqltk);
}
// Đóng kết nối
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
            text-align: center;
            width: 50px;
        }
    </style>
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./css/css_bootstrap.min.css">
</head>
<body>
    <?php include_once'./h1.php'?>
    <form action="" method="post">
        <table align="center" height="200px">
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
        <table width="1200px" height="250px" align="center" border="1">
            <tr align="center">
                <th >STT</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Màu sắc</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php 
               if (isset($data) && $data != null) {
                $i = 1;
                $totalAmount = 0; // Biến để tính tổng tiền               
                while ($row = mysqli_fetch_array($data)) {
                    $thanhTien = $row['soluong'] * $row['products_price'];
                    $totalAmount += $thanhTien;
                    ?>
                    <tr align="center">
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row['idsanpham'] ?></td>
                        <td><?php echo $row['products_name'] ?></td>
                        <td><?php echo $row['color_name'] ?></td>
                        <td><?php echo number_format($row['products_price'],0,",",".")?></td>
                        <td>
                            <input class="but" type="number" name="txt_soluong" value="<?php echo $row['soluong'] ?>" onkeyup="updatePrice(this, <?php echo $row['products_price'] ?>)" min="1" width="50px">
                        </td>
                        <td id="thanh-tien-<?php echo $row['idsanpham'] ?>"><?php echo number_format($thanhTien,0,",",".") ?></td>
                        <td>
                            <a href="./cart_delete.php?idsanpham=<?php echo $row['idsanpham'] ?>">Xóa</a>&nbsp;&nbsp;
                        </td>   
                    </tr>
            <?php 
                }
            }
            ?>
            <tr>
                <td colspan="8" align="right">
                    <h5>Tổng tiền: <span id="tong-tien"><?php echo number_format($totalAmount,0,",","." ) ?>đ</span></h4>
                </td>
            </tr>
            <tr>
                <td colspan="8" align="right">
                    <a class="btn btn-primary" href="./delete_allcart.php">Xóa tất cả</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-primary" href="">Thanh toán</a>
                </td>
            </tr>    
        </table>
        
    </form>  
    <script>
        function updatePrice(input, dongia) {
            var soluong = input.value;
            var thanhtien = soluong * dongia;
            var idsanpham = input.parentNode.parentNode.cells[1].innerHTML;
            document.getElementById('thanh-tien-' + idsanpham).innerHTML = thanhtien;
            var total = calculateTotal();
            document.getElementById('tong-tien').innerHTML = total;
        }
        function calculateTotal() {
            var table = document.querySelector('table');
            var rows = table.querySelectorAll('tr');
            var total = 0;
            for (var i = 1; i < rows.length - 1; i++) {
                var soluong = rows[i].querySelector('input[name="txt_soluong"]').value;
                var dongia = rows[i].querySelector('td:nth-child(5)').innerHTML;
                var thanhtien = soluong * dongia;
                total += thanhtien;
            }
            return total;
        }
    </script>   
</body>
</html>


