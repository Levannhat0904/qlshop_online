<?php 
    $idsanpham=$_GET['idsanpham'];
    //kết nối db
    require_once './connectdb.php';
    //thực hiện xóa
    $sql="DELETE FROM giohang WHERE idsanpham='$idsanpham'";
    $kq=mysqli_query($con,$sql);
    //Đóng kết nối
    mysqli_close($con);
    if($kq){
        echo "<script>alert('xóa thành công')</script>";
    }
    else
    {
        echo "<script>alert('Xóa thất bại')</script>";
    }
    //Gọi lại danh sách loại sách
    echo "<script>window.location.href='./cart.php'</script>";
?>