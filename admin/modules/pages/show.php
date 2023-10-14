<?php 
$id=$_GET["id"];
$page =search_data('pages',$id,'id');
$page = $page->fetch_assoc();
echo $page['content'];
?>
