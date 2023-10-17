<?php
// echo "hello world";
if (isset($_POST['dangnhap'])) {
    $email = mysqli_real_escape_string($conn, $_POST['txt_email']);
    $pass = mysqli_real_escape_string($conn, $_POST['txt_mk']);
    $select = "SELECT * from users where email='$email' && password='$pass'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result); {
            $_SESSION['user_id'] = $row['id'];
            echo $_SESSION['user_id'];
            // header('location:phone.php');
            echo "<script>window.location.reload();</script>";
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
        <input type="email" name="txt_email" required placeholder="enter your username">
        <input type="password" name="txt_mk" required placeholder="enter your password">
        <input class="form-btn" type="submit" value="Đăng nhập" name="dangnhap">
        <p>Bạn chưa có tài khoản? <a href="?mod=users&act=reg">Đăng ký</a></p>
        <p><a href="?mod=users&act=getpass"> Quên mật khẩu</a></p>
    </form>
</div>
</body>

</html>