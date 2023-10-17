<?php
// lấy sản phẩm trong đơn hàng
$order = search_data('orders', $_GET['id'], 'id');
$list_product = search_data('orders_detail', $_GET['id'], 'order_id');
if (isset($_POST['btn_update'])) {
    $data = array(
        'status' => $_POST['status']
    );
    update_db('orders', $data, 'id', $_GET['id']);
    echo "<script>alert('Cập nhật thành công');</script>";
    echo "<script>window.location.href='?mod=orders'</script>";
}
?>
<div class="info" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 30px;">
            <h1 class="text-center">Thông tin chi tiết đơn hàng</h1>
        </div>
    </div>
    <div class="container" style="display: flex; justify-content: space-between;">
        <div class="col-3">
            <h4>Thông tin khách hàng</h4>
            <form action="" method="POST">
                <?php
                while ($user = $order->fetch_assoc()) {
                ?>
                    <div class="mb-3 mt-3">
                        <label for="fullname" class="form-label">Họ và tên:</label>
                        <input type="text" class="form-control" value="<?php echo $user['name'] ?>" id="fullname" placeholder="Nhập họ tên" name="fullname">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="phone_number" class="form-label">Số điện thoại:</label>
                        <input type="text" class="form-control" value="<?php echo $user['phone_number'] ?>" id="phone_number" placeholder="Nhập số điện thoại" name="phone_number">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="address" class="form-label">Địa chỉ:</label>
                        <textarea name="address" class="form-control" id="address" cols="20" rows="5"><?php echo $user['address'] ?></textarea>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="address" class="form-label">Tình trạng đơn hàng</label>
                        <select name="status" id="status" class="form-control">
                            <option <?php if ($user['status'] == "Đang xử lí") echo "selected" ?> value="Đang xử lí">Đang xử lí</option>
                            <option <?php if ($user['status'] == "Huỷ đơn hàng") echo "selected" ?> value="Huỷ đơn hàng">Huỷ đơn hàng</option>
                            <option <?php if ($user['status'] == "Đang giao hàng") echo "selected" ?> value="Đang giao hàng">Đang giao hàng</option>
                            <option <?php if ($user['status'] == "Hoàn thành") echo "selected" ?> value="Hoàn thành">Hoàn thành</option>
                        </select>
                    </div>
                <?php
                }
                ?>
                <input type="submit" value="Cập nhật" class="btn btn-primary" name="btn_update">
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </form>
        </div>
        <div class="col-9" style="margin-left: 20px;">

            <table class="table table-striped"">
                <thead>
                    <tr>
                        <th scope=" col">#</th>
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
                    while ($row = $list_product->fetch_assoc()) {
                        // echo "ds";
                        $product = search_data('products', $row['product_id'], 'id');
                        $product = $product->fetch_assoc();
                        // print_r($product);
                        $color = search_data('color', $row['color'], 'id');
                        $color = $color->fetch_assoc();
                        echo "<tr>";
                        echo "<th scope='row'>" . $t . "</th>";
                        echo "<td><img  style='max-width: 100px; max-height: 150px;' src='../" . $product['img'] . "' alt='Product Image'></td>";
                        echo "<td>" . $product['name'] . "</td>";
                        echo "<td>" . $color['name'] . "</td>";
                        echo "<td>" . $row['qty'] . "</td>";
                        // echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . number_format($row['price'], 0,  ".", ",") . "₫ </td>";

                        // echo "<td>" . $row['qty'] * $row['price'] . "</td>";
                        echo "<td>" . number_format($row['qty'] * $row['price'], 0,  ".", ",") . "₫ </td>";

                        echo "</tr>";
                        $t++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>