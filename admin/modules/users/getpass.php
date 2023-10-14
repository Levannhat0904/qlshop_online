<?php
if (isset($_POST['btn_getpass'])) {
    $email = $_POST['email'];
    // echo $email;
}
?>
<div class="form-container">
    <form action="?mod=users&act=mail_getpass" method="post">
        <h3>Lấy lại mật khẩu</h3>
        <span>Hệ thống sẽ gửi hướng dẫn thiết lập lại mật khẩu vào email của bạn!</span>
        <input type="email" name="email" required placeholder="enter your email">
        <input class="form-btn" type="submit" value="Gửi xác nhận" name="btn_getpass">
        <p>Bạn chưa có tài khoản? <a href="?mod=users&act=reg">Đăng ký</a></p>
        <p><a href="?mod=users&act=login"> Đăng nhập</a></p>
    </form>
</div>
</body>

</html>