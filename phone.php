<?php
//Kết nối database
$con=mysqli_connect('localhost','root','','test2') or die('Lỗi kết nối');
//Thực hiện truy vấn
$sql="SELECT * FROM products";
$data=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone</title>
        <link rel="stylesheet" href="/css/css_bootstrap.min.css">
</head>
<body>
    <form action=""method="POST">
        <?php include_once'./menu.php'?>
         <table>
            <?php  
        if(isset($data)&& $data!=null){
            $i=0;
            while($row=mysqli_fetch_array($data)){
         ?>
         <tr align="center">
            <td><img class="card-img-top" src="<?php echo $row['img'] ?>" width="200x" height="200x" name="img" ></td>
            <tr><td ><?php echo $row['name'] ?></td></tr><input type="hidden" name="name" value="<?php echo $row['name']?>">
            <tr><td><?php echo $row['price'] ?></td></tr><input type="hidden" name="price" value="<?php echo $row['price']?>">
            <tr><td> <input type="hidden" name="id" value="<?php echo $row['id']?>"></td></tr>
            <input type="hidden" >
            <td> 
                <a  href="./addcart.php?id=<?php echo $row['id'] ?>&&name=<?php echo $row['name']?>&&price=<?php echo $row['price']?>">Thêm giỏ hàng</a>&nbsp;&nbsp;
                <input class="btn btn-primary" type="submit" value="Mua ngay" name="buy">   
            </td>
         </tr>
        <?php 
            }
        }
        ?>
        </table> 
    </form>
</body>
</html>
