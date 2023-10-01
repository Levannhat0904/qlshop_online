<?php
// require_once '/xampp/htdocs/qlshop_online/connectdb.php';

if (isset($_POST['btnAdd'])) {
    //$id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $img = $_POST['img'];
    $tim = "SELECT * FROM post WHERE id ='$id'";
    $data = mysqli_query($con, $tim);
            $sql = "INSERT INTO post(content,title,image_path) VAlUES ('$title','$content','$img')";
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
    <link ref="stylesheet" href="../css/css_bootstrap.min.css">
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
    <form action="" method="post" >
        <table width="800" border="2" cellspacing="0" cellpadding="5" align="center">
            <tr>
                <td colspan="4" align="center" style="background-color: grey;"><h2><b>Thêm bài viết</b></h2></td>
            </tr>
            <tr>
                <th class = "col1">Tiêu đề </td>
                <td style="padding-left:10px"><input type="text" class="form-control" name="title"  ></td>
            </tr>
            <tr>
                <th class = "col1">Content </td>
                <td style="padding-left:10px" ><textarea name="content" id="content" placeholder="Đây là nội dung..."  rows="10" cols="80"></textarea></td>
            </tr>
            <tr>
                <th class = "col1">Ảnh </td>
                <td style="padding-left:10px">
                    <input type="hidden" name="size" value="1000000">
                    <input type="file" name="img" ><br><br>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" class="btn btn-primary" name="btnAdd" value="Thêm">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>