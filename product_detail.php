<?php
require_once './connectdb.php';
session_start();
//Thực hiện truy vấn
$sql = "SELECT * FROM products WHERE id = '$_GET[id]'";
$data = mysqli_query($con, $sql);
$row = mysqli_fetch_array($data);
$sql_color = "SELECT color.* FROM products, color,product_color WHERE products.id = product_color.id_product_color AND color.id = product_color.color_id AND products.id = '$_GET[id]'";
$data_color = mysqli_query($con, $sql_color);
// xử lí khi mua ngay
if(isset($_POST['btn_buy'])){
    print_r($_POST);
    // tạo session
    $_SESSION['product_order']=array();
    $_SESSION['product_order']['id']=$_GET['id'];
    // $_SESSION['product_order']['name']=$_POST['name'];
    $_SESSION['product_order']['price']=$_POST['price'];
    $_SESSION['product_order']['color']=$_POST['color'];
    $_SESSION['product_order']['qty']=$_POST['qty'];
    header('location:./buynow.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chi Tiết Sản Phẩm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="product-detail mt-5">
        <div class="container" style="display: flex;">
            <div class="img">
                <div class="header">
                    <h3><?= $row['name'] ?></h3>
                </div>
                <div class="card" style="width:400px">
                    <img class="card-img-top" src="https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/v/n/vn_iphone_15_blue_pdp_image_position-1a_blue_color_1_4.jpg" alt="Card image" style="width:100%">
                </div>
            </div>
            <div class="detail col-6" style="margin-left: 30px;">
                <form action="" method="POST">
                    <div class="mb-3 mt-3">
                        <h3>Màu sắc</h3>
                        <?php
                        while ($row_color = mysqli_fetch_assoc($data_color)) {
                        ?>
                            <input type="radio" name="color" value="<?= $row_color['id'] ?>"> <?= $row_color['name'] ?>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="number">Số lượng</label>
                        <input type="number" class="form-control" id="number" min="1" placeholder="Nhập số lượng" name="qty">
                    </div>
                    <div class="mb-3">
                        <label for="number">Giá:</label>
                        <input type="number" class="form-control" id="number" value="<?= $row['price'] ?>" name="price">
                    </div>
                    <input type="submit" value="Đặt hàng" class="btn btn-primary" name="btn_buy">
                    <input type="submit" value="Thêm vào giỏ hàng" class="btn btn-primary" style="margin-left: 10px;" name="btn_add_cart">
                </form>
            </div>
        </div>
        <div class="container mt-5">
            <div class="content">
                <p><?= $row['detail'] ?></p>
            </div>
        </div>
    </div>
</body>

</html>