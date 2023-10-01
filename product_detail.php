<?php
require_once './connectdb.php';
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
//xử lý thêm vào giỏ hàng
if(isset($_POST['btn_add_cart'])) {
    // Lấy thông tin từ form
    $productId = $_POST['id'];
    $productName = $row['name']; // Lấy tên sản phẩm từ biến $row 
    $quantity = $_POST['qty'];
    $price=$row['price'];
    $thanhtien=$price*$quantity;
    $selectedColor = $_POST['color'];// Biến lưu trữ tên màu sắc
    if($quantity==''){
        echo "<script>alert('Chưa nhập số lượng')</script>";
        echo "<script>document.getElementById('number').focus()</script>";
    }else{
        //Kiểm tra trùng mã id
    $sql1="SELECT * FROM giohang WHERE idsanpham='$productId'";
    $dt=mysqli_query($con,$sql1);
    if(mysqli_num_rows($dt)>0){
      $sql2 = "UPDATE giohang SET soluong = soluong + $quantity WHERE idsanpham = '$productId'";
       mysqli_query($con, $sql2);
       echo "<script>alert('Số lượng sản phẩm đã được cập nhật')</script>";
    }
    else
    {
       // tạo và thực hiện truy vấn
   $sql="INSERT INTO giohang(idsanpham,tensanpham,mausac,dongia,soluong,thanhtien) VALUES('$productId','$productName','$selectedColor','$price','$quantity','$thanhtien')";
   $kq=mysqli_query($con,$sql);
   if($kq)
     echo "<script>alert('Đã thêm vào giỏ hàng')</script>"; 
    }  
     echo "<script>window.location.href='./cart.php'</script>";
    }
    
   
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
    <?php include_once'./menu.php'?>
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
                        <input type="number" class="form-control" id="number" value="<?= $row['price'] ?>" readonly name="price">
                    </div>
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
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