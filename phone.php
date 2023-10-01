<?php
//Kết nối database
// $con=mysqli_connect('localhost','root','','test2') or die('Lỗi kết nối');
require_once './connectdb.php';
//Thực hiện truy vấn
$sql = "SELECT * FROM products";
$data = mysqli_query($con, $sql);
$data1 = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

        <link rel="stylesheet" href="css/css_bootstrap.min.css">
        <link rel="stylesheet" href="./css/menu.css">
        <link rel="stylesheet" href="css/style2.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <style>
            a{
                text-decoration: none;
                color: black;
            }
        </style>
</head>
<body>
    <?php include_once './menu.php' ?>
    <section class="products">
        <h1 class="heading">Sản phẩm</h1>
        <div class="box-container">
            <?php
            if (isset($data) && $data != null) {
                $i = 0;
                while ($row = mysqli_fetch_array($data)) {
            ?>
                    <a href="./product_detail.php?id=<?php echo $row['id'] ?>">
                        <form action="" method="POST" class="box">
                            <img src="<?= $row['img']; ?>" class="image" alt="">
                            <h3 class="name"><?= $row['name'] ?></h3>
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <div class="flex">
                                <p class="price"><i class=""></i><?= $row['price'] ?></p>
                            </div>
                        </form>
                    </a>
            <?php
                }
            } else {
                echo '<p class="empty">no products found!</p>';
            }
            ?>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>