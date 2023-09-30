<?php

require "lib/db.php";
session_start();
require "lib/template.php";
//goi header
$_SESSION['user_id'] = 1;
get_header();
get_sidebar();
?>
<!-- xử lý nội dung -->
<?php
// insert_db('users', ['name' => 'nhatlư', 'email' => 'hi@gmail.com', 'password' => '123456']);
// // global $last_id;
// echo $last_id;
//goi nội dung
$mod = !empty($_GET['mod']) ? $_GET['mod'] : 'home';
$act = !empty($_GET['act']) ? $_GET['act'] : 'index';
$sql = "SELECT * FROM role_permission WHERE user_id = {$_SESSION['user_id']} ";
$list_per = mysqli_query($conn, $sql);
$list_mod = array();
while ($row = $list_per->fetch_assoc()) {
    //  $row['permission_id']; lấy được quyền
    $sql_name = "SELECT name FROM permissions WHERE id = {$row['permission_id']}";
    $name = mysqli_query($conn, $sql_name);
    $name_per = $name->fetch_assoc(); //lây ra tên quyền
    $mod_name = explode('-', $name_per['name']); //lấy ra tên module
    $list_mod[] = $mod_name[0];
}
// print_r($list_mod);
// echo $mod;
if (in_array($mod, $list_mod)|| in_array("admin", $list_mod)) {
    $path = "modules/{$mod}/{$act}.php";
    if (file_exists($path)) {
        include $path;
    } else {
        echo "Trang không tồn tại";
        // include "inc/404.php";
        // include $path;
    }
} else {
    echo "bạn khong được quyền truy cập";
    // include "inc/404.php";
    // include $path;
}
// $path = "modules/{$mod}/{$act}.php";
// if (file_exists($path)) {
//     include $path;
// } else {
//     echo "bạn khong được quyền truy cập";
//     // include "inc/404.php";
//     // include $path;
// }



?>
<?php
//goi footer
?>