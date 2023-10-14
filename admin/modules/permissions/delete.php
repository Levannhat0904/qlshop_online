<?php 
$id =$_GET['id'];
delete_db('permissions','id',$id);
echo "<script>alert('xóa thành công')</script>";
echo "<script>window.location.href='?mod=permissions';</script>";
?>