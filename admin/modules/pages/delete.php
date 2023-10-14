<?php
echo "jdhj"; 
if(isset($_GET['id'])){ 
    delete_db('pages','id',$_GET['id']);
    echo "<script>alert('xóa thành công')</script>";
    echo "<script>window.location.href='?mod=pages';</script>";
}
?>