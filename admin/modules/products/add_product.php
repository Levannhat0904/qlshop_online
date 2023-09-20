<?php
$sql_cat_item = "SELECT cats.cat, cat_product.*
FROM cats,cat_product
WHERE cats.id = cat_product.cat_id";
$result_cat_item = $conn->query($sql_cat_item);
$data_cat_item = array();

// Kiểm tra và thêm kết quả vào mảng
if ($result_cat_item->num_rows > 0) {
    while ($row = $result_cat_item->fetch_assoc()) {
        $cat = $row['cat'];
        $cat_item = $row['cat_item'];

        // Nếu mảng chưa có key tương ứng với cat, thêm nó vào mảng
        if (!array_key_exists($cat, $data_cat_item)) {
            $data_cat_item[$cat] = array();
        }
        // Thêm cat_item vào mảng của cat tương ứng
        $data_cat_item[$cat][] = $cat_item;
    }
} else {
    echo "Không có kết quả.";
}
?>
<div class="post" style="background-color:#f3f0ec; margin-bottom: 20px;">
    <div class="post-header card-header" style="text-align: start;">
        <span style="font-weight: bold; font-size: 25px; margin-left: 10px;">Thêm sản phẩm</span>
        <hr>
    </div>
    <hr>
    <form action="" method="post" style="margin: 0 10px;">
        <div class="form-group">
            <label for="id">Mã sản phẩm</label>
            <input type="text" class="form-control" id="id" name="id">
        </div>
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="color">Màu sắc</label>
            <input type="text" class="form-control" id="color" name="color">
        </div>
        <div class="form-group col-3">
            <label for="qty">Số lượng</label>
            <input type="number" min="1" class="form-control" id="qty" name="qty">
        </div>
        <div class="form-group ">
            <label for="img-post">Hình ảnh</label>
            <input type="file" class="form-control" id="img-post" name="img">
        </div>
        <div class="form-group">
            <label for="detail">Mô tả chi tiết</label>
            <textarea class="form-control ckeditor" id="detail" rows="3" name="detail"></textarea>
        </div>
        <div class="form-group col-3">
            <label for="cat">Danh mục</label>
            <select class="form-control" id="cat" name="cat">
                <?php
                foreach ($data_cat_item as $key => $value) {
                    echo '<optgroup label="' . $key . '">';
                    foreach ($value as $v) {
                        echo '<option value="' . $key.".".$v. '">' . $v . '</option>';
                    }
                    echo '</optgroup>';
                }
                ?>
        </div>
        <input type="submit" class="btn btn-primary" value="Thêm mới" name="btn_add" style="margin: 20px 0;">
    </form>
</div>