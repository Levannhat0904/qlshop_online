<?php
require('connectdtb.php');
// Truy vấn cơ sở dữ liệu để lấy danh sách bài viết
$sql = "SELECT * FROM post";
$data = mysqli_query($con, $sql);
if (isset($_GET['btnTim'])) {
    $id = $_GET['id'];
    $tim = "SELECT * FROM post WHERE id ='$id'";
    $data = mysqli_query($con, $tim);
}
// Đóng kết nối
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="./css/ds.css">
  
  <style>
    .content {
      max-height: 50px;
      overflow: hidden;
    }

    .show-more,
    .show-less {
      color: blue;
      cursor: pointer;
    }

    .show-less {
      display: none;
    }
  </style>
  <script>
    function showMore(element) {
      var content = element.previousElementSibling;
      var showLess = element.nextElementSibling;
      content.style.maxHeight = "none";
      element.style.display = "none";
      showLess.style.display = "inline";
    }

    function showLess(element) {
      var content = element.previousElementSibling.previousElementSibling;
      var showMore = element.previousElementSibling;
      content.style.maxHeight = "50px";
      element.style.display = "none";
      showMore.style.display = "inline";
    }
  </script>
</head>
<body>
 
<form method="GET" action="">
<div class="container">
    <a href="index.php" style="text-decoration: none;"><h1>Danh sách bài viết</h1></a>
    <div class="header__search">
               <form class="header__search" action="" method="post">
                <input type="text" class="header__search-input" placeholder="Tìm kiếm bài viết" name="id">
                <input type="submit"  value="Tìm kiếm" name="btnTim" class="header__search-btn">
                 </form> 
    </div>
    <div class="add-post">
      <a href="./add_post.php" class="btn btn-primary">
        <h3><b>Thêm bài viết</b></h3>
      </a>
    </div>
  <div class="container">
    <table border="1px" cellspacing="0">
      <thead>
        <tr>
          <th style="width :30px">ID</th>
          <th>Ảnh</th>
          <th>Tiêu đề</th>
          <th>Nội dung</th>
        </tr>
      </thead>
      <?php
        if (isset($data) && $data != null) {
            while ($row = mysqli_fetch_assoc($data)) {
        ?>
                <tr>
                    <td style="text-align: center;"><?php echo $row['id'] ?></td>
                    <td style="height: 280px; width: 280px">
                    <img src="<?php echo $row['image_path'] ?>" alt="Image" style="max-width: 100%; height: auto;">
                    </td>
                    <td style="width: 250px" align="center"><?php echo $row['title'] ?></td>
                    <td style="width: 500px" align="center">
                        <div class="content"><?php echo $row['content'] ?></div>
                        <span class="show-more" onclick="showMore(this)">Xem thêm</span>
                        <span class="show-less" onclick="showLess(this)">Rút gọn</span>
                    </td>
                    <td style="width: 80px">
                        <a href="./delete_post.php?id=<?php echo $row['id'] ?>">Xóa</a> &nbsp;&nbsp;
                        <a href="./update_post.php?id=<?php echo $row['id'] ?>">Sửa</a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
  </div>
</form>
</body>
</html>