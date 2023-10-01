<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $email = $_POST["email"];
    
    // Kiểm tra mật khẩu và xác nhận mật khẩu có khớp nhau không
    if ($password == $confirm_password) {
        if(md5($email)==$_GET['id']){
            update_db("users", array("password" => $password), "email", $email);
        }else {
            echo "<script>alert('Xác nhận email không khớp nhau')</script>";
        }
        // header("Location: ?mod=users&act=login");
        echo "<script>window.location=''</script>";
        // exit;
    } else {
        echo "<script>alert('Xác nhận mật khẩu hoặc email không khớp nhau')</script>";
    }
}
?>
<div class="form-container">
<form method="post" action="">
        <label for="email">email:</label>
        <input type="email" name="email" required>
        <br><br>
        <label for="password">Mật khẩu mới:</label>
        <input type="password" name="password" required>
        <br><br>
        <label for="confirm_password">Xác nhận mật khẩu:</label>
        <input type="password" name="confirm_password" required>
        <br><br>
        <input type="submit" style="background-color: beige; cursor: pointer;" name="submit" value="Tạo mật khẩu mới">
    </form>
</div>