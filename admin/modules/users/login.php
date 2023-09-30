<?php
// session_start();
// $con=mysqli_connect('localhost','root','','test2');
if (isset($_POST['dangnhap'])) {
    $name = mysqli_real_escape_string($con, $_POST['txt_ten']);
    $pass = mysqli_real_escape_string($con, $_POST['txt_mk']);
    $select = "SELECT * from users where username='$name' && pass='$pass'";
    $result = mysqli_query($con, $select);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result); {
            $_SESSION['admin_name'] == $row['username'];
            header('location:phone.php');
        }
    } else {
        $error[] = 'Mật khẩu hoặc tên đăng nhập sai';
    }
}
if (isset($_POST['dangky'])) {
    header('location:dangky.php');
    exit;
}
?>
<div class="form-container">
    <form action="" method="post">
        <h3>Đăng nhập</h3>
        <?php
        if (isset($error)) {
            foreach ($error as $error) {
                echo '<span class="error-msg">' . $error . '</span>';
            };
        };
        ?>
        <input type="text" name="txt_ten" required placeholder="enter your username">
        <input type="password" name="txt_mk" required placeholder="enter your password">
        <input class="form-btn" type="submit" value="Đăng nhập" name="dangnhap">
        <p>Bạn chưa có tài khoản? <a href="?mod=users&act=reg">Đăng ký</a></p>
        <p><a href="?mod=users&act=getpass"> Quên mật khẩu</a></p>
    </form>
</div>
</body>

</html>