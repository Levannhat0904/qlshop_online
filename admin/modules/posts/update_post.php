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
    if($kq) {
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
    <link rel="stylesheet" href="css/css_bootstrap.min.css">
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
    <form action="" method="POST">
        <table width="800" border="2" cellspacing="0" cellpadding="5" align="center">
            <tr>
                <td colspan="4" align="center" style="background-color: grey;">
                    <h2><b>Cập nhật bài viết</b></h2>
                </td>
            </tr>
            <tr>
                <th class="col1">Tiêu đề </td>
                <td style="padding-left:10px">
                    <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>">
                </td>
                <input class="form-control" type="hidden" name="id" value="<?php echo $row['id']; ?>">
            </tr>
            <tr>
                <th class="col1">Content </td>
                <td style="padding-left:10px">
                    <textarea name="content" id="content" placeholder="Đây là nội dung..." rows="10" cols="80"><?php echo $row['content']; ?></textarea>
                </td>
            </tr>
            <tr>
                <th class="col1">Ảnh </td>
                <td style="padding-left:10px"><input type="hidden" name="size" value="1000000">

                    <input type="file" name="img"><br /><br />
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" class="btn btn-primary" name="btnSave" value="Lưu"> &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" class="btn btn-primary" name="btnBack" value="Back">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>