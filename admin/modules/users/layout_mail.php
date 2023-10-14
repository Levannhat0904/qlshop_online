<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body style="width: 500px; box-sizing: border-box;margin: 40px auto;">
  <div style=" margin: auto; height: auto; background-color: azure;padding: 10px;">
    <h1 style="text-align: center;">Lấy lại mật khẩu trên website bán hàng online</h1>
    <div>Chào bạn</div>
    <!-- <div>Tên đăng nhập</div> -->
    <div style="word-wrap: break-word;">
      Chào <?php echo $username; ?>,
      Tên đăng nhập: <?php echo $username; ?>
      chúng tôi vừa nhận được một yêu cầu lấy lại mật khẩu trên tài khoản của bạn. Để thiết lập lại mật khẩu bạn vui
      lòng click vào đây:
      <a href="<?php echo $url; ?>">resetpass</a>
      Nếu không phải yêu cầu của bạn, hãy bỏ qua email này.
      Team support Unitop.vn
    </div>
  </div>
</body>

</html>