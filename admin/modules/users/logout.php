<?php

// $conn = mysqli_connect('localhost','root','','qlshop_online');

// session_start();
// session_unset();
// session_destroy();
unset($_SESSION['user_id']);
echo "<script>window.location.href = '';</script>";


?>