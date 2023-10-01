
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    include_once './menu.php';
    require('connectdb.php');
    // Lấy danh sách bài viết từ cơ sở dữ liệu
    $id = $_GET['id'];
    $sql = "SELECT * FROM post  WHERE id='$id'";
    $data = mysqli_query($con, $sql);

    // Đóng kết nối
    mysqli_close($con);
    ?>
    <div id="wapper">
        <ul class="list-post">
            <?php while ($row = mysqli_fetch_assoc($data)) : ?>
                <h2><u style="text-underline-offset: 30px;"><b><?php echo $row['title']; ?></b></u></h2>
                <br><br>
                <div style="text-align: center;">
                    <img width="300px" height="300px" src="<?php echo $row['image_path']; ?>" alt="Ảnh">&nbsp;&nbsp;
                <br><br>
                </div>
                
                <div class="more-info">
                    <?php echo $row['content']; ?>
                </div>
                
            <?php endwhile; ?>
        </ul>
    </div>
</body>

</html>