<?php
require_once '/xampp/htdocs/qlshop_online/connectdb.php';
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
    <title>Document</title>
    <link rel="stylesheet" href="./css/css_bootstrap.min.css">
</head>

<body>
    <form method="GET" action="">
        <table>
            <td height="40px">
                <fieldset style="border: 2px solid black">
                    <legend style="color: black;">
                        <h2><b>Tìm bài viết</b></h2>
                    </legend>
                    <input class="form-control" type="text" name="id">
                    <input class="btn btn-primary" type="submit" name="btnTim" value="Tìm kiếm">
                </fieldset>
            </td>
            <td width=580px></td>
            <td>
                <a href="./add_post.php" class="btn btn-primary">
                    <h3><b>Thêm bài viết</b></h3>
                </a>
            </td>
        </table>
        <br><br>
        <table border="2" cellpadding="0" cellspacing="0">
            <tr align="center">

                <th>
                    <h3>ID bài viết</h>
                </th>
                <th>
                    <h3>Ảnh</h3>
                </th>
                <th>
                    <h3>Tiêu đề</h3>
                </th>
                <th>
                    <h3>Nội dung</h3>
                </th>
                <th></th>

            </tr>
            <?php
        if (isset($data) && $data != null) {
            while ($row = mysqli_fetch_assoc($data)) {
        ?>
                <tr>
                    <td align="center"><?php echo $row['id'] ?></td>
                    <td style="height: 280px; width: 280px">
                    <img src="<?php echo $row['image_path'] ?>" alt="Image" style="max-width: 100%; height: auto;">
                    </td>
                    <td style="width: 250px" align="center"><?php echo $row['title'] ?></td>
                    <td style="width: 500px" align="center"><?php echo $row['content'] ?></td>
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
    </form>
</body>

</html>