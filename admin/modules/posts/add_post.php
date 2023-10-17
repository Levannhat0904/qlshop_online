<?php
require('connectdtb.php');

if (isset($_POST['btnAdd'])) {
    //$id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $img = basename($_FILES['img']['name']);
    $target_dir = "uploads/";
    $target_file = $target_dir . $img;
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
    $tim = "SELECT * FROM post WHERE id ='$id'";
    $data = mysqli_query($con, $tim);
            $sql = "INSERT INTO post(content,title,image_path) VAlUES ('$content','$title','$target_file')";
            $kq = mysqli_query($con, $sql);
            if ($kq) {
                echo "<script> alert('Thêm bài viết thành công')</script>";
                header("location: index.php");
                exit;
            } else
                echo "<script> alert('Thêm mới thất bại')</script>";
        }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bài viết</title>
    <link rel="stylesheet" href="./css/css_bootstrap.min.css">
    <link rel="stylesheet" href="./css/ds.css">
    <style>
        .col1 {
			width: 15%;
			text-align: left;
			height: 25px;
			padding: 5px 35px;
		}
    </style>
</head>

<body>
<div class="container">
        <h2>Thêm bài viết</h2>
        <form action="" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="content">Nội dung:</label>
                <textarea class="form-control" id="content" name="content" rows="10" cols="80"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Ảnh:</label>
                <td style="padding-left:10px">
                    <input type="hidden" name="size" value="1000000">
                    <input type="file" name="img" ><br><br>
                </td>
            </div>
            <button type="submit" class="btn btn-primary" name="btnAdd">Thêm</button>
            <a href="index.php" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>

</html>