<?php 
function get_header($path=""){
    $path =!empty($path) ? 'inc/'.$path : "inc/header.php";
    // echo $path;
    if(file_exists($path)){
        require $path;
    }else{
        require "inc/404.php";
    }
}

function get_sidebar($path=""){
    $path =!empty($path) ? $path : "inc/sidebar.php";
    if(file_exists($path)){
        require $path;
    }else{
        require "inc/404.php";
    }
}
function get_footer($path=""){
    $path =!empty($path) ? $path : "inc/footer.php";
    if(file_exists($path)){
        require $path;
    }else{
        require "inc/404.php";
    }
}
?>