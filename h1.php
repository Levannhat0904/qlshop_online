
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/bases.css">
    <link rel="stylesheet" href="./assets/css/theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.min.css">
</head>
<body>
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
            <div class="header__search">
               <input type="text" class="header__search-input" placeholder="Tìm kiếm sản phẩm" name="txt_sp">
               <button class="header__search-btn" name="">
                <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
               </button>
            </div>
            <div class="header__cart">
                <a href="./cart.php"><i class="header__cart-icon fa-solid fa-cart-shopping"></i></a>    
            </div>
           </div>
            </div>   
        </header>
</div>
</body>
</html>