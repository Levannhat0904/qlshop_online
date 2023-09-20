<!-- add-post -->
<?php
$id="";
$name="";
$content="";
if (isset($_POST['btn_add'])) {
    $error = "";
    $id = $_POST['id'];
    $name = $_POST['name'];
    $content = $_POST['content'];
    if (empty($id) || empty($name) || empty($content)) {
        $error = "Vui lòng nhập đầy đủ thông tin";
    }else{
        if(!insert_db("pages", array("id" => $id, "name" => $name, "content" => $content), "id", $id)){
            echo "<script>alert('Lỗi khi thêm dữ kiếm - Trùng mã trang')</script>";
        }else{
            echo "<script>alert('Thêm dữ liệu thành công')</script>";
            // header("location:?mod=pages");
        }
    }
}
?>
<div class="post" style="background-color:#f3f0ec; margin-bottom: 20px;">
    <div class="post-header card-header" style="text-align: start;">
        <span style="font-weight: bold; font-size: 25px; margin-left: 10px;">Thêm trang</span>
        <hr>
    </div>
    <hr>
    <form action="" method="post" style="margin: 0 10px;">
        <div class="form-group">
            <label for="title">ID trang</label>
            <input type="text" class="form-control" value="<?php echo $id ?>" id="title" name="id">
            <?php if (empty($id) && isset($error)) {
                echo '<div class="error">' . $error . '</div>';
            }
            ?>
        </div>
        <div class="form-group">
            <label for="title">Tên trang</label>
            <input type="text" class="form-control" value="<?php echo $name ?>" id="title" name="name">
            <?php if (empty($name) && isset($error)) {
                echo '<div class="error">' . $error . '</div>';
            }
            ?>
        </div>
        <!-- <div class="form-group">
            <label for="img-post">Hình ảnh</label>
            <input type="file" class="form-control" id="img-post" name="img">
        </div> -->

        <div class="form-group">
            <label for="content">Nội dung trang</label>
            <textarea class="form-control ckeditor" id="content" rows="3" name="content"><?php echo $content ?></textarea>
            <?php if (empty($content) && isset($error)) {
                echo '<div class="error">' . $error . '</div>';
            }
            ?>
        </div>
        <input type="submit" class="btn btn-primary" value="Thêm mới" name="btn_add" style="margin: 20px 0;">
    </form>
</div>