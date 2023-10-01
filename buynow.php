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

</html>