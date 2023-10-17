<?php
session_start();
require_once './connectdb.php';

// id] => SP002 [price] => 19990000 [color] => 1 [qty] => 2 )
// print_r($_SESSION);
// lấy thông tin sản phẩm từ bảng giỏ hàng
$sql = "SELECT * FROM giohang";
$cart = mysqli_query($con, $sql);
$cart1 = mysqli_query($con, $sql);
unset($_SESSION['cart']);
// lấy thông tin sản phẩm từ bảng sản phẩm
$_SESSION['cart'] = array();
$i = 0;
while ($row = mysqli_fetch_assoc($cart)) {
    $sql_product = "SELECT * FROM products WHERE id = '{$row['idsanpham']}'";
    $product = mysqli_query($con, $sql_product);
    $row_product = mysqli_fetch_assoc($product);
    $_SESSION['cart'][$i]['id'] = $row_product['id'];
    $_SESSION['cart'][$i]['price'] = $row_product['price'];
    $_SESSION['cart'][$i]['color'] = $row['mausac'];
    $_SESSION['cart'][$i]['qty'] = $row['soluong'];
    $i++;
}
// echo "<pre>";
// print_r($_SESSION['cart']);
// echo "</pre>";

// xử lí khi mua ngay

// $sql_color =  "SELECT * FROM color WHERE id = '{$_SESSION['product_order']['color']}'";
// $data_color = mysqli_query($con, $sql_color);
// $row_color = mysqli_fetch_assoc($data_color);
// $sql = "SELECT * FROM products WHERE id = '{$_SESSION['product_order']['id']}'";
// $product = $con->query($sql);
if (isset($_POST['btn_buy_now'])) {
    echo "sda";
    $product_id = $_SESSION['product_order']['id'];
    // lấy dữ liệu thêm vào db
    $id_random = uniqid(time() . $_SERVER['REMOTE_ADDR'], true);
    $id = 'DH' . substr($id_random, 7, 17);
    $name = $_POST['fullname'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    // $price = $_SESSION['product_order']['price'];
    // $color = $_SESSION['product_order']['color'];
    // $qty = $_SESSION['product_order']['qty'];
    $status = 'Chờ xác nhận';
    $sql_orders = "INSERT INTO orders (id, name, phone_number, address, status) VALUES ('$id', '$name', '$phone_number', '$address', '$status')";
    $kq = mysqli_query($con, $sql_orders);
    if ($kq) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $sql_order_details = "INSERT INTO orders_detail (order_id, product_id, color, price, qty) VALUES ('$id', '{$value['id']}', '{$value['color']}', '{$value['price']}', '{$value['qty']}')";
            $kq = mysqli_query($con, $sql_order_details);
            if ($kq) {
                // cập nhật số luọng sản Phẩm
                $sql = "SELECT * FROM products WHERE id = '{$value['id']}'";
                $data = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($data);
                $qty = $row['qty'] - $value['qty'];
                $sql_update = "UPDATE products SET qty = '$qty' WHERE id = '{$value['id']}'";
                $kq = mysqli_query($con, $sql_update);
                unset($_SESSION['product_order']);
                // xoá dữ liệu trong giỏ hàng
                $sql_delete = "DELETE FROM giohang WHERE idsanpham = '{$value['id']}'";
                $kq = mysqli_query($con, $sql_delete);
            } else {
                echo "Lỗi: " . mysqli_error($con);
            }
        }
        if ($kq) {
            echo "<script> alert('Mua hàng thành công')</script>";
            // chuyển hướng về trang chủ
            echo "<script>window.location.href='./index.php'</script>";
        }
    } else {
        echo "Lỗi: " . mysqli_error($con);
    }
    // if ($kq) {
    //     $sql_order_details = "INSERT INTO orders_detail (order_id, product_id, color, price, qty) VALUES ('$id', '$product_id', '$color', '$price', '$qty')";
    //     $kq = mysqli_query($con, $sql_order_details);
    //     if ($kq) {
    //         // cập nhật số luọng sản Phẩm
    //         $sql = "SELECT * FROM products WHERE id = '$product_id'";
    //         $data = mysqli_query($con, $sql);
    //         $row = mysqli_fetch_assoc($data);
    //         $qty = $row['qty'] - $qty;
    //         $sql_update = "UPDATE products SET qty = '$qty' WHERE id = '$product_id'";
    //         $kq = mysqli_query($con, $sql_update);
    //         echo "<script> alert('Mua hàng thành công')</script>";
    //     } else {
    //         echo "Lỗi: " . mysqli_error($con);
    //     }
    // } else {
    //     echo "Lỗi: " . mysqli_error($con);
    // }
    // cập nhật số luọng sản Phẩm

}

?>
<?php include_once './h1.php' ?>
<div class="info">
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 30px;">
            <h1 class="text-center">Thông tin đơn hàng</h1>
        </div>
    </div>
    <div class="container" style="display: flex; justify-content: space-between;">
        <div class="row col-3">

            <form action="" method="POST">
                <div class="mb-3 mt-3">
                    <label for="fullname" class="form-label">Họ và tên:</label>
                    <input type="text" class="form-control" id="fullname" placeholder="Nhập họ tên" name="fullname">
                </div>
                <div class="mb-3 mt-3">
                    <label for="phone_number" class="form-label">Số điện thoại:</label>
                    <input type="text" class="form-control" id="phone_number" placeholder="Nhập số điện thoại" name="phone_number">
                </div>
                <div class="mb-3 mt-3">
                    <label for="address" class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" name="address">
                </div>
                <input type="submit" value="Đặt hàng" class="btn btn-primary" name="btn_buy_now">
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </form>
        </div>
        <div class="row col-9">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Màu sắc</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $t = 1;
                    while ($row = mysqli_fetch_assoc($cart1)) {
                        $sql_product = "SELECT * FROM products WHERE id = '{$row['idsanpham']}'";
                        $product = mysqli_query($con, $sql_product);
                        $color_id = $row['mausac'];
                        $sql_color = "SELECT * FROM color WHERE id = '$color_id'";
                        $data_color = mysqli_query($con, $sql_color);
                        $row_color = mysqli_fetch_assoc($data_color);

                        $row_product = mysqli_fetch_assoc($product);
                    ?>
                        <tr>
                            <th scope="row"><?= $t++ ?></th>
                            <td><img src="<?= $row_product['img'] ?>" alt="" width="100px"></td>
                            <td><?= $row_product['name'] ?></td>
                            <td><?= $row_color['name'] ?></td>
                            <td><?= $row['soluong'] ?></td>
                            <td><?= number_format($row_product['price'], 0, ",", ".") ?></td>
                            <td><?= number_format($row['soluong'] * $row_product['price'], 0, ",", ".") ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div style="margin-bottom: 100px;">

</div>
<?php include_once './footer.php' ?>
</body>

</html>