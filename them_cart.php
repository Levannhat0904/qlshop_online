
<?php
session_start(); // Bắt đầu phiên làm việc
// Kiểm tra xem giỏ hàng đã được khởi tạo chưa, nếu chưa thì khởi tạo
if (!isset($_SESSION['addcart'])) {
    $_SESSION['addcart'] = array();
}
// Hàm thêm sản phẩm vào giỏ hàng
function addToCart($idsanpham, $soluong) {
    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    if (isset($_SESSION['addcart'][$idsanpham])) {
        // Nếu sản phẩm đã tồn tại, tăng số lượng lên
        $_SESSION['addcart'][$idsanpham] += $soluong;
    } else {
        // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
        $_SESSION['addcart'][$idsanpham] = $soluong;
    }
}
// Sử dụng hàm thêm sản phẩm vào giỏ hàng
$idsanpham = 1; // ID của sản phẩm cần thêm
$soluong = 2; // Số lượng sản phẩm
addToCart($idsanpham, $soluong);
?>