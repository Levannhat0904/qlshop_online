<?php   
require_once '/xampp/htdocs/qlshop_online/connectdb.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM post WHERE id ='$id'";
    $kq = mysqli_query($con,$sql);
    mysqli_close($con);
    if($kq)
            echo"<script> alert('Xóa thành công')</script>";
        else
            echo"<script> alert('Xóa thất bại')</script>";
            echo"<script> window.location.href='./index.php'</script>"
?>