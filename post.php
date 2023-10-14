<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tin tức</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<<<<<<< HEAD
    <?php
    include_once './h1.php';
    require('connectdb.php');
=======
  <?php
  include_once './menu.php';
  require('connectdb.php');
>>>>>>> aab8ff60edbc651bbce00dacc3f623e6988b9f2a

  // Lấy danh sách bài viết từ cơ sở dữ liệu
  $sql = "SELECT * FROM post";
  $result = mysqli_query($con, $sql);

  // Đóng kết nối
  mysqli_close($con);
  ?>
  <?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <div class="container">
      <div class="news-card">
        <a href="" style="float: left;">
          <img width="280px" height="280px" src="<?php echo $row['image_path']; ?>" alt="Ảnh">&nbsp;&nbsp;
        </a>
          <a href="./detail_post.php?id=<?php echo $row['id'] ?>" class="post-title">
            <h2><?php echo $row['title']; ?> </h2>
          </a>
      </div>
    <?php endwhile; ?>
</body>

</html>