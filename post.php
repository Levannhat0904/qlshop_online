<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị danh sách bài viết</title>
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
    <div id="wapper">
        <ul class="list-post">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <li>
                    <a href="" class="post-thumb">
                        <img width="280px" height="280px" src="<?php echo $row['image_path']; ?>" alt="Ảnh">&nbsp;&nbsp;
                    </a>
                    <div class="more-info">
                        <a href="./detail_post.php?id=<?php echo $row['id'] ?>" class="post-title"><h2><?php echo $row['title']; ?> </h2></a> 
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>

</body>

</html>