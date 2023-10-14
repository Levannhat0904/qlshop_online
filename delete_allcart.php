<?php
//$con=mysqli_connect('localhost','root','','test2') or die('Lỗi kết nối');
// Kết nối database
require_once './connectdb.php';
// Xóa tất cả sản phẩm trong giỏ hàng
$sqlDeleteAll = "DELETE  FROM giohang";
$resultDeleteAll = mysqli_query($con, $sqlDeleteAll);
// Đóng kết nối
mysqli_close($con);
// Chuyển hướng trở lại trang giỏ hàng
header("Location: ./cart.php");
exit();
?>