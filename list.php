<!-- Hiển thị sản phẩm sau khi lọc -->
<?php
//Kết nối database
require_once './connectdb.php';
//Phân trang
$item_per_page=!empty($_GET['per_page'])?$_GET['per_page']:15;
$current_page=!empty($_GET['page'])?$_GET['page']:1;
$offset=($current_page-1)*$item_per_page;
$sql = "SELECT * FROM products ORDER BY 'id' desc limit ".$item_per_page." offset ".$offset." ";
$tongsp=mysqli_query($con,"SELECT * FROM products");
$tongsp=$tongsp->num_rows;
$sotrang=ceil($tongsp/$item_per_page);
$data = mysqli_query($con, $sql);
// $data1 = mysqli_query($con, $sql);
//tìm kiếm
// $sql="SELECT * FROM products";
// $data=mysqli_query($con,$sql);
if(isset($_POST['btnTim']))
{
    $tensanpham=$_POST['txt_sp'];
    $sqltk="SELECT * FROM products WHERE name LIKE '%$tensanpham%'";
    $data=mysqli_query($con,$sqltk);
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
            <a href="./index.php"><img class="header__logo-img" src="./picture/logo.png" alt="" ></a>  
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
                    $listcat='SELECT * FROM cat_product' ;
                    $result=mysqli_query($con,$listcat);
                    while($row=mysqli_fetch_array($result)){ 
                        ?>   
                        <ul class="category-list">
                    <li class="category-item">
                        <form action="" method="post">
                            <a href="list.php?id=<?php echo $row['id']?>" class="category-item__link"><?php echo $row['cat_item']?></a>
                        </form>    
                    </li>
                        </ul>
                    <?php 
                    }
                    ?>
                </nav>
                </div>
                <!-- Hiển thị sản phẩm lên (lọc sản phẩm) -->
                <div class="grid__column-10">
                    <div class="home-product">
                        <div class="grid__row">
                            <?php
                            $selectpro= 'SELECT * from products where cat_product_id='.$_GET["id"];
                            $result=mysqli_query($con,$selectpro);
                            while($row= mysqli_fetch_array(($result))){
                                ?>
                             <div class="grid__column-2-4"> 
                            <a class="home-product-item" href="./product_detail.php?id=<?php echo $row['id'] ?>">
                            <form action="" method="POST" class="box">
                             <div class="home-product-item__img" style="background-image:url(<?= $row['img']; ?>);"></div>
                            <h4 class="home-product-item__name"><?= $row['name'] ?></h4>
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <input type="hidden" name="cat_product_id" value="<?= $row['cat_product_id']?>">
                            <div class="home-product-item__price"><?=number_format($row['price'],0,",",".")?>đ</div>  
                            </form>
                            </a> 
                            </div>  
                             <?php
                                }
                            ?>              
                </div>
                </div>
                <!-- Phân trang -->
                <ul class="pagination home-product__pagination">
                                <?php if($current_page>3){
                                    $first_page=1;?>
                                    <a href="?per_page=<?=$item_per_page?>&page=<?=$first_page?>" class="pagination-item__link">
                                    <i class="fa-solid fa-angles-left"></i>
                                </a>
                                <?php }
                                if($current_page>1){
                                    $prev_page=$current_page-1;
                                    ?>
                                    <a href="?per_page=<?=$item_per_page?>&page=<?=$prev_page?>" class="pagination-item__link">
                                    <i class="pagination-item__icon fas fa-angle-left"></i>
                                </a>
                                    <?php 
                                }
                                 ?>
                               <?php for($num=1;$num<=$sotrang;$num++){ ?>
                                <li class="pagination-item">
                                    <?php if($num !=$current_page){?>
                                    <?php if($num > $current_page-3&& $num<$current_page+3) {?>
                                    <a href="?per_page=<?=$item_per_page?>&page=<?=$num?>" class="pagination-item__link"><?=$num?></a>
                                    <?php } ?>
                                    <?php } else{  ?>
                                        <span style="background-color:#f53e2d;" class="current-page pagination-item__link "><?=$num?></span>
                                        <?php } ?>
                                </li>
                                <?php } ?>
                                <?php 
                                if($current_page<$sotrang-1){
                                    $next_page=$current_page+1;?>
                                    <a href="?per_page=<?=$item_per_page?>&page=<?=$next_page?>" class="pagination-item__link">
                                    <i class="pagination-item__icon fas fa-angle-right"></i>
                                </a>
                                    <?php }
                                 if($current_page<$sotrang-3){
                                    $end_page=$sotrang;?>
                                    <a href="?per_page=<?=$item_per_page?>&page=<?=$end_page?>" class="pagination-item__link">
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                                <?php } ?>
                            </ul>
                </div>
            </div>
            </div>   
        </div>
        <footer class="footer">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-2-4">
                    <h4 class="footer__heading">Thông tin liên hệ</h4>
                    <ul class="footer__list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Điện thoại: 03874848482</a>
                                </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Facebook:HFUUEUEU</a>
                                </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Zalo: 3034844949</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                    <h4 class="footer__heading">Giới thiệu</h4>
                    <ul class="footer__list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Shop bán hàng online</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Trung tâm trợ giúp</a>
                                </li>
                            <li class="footer-item">   
                                <a href="" class="footer-item__link">Trung tâm trợ giúp</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                    <h4 class="footer__heading">Thông tin bản quyền</h4>
                    <ul class="footer__list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Thuộc công ty asd</a>
                                </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Trung tâm trợ giúp</a>
                                </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Trung tâm trợ giúp</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                    <h4 class="footer__heading">Danh mục</h4>
                    <ul class="footer__list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Điện thoại</a>
                                </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Laptop</a>
                                </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Phụ kiện khác</a>
                            </li>
                        </ul>
                    </div>
                </div>
               </div>
                <div class="footer__bottom">
                     <div class="grid">
                    <p class="footer__text">2023 - Bản quyền thuộc Công ty</p>
                </div>
                </div>
        </footer>
    </div>  
    </form>
    
</body>
</html>

