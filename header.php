<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<style type="text/css">
		*{margin: 0;}	
		.wrapper{
			margin: 0px auto;
			background: #DBDBDB;
			font-size: 14px;
			line-height: 1.5 line;
		}
		header{
			height: 100px;
			background: 	#3282F6; ;		
		}
		h1{text-align: center;}
		.nav-menu ul{
			height: 40px;
			background: #93D0E0;
		}
		a{
			text-decoration: none; 
			color:#f3f1f0;}
		.nav-menu>ul>li{
			float: left;
			list-style: none;
			padding: 10px 60px;
			
		} 
		.nav-menu>ul>li:hover{
			display: block;
			background: #939393;
		}
		.article{
			width: 20%;
			background-color: #3282F6;
			float: left;
			height: 400px;
		}
		.article>ul{padding: 0px;}
		.article>ul>li>{
			list-style: none;
			padding: 10px 5px;
			border: #B1B1B1 dotted 1px;	
		}
		.article>ul>li>a{
			list-style: none;
			padding: 10px 5px;
			text-decoration: none;
			color: #f3f1f0;	
		}
		.article>ul>li:hover{
			display: block;
			background: #939393;	
		}
		table{width: 80%;padding-top: 20px;
		}
		.col1{
			width: 20%;
			text-align: left;
			height: 25px;
			padding: 5px 35px;
		}
		.col2{
			width: 55%;
			text-align: left;
			height: 25px;
			padding: 5px;
		}
		.aside{
			height: 400px;
			background-color: #f3f1f0;   
		}
		footer{
			height: 70px;
			background: #4f3590;
		}
		.dd1{
			width: 300px;
			height: 20px;
		} 
		
	</style>
	<link rel="stylesheet" href="./Css/css_bootstrap.min.css" >
	<!-- <base href="http://localhost/qlshop_online/phone.php" target="_self"> -->
	<base href="http://localhost:8088/nhom1/" target="_self">
	
</head>

<body>
	<div class="wrapper">
		<header>
			<img src="./picture/logo.png" width="200px" height="100px">	
		</header>
		<nav class="nav-menu">
			<ul >
				<li><a href="phone.php" target="_self">Trang chủ</a></li>
				<li><a href="" target="_self">Sản phẩm</a></li>
				<li><a href="" target="_self">Blog</a></li>
				<li><a href="" target="_self">Liên hệ</a></li>
				<li><a href="./cart.php" target="_self"><img src="./picture/shopping-cart.png" width="19px" height="19px"/></a></li>
				<li><a href="./dangnhap.php" target="_self">Đăng nhập</a></li>
				<li><a href="./dangxuat.php" target="_self">Đăng xuất</a></li>
			</ul>
		</nav>
		<div class="article">
			<ul>
				<li ><a href="phone.php" target="_self">Điện thoại</a>
				<ul >
					<li><a href="">Oppo</a></li>
					<li><a href="">SamSung</a></li>
					<li><a href="">Iphone</a></li>
				</ul>
				</li>
				<li><a href="laptop.php"target="_self">Laptop</a>
				<ul>
					<li><a href="">Dell</a></li>
					<li><a href="">Acer</a></li>
					<li><a href="">ASUS</a></li>
					<li><a href="">MacBook</a></li>
				</ul>
			</li>
				<li><a href="" target="_self">Máy tính bảng</a></li>
				<li><a href=""target="_self">Phụ kiện</a></li>
			</ul>
		</div>	
	</div>
</body>
</html>