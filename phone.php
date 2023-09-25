<?php
   session_start();
   if(!isset($_SESSION['giohang']))$_SESSION['giohang']=[];
   //lấy dữ liệu từ form
   if(isset($_POST['addcart'])&&($_POST['addcart'])){
            $idsanpham=$_POST['idsanpham'];
            $tensp=$_POST['tensp'];
            $gia=$_POST['gia'];
            $soluong=$_POST['soluong'];
            $sp=[$idsanpham,$tensp,$gia,$soluong];
            $_SESSION['giohang'][]=$sp;   
            var_dump($_SESSION['giohang']);     
   }
   function showgiohang(){
    if(isset($_SESSION['giohang'])&&is_array($_SESSION['giohang'])){
        for($i=0;$i<sizeof($_SESSION['giohang']);$i++){
            $tt=$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][3];
            echo'
            <tr>
            <td>'.($i+1).'</td>
            <td><img src="./picture/'.$_SESSION['giohang'][$i][0].'"></td>
            <td>'.$_SESSION['giohang'][$i][1].'</td>
            <td>'.$_SESSION['giohang'][$i][2].'</td>
            <td>'.$_SESSION['giohang'][$i][3].'</td>
             <td><div>'.$tt.'</div></td>
            </tr>';
             
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css_bootstrap.min.css" >
</head>
<body>
    <?php
    include_once './header.php' 
    ?>
    
         <table>
            <tr>
                <td>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./picture/img-pro-10.png" width="200px" height="200px" >
                <div class="card-body">
                <h5 class="card-title">Bphone 2017</h5>
                <p class="card-text">9.790.000</p>
                <form action="cart.php" method="POST">
                    <input type="number" name="soluong" min="1" max="10" value="1" >
                    <input type="hidden" name ="tensp" value="Bphone 2017">
                    <input type="hidden" name="gia" value="9.790.000">
                    <input type="hidden" name="idsanpham" value="img-pro-10.png">
                    <input class="btn btn-primary" type="submit" name="addcart" value="Thêm giỏ hàng">
                </form>
                </div>
                </div>
                </td>
                <td>
                <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./picture/img-pro-11.png" width="200px" height="200px" >
            <div class="card-body">
                <h5 class="card-title">Phone</h5>
                <p class="card-text">10.000.000</p>
                <form action="cart.php" method="POST">
                    <input type="number" name="soluong" min="1" max="10" value="1" >
                    <input type="hidden" name ="tensp" value="Smart Phone">
                    <input type="hidden" name="gia" value="10.000.000">
                    <input type="hidden" name="idsanpham" value="img-pro-11.png">
                    <input class="btn btn-primary" type="submit" name="addcart" value="Thêm giỏ hàng">
                </form>
            </div>
            </div>
                </td>
                <td>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./picture/img-pro-12.png" width="200px" height="200px"  >
                <div class="card-body">
                <h5 class="card-title">Phone</h5>
                <p class="card-text">10.000.000</p>
                <form action="cart.php" method="POST">
                    <input type="number" name="soluong" min="1" max="10" value="1" >
                    <input type="hidden" name ="tensp" value="Phone">
                    <input type="hidden" name="gia" value="10.790.000">
                    <input type="hidden" name="idsanpham" value="img-pro-10.png">
                    <input class="btn btn-primary" type="submit" name="addcart" value="Thêm giỏ hàng">
                </form>
            </div>
            </div>   
            </td>
            </tr>
            <tr> 
                <td>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./picture/img-pro-13.png" width="200px" height="200px"  >
                <div class="card-body">
                <h5 class="card-title">Phone</h5>
                <p class="card-text">10.000.000</p>
                <form action="cart.php" method="POST">
                    <input type="number" name="soluong" min="1" max="10" value="1" >
                    <input type="hidden" name ="tensp" value="Bphone 2017">
                    <input type="hidden" name="gia" value="9.790.000">
                    <input type="hidden" name="idsanpham" value="img-pro-10.png">
                    <input class="btn btn-primary" type="submit" name="addcart" value="Thêm giỏ hàng">
                </form>
                </div>
                </div>
                </td>
                <td>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./picture/img-pro-13.png" width="200px" height="200px"  >
                <div class="card-body">
                <h5 class="card-title">Phone</h5>
                <p class="card-text">10.000.000</p>
                <form action="cart.php" method="POST">
                    <input type="number" name="soluong" min="1" max="10" value="1" >
                    <input type="hidden" name ="tensp" value="Bphone 2017">
                    <input type="hidden" name="gia" value="9.790.000">
                    <input type="hidden" name="idsanpham" value="img-pro-10.png">
                    <input class="btn btn-primary" type="submit" name="addcart" value="Thêm giỏ hàng">
                </form>
                </div>
                </div>
                </td>
                <td>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./picture/img-pro-13.png" width="200px" height="200px"  >
                <div class="card-body">
                <h5 class="card-title">Phone</h5>
                <p class="card-text">10.000.000</p>
                <form action="cart.php" method="POST">
                    <input type="number" name="soluong" min="1" max="10" value="1" >
                    <input type="hidden" name ="tensp" value="Bphone 2017">
                    <input type="hidden" name="gia" value="9.790.000">
                    <input type="hidden" name="idsanpham" value="img-pro-10.png">
                    <input class="btn btn-primary" type="submit" name="addcart" value="Thêm giỏ hàng">
                </form>
                </div>
                </div>
                </td>
            </tr>
            <tr>
            <td>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./picture/img-pro-13.png" width="200px" height="200px"  >
                <div class="card-body">
                <h5 class="card-title">Phone</h5>
                <p class="card-text">10.000.000</p>
                <form action="cart.php" method="POST">
                    <input type="number" name="soluong" min="1" max="10" value="1" >
                    <input type="hidden" name ="tensp" value="Bphone 2017">
                    <input type="hidden" name="gia" value="9.790.000">
                    <input type="hidden" name="idsanpham" value="img-pro-10.png">
                    <input class="btn btn-primary" type="submit" name="addcart" value="Thêm giỏ hàng">
                </form>
                </div>
                </div>
                </td>
                <td>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./picture/img-pro-13.png" width="200px" height="200px"  >
                <div class="card-body">
                <h5 class="card-title">Phone</h5>
                <p class="card-text">10.000.000</p>
                <form action="cart.php" method="POST">
                    <input type="number" name="soluong" min="1" max="10" value="1" >
                    <input type="hidden" name ="tensp" value="Bphone 2017">
                    <input type="hidden" name="gia" value="9.790.000">
                    <input type="hidden" name="idsanpham" value="img-pro-10.png">
                    <input class="btn btn-primary" type="submit" name="addcart" value="Thêm giỏ hàng">
                </form>
                </div>
                </div>
                </td>
                <td>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="./picture/img-pro-13.png" width="200px" height="200px"  >
                <div class="card-body">
                <h5 class="card-title">Phone</h5>
                <p class="card-text">10.000.000</p>
                <form action="cart.php" method="POST">
                    <input type="number" name="soluong" min="1" max="10" value="1" >
                    <input type="hidden" name ="tensp" value="Bphone 2017">
                    <input type="hidden" name="gia" value="9.790.000">
                    <input type="hidden" name="idsanpham" value="img-pro-10.png">
                    <input class="btn btn-primary" type="submit" name="addcart" value="Thêm giỏ hàng">
                </form>
                </div>
                </div>
                </td>
            </tr>
        </table>   
    <?php   
    include_once './footer.php' 
    ?>
</body>
</html>