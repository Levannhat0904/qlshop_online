<!-- add-post -->
<?php
$id=$_GET["id"];
$page =search_data('pages',$id,'id');
$page=$page->fetch_assoc();
if (isset($_POST['btn_update'])) {
    $error = "";
    $id = $_POST['id'];
    $name = $_POST['name'];
    $content = $_POST['content'];
    if (empty($id) || empty($name) || empty($content)) {
        $error = "Vui lòng nhập đầy đủ thông tin";
    }else{
        if(update_db('pages',['name'=>$name,'content'=>$content] ,"id", $id)){
            echo "<script>alert('Cạp nhật dữ liệu thành công')</script>";
            echo "<script>window.location='?mod=pages'</script>";
        }else{
            echo "<script>alert('Lỗi khi thêm dữ kiếm - Trùng mã trang')</script>";
            // header("location:?mod=pages");
        }
    }
}
?>
<div class="post" style="background-color:#f3f0ec; margin-bottom: 20px;">
    <div class="post-header card-header" style="text-align: start;">
        <span style="font-weight: bold; font-size: 25px; margin-left: 10px;">Cập nhật trang</span>
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
            <input type="text" class="form-control" value="<?php echo $page['name'] ?>" id="title" name="name">
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
            <textarea class="form-control ckeditor" id="content" rows="3" name="content"><?php echo $page['content'] ?></textarea>
            <?php if (empty($content) && isset($error)) {
                echo '<div class="error">' . $error . '</div>';
            }
            ?>
        </div>
        <input type="submit" class="btn btn-primary" value="Cập nhật" name="btn_update" style="margin: 20px 0;">
    </form>
</div>