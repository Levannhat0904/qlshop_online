<?php
require "lib/db.php";
session_start();
require "lib/template.php";
//goi header
get_header();
get_sidebar();
?>
<!-- xử lý nội dung -->
<?php

//goi nội dung
$mod = !empty($_GET['mod']) ? $_GET['mod'] : 'home';
$act = !empty($_GET['act']) ? $_GET['act'] : 'index';
$path = "modules/{$mod}/{$act}.php";

// test function db
// $data=[
//     'cat' =>'Đồng hồ đeo chân',
//     'slug'=>'cat.donghodeotay'
// ];
// insert_db('cats',$data,'id',9);
// delete_db('cats', 'id', 9);
// update_db('cats',$data,'id',8);
// search_data('cats',1,'id');
// $data=search_data('cats',1,'id');
// while ($row = $data->fetch_assoc()) {
//     // Xử lý dữ liệu 
//     echo "<pre>";
//     print_r($row);
//     echo "</pre>";
// }
// echo $path;
// ====>ok

if(file_exists($path)){
    include $path;
}else{
    // include "inc/404.php";
    include $path;

}

?>
<?php
//goi footer
?>