<<<<<<< HEAD
<?php
require_once './connectdb.php';
if (isset($_POST['btn_buy'])) {
        // lấy dữ liệu thêm vào db
        $id = $_GET['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $color = $_POST['color'];
        $qty = $_POST['qty'];
        $sql = "INSERT INTO orders (id, name, price, color, qty) VALUES ('$id', '$name', '$price', '$color', '$qty')";
        $kq = mysqli_query($con, $sql);
        if ($kq) {
                
                header('location:./buynow.php?id='.$id.'&&name='.$name.'&&price='.$price.'&&color='.$color.'&&qty='.$qty);
        }
        else {
                echo "Lỗi: " . mysqli_error($con);
        }
        // cập nhật số luọng sản Phẩm
        // t đang làm, cấm xóa file này
        
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <base href="http://localhost:8088/nhom1/" target="_self">
        <title>Mua hàng</title>
</head>

<body>
        <div class="info">
                <div class="row">
                        <div class="col-md-12">
                                <h1 class="text-center">Thông tin đơn hàng</h1>
                        </div>
                </div>
                <div class="container" style="display: flex; justify-content: space-between;">
                        <div class="row col-5">

                                <form action="/action_page.php">
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
                                        <input type="submit" value="Đặt hàng" class="btn btn-primary" name="btn_buy">
                                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                </form>
                        </div>
                        <div class="row col-6">

                        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
                        </div>
                </div>
        </div>
</body>

=======
<?php
session_start();
require_once './connectdb.php';
$sql_color =  "SELECT * FROM color WHERE id = '{$_SESSION['product_order']['color']}'";
$data_color = mysqli_query($con, $sql_color);
$row_color = mysqli_fetch_assoc($data_color);
$sql = "SELECT * FROM products WHERE id = '{$_SESSION['product_order']['id']}'";
$product = $con->query($sql);
if (isset($_POST['btn_buy_now'])) {
        echo "sda";
        $product_id = $_SESSION['product_order']['id'];
        // lấy dữ liệu thêm vào db
        $id_random = uniqid(time() . $_SERVER['REMOTE_ADDR'], true);
        $id = 'DH' . substr($id_random, 7, 17);
        $name = $_POST['fullname'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $price = $_SESSION['product_order']['price'];
        $color = $_SESSION['product_order']['color'];
        $qty = $_SESSION['product_order']['qty'];
        $status = 'Chờ xác nhận';
        $sql_orders = "INSERT INTO orders (id, name, phone_number, address, status) VALUES ('$id', '$name', '$phone_number', '$address', '$status')";
        $kq = mysqli_query($con, $sql_orders);
        if ($kq) {
                $sql_order_details = "INSERT INTO orders_detail (order_id, product_id, color, price, qty) VALUES ('$id', '$product_id', '$color', '$price', '$qty')";
                $kq = mysqli_query($con, $sql_order_details);
                if ($kq) {
                        // cập nhật số luọng sản Phẩm
                        $sql = "SELECT * FROM products WHERE id = '$product_id'";
                        $data = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($data);
                        $qty = $row['qty'] - $qty;
                        $sql_update = "UPDATE products SET qty = '$qty' WHERE id = '$product_id'";
                        $kq = mysqli_query($con, $sql_update);
                        echo "<script> alert('Mua hàng thành công')</script>";
                } else {
                        echo "Lỗi: " . mysqli_error($con);
                }
        }else {
                echo "Lỗi: " . mysqli_error($con);
        }
        // cập nhật số luọng sản Phẩm

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <title>Mua hàng</title>
</head>

<body>
        <div class="info">
                <div class="row">
                        <div class="col-md-12">
                                <h1 class="text-center">Thông tin đơn hàng</h1>
                        </div>
                </div>
                <div class="container" style="display: flex; justify-content: space-between;">
                        <div class="row col-5">

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
                        <div class="row col-7">

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
                                                while ($row = mysqli_fetch_assoc($product)) {
                                                        echo "<tr>";
                                                        echo "<th scope='row'>" . $t . "</th>";
                                                        echo "<td><img  style='max-width: 120px; max-height: 150px;' src='" . $row['img'] . "' alt='Product Image'></td>";
                                                        echo "<td>" . $row['name'] . "</td>";
                                                        echo "<td>" . $row_color['name'] . "</td>";
                                                        echo "<td>" . $_SESSION['product_order']['qty'] . "</td>";
                                                        echo "<td>" . $_SESSION['product_order']['price'] . "</td>";
                                                        echo "<td>" . $_SESSION['product_order']['qty'] * $_SESSION['product_order']['price'] . "</td>";
                                                        echo "</tr>";
                                                        $t++;
                                                }
                                                ?>
                                        </tbody>
                                </table>
                        </div>
                </div>
        </div>
</body>

>>>>>>> 445d6c8898c45d7be0a96f235caa18f2fbdf61d5
</html>