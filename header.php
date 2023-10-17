<?php
//Kết nối database
require_once './connectdb.php';
//Phân trang
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $item_per_page;
$sql = "SELECT * FROM products ORDER BY 'id' ASC limit " . $item_per_page . " offset " . $offset . " ";
$tongsp = mysqli_query($con, "SELECT * FROM products");
$tongsp = $tongsp->num_rows;
$sotrang = ceil($tongsp / $item_per_page);
$data = mysqli_query($con, $sql);
// $data2 = mysqli_query($con, $sql);
//tìm kiếm
// $sql1="SELECT * FROM products  ";
// $data3=mysqli_query($con,$sql1);
if (isset($_POST['btnTim'])) {
    $tensanpham = $_POST['txt_sp'];
    $sqltk = "SELECT * FROM products WHERE name LIKE '%$tensanpham%'";
    $data = mysqli_query($con, $sqltk);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/bases.css">
    <link rel="stylesheet" href="./assets/css/theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.min.css">
</head>

<body>
    <form action="" method="post">
        <div class="app">
            <header class="header">
                <div class="grid">
                    <nav class="header__navbar">
                        <ul class="header__navbar-list">
                        </ul>
                        <ul class="header__navbar-list">
                            <li class="header__navbar-item">
                                <a href="./post.php" class="header__navbar-item-link">Blog</a>
                            </li>
                            <li class="header__navbar-item"><a href="" class="header__navbar-item-link">Trợ giúp</a></li>
                            <li class="header__navbar-item header__navbar-item--strong ">Đăng ký</li>
                            <li class="header__navbar-item header__navbar-item--strong">Đăng nhập</li>
                        </ul>
                    </nav>
                    <div class="header-with-search">
                        <div class="header__logo">
                            <form action="./index.php" method="post">
                                <a href="#"><img class="header__logo-img" src="./picture/logo.png" alt=""></a>
                            </form>
                        </div>
                        <!-- Tìm kiếm sản phẩm -->
                        <div class="header__search">
                            <form class="header__search" action="" method="post">
                                <input type="text" class="header__search-input" placeholder="Tìm kiếm sản phẩm" name="txt_sp">
                                <input type="submit" value="Tìm" name="btnTim" class="header__search-btn">
                            </form>
                        </div>
                        <div class="header__cart">
                            <a href="./cart.php"><i class="header__cart-icon fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>
                </div>
            </header>
            <div class="app__container">
                <div class="grid">
                    <div class="grid__row app__content">
                        <div class="grid__column-2">
                            <nav class="category">
                                <!-- hiển thị list danh mục -->
                                <h4 class="category__heading"> Danh mục</h4>
                                <?php
                                $listcat = 'SELECT * FROM cat_product';
                                $result = mysqli_query($con, $listcat);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <ul class="category-list">
                                        <li class="category-item">
                                            <form action="" method="post">
                                                <a href="list.php?id=<?php echo $row['id'] ?>" class="category-item__link"><?php echo $row['cat_item'] ?></a>
                                            </form>
                                        </li>
                                    </ul>
                                <?php
                                }
                                ?>
                            </nav>
                        </div>
                        <!-- Hiển thị sản phẩm lên -->
                        <div class="grid__column-10">