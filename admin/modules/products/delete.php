<?php 
$id = $_GET['id'];
if(delete_db('products','id',$id)){
    echo "<script> alert('Xóa thành công')</script>";
    echo "<script> window.location.href='?mod=products';</script>";
    exit;
}
?>