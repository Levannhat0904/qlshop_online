<?php

$conn = mysqli_connect('localhost','root','','test2');

session_start();
session_unset();
session_destroy();

header('location:dangnhap.php');

?>