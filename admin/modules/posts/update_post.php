<?php
require_once '/xampp/htdocs/qlshop_online/connectdb.php';
$id = $_GET['id'];
//Tìm kiếm theo id
$sqltk = "SELECT * FROM post WHERE id='$id'";
$data = mysqli_query($con, $sqltk);
$row = mysqli_fetch_assoc($data);

//Xử lý Sửa dữ liệu
if (isset($_POST['btnSave'])) {
    //lấy dữ liệu trên các control của form
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $img = $_POST['img'];
    $sql = "UPDATE post SET content ='$content', title ='$title', image_path ='$img' WHERE id='$id'";
    $kq = mysqli_query($con, $sql);
    if ($kq) {
        echo "<script> alert('Sửa thành công')</script>";
        header("location: index.php");
        exit;
    } else {
        echo "<script> alert('Sửa thất bại')</script>";
    }
}

if (isset($_POST['btnBack'])) {
    header("location:index.php");
    exit;
}

//đóng kết nối  
mysqli_close($con);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa bài viết</title>
    <link rel="stylesheet" href="./css/css_bootstrap.min.css">
    <link rel="stylesheet" href="./css/ds.css">
    <style>
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group textarea {
      width: 100%;
      padding: 8px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group textarea {
      height: 150px;
    }

    .form-group input[type="submit"] {
      padding: 12px 24px;
      font-size: 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>

<body>
    <div class="container">
        <h2>Cập nhật bài viết</h2>
        <form method="POST" action="update_post.php">
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>">
            </div>
            <div class="form-group">
                <label for="content">Nội dung:</label>
                <textarea name="content" id="content" placeholder="Đây là nội dung..." rows="20" cols="80"><?php echo $row['content']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Ảnh:</label>
                <input type="text" name="img" value="<?php echo $row['image_path']; ?>">
                <br>
                <?php if (!empty($row['image_path'])) : ?>
                    <img src="<?php echo $row['image_path']; ?>" alt="Ảnh" style="max-width: 200px;">
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="btnSave" value="Lưu"> &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" class="btn btn-primary" name="btnBack" value="Back">
            </div>
        </form>
    </div>
    
</body>

</html>