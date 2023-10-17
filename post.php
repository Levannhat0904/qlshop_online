<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tin tức</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <?php
  include_once './h1.php';
  require('connectdb.php');
  // Lấy danh sách bài viết từ cơ sở dữ liệu
  $sql = "SELECT * FROM post";
  $result = mysqli_query($con, $sql);

  // Đóng kết nối
  mysqli_close($con);
  ?>

  <div class="container"> 
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <div class="news-card">
        <a href="" style="float: left;">
          <img width="150px" height="150px" src="<?php echo $row['image_path']; ?>" alt="Ảnh">
        </a>
        <a href="./detail_post.php?id=<?php echo $row['id'] ?>" class="post-title">
          <h2><?php echo $row['title']; ?> </h2>
        </a>
      </div>
    <?php endwhile; ?>
  </div>
</body>

</html>
