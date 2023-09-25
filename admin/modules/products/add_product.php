<?php
$list_color = search_data("color");

//xử lí thêm dữ liệu sản phẩm
if (isset($_POST['btn_add'])) {
    //xử lí hình ảnh:
    if (isset($_FILES['img'])&&!empty($_FILES['img']['name'])) {
        $file_name = $_FILES['img']['name']; // Lấy tên tệp ảnh
        $file_tmp = $_FILES['img']['tmp_name']; // Lấy đường dẫn tạm thời của tệp ảnh
        $upload_dir = '../images/img_product/'; // Thư mục để lưu trữ ảnh

        // Kiểm tra định dạng ảnh (ở đây, chúng ta kiểm tra định dạng JPG, PNG, hoặc GIF)
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

        if (!in_array($file_extension, $allowed_extensions)) {
            echo 'Chỉ cho phép tải lên các tệp ảnh JPG, JPEG, PNG hoặc GIF.';
        } else {
            // Kiểm tra kích thước tệp ảnh (ở đây, giới hạn kích thước tệp là 5MB)
            $max_file_size = 5 * 1024 * 1024; // 5MB
            $file_size = $_FILES['img']['size']; //đơn vị KB
            if ($file_size > $max_file_size) {
                echo 'Kích thước tệp ảnh quá lớn. Chỉ cho phép tệp ảnh có kích thước tối đa là 5MB.';
            } else {
                // Di chuyển tệp ảnh vào thư mục đích
                if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
                    $image_path = $upload_dir . $file_name;
                    // echo 'Tệp ảnh đã được tải lên thành công. Đường dẫn: '."images/img_product/".$file_name;
                    $data['img'] = "images/img_product/" . $file_name;
                } else {
                    echo 'Có lỗi xảy ra khi tải lên tệp ảnh.';
                }
            }
        }
    }
    //lâsy danh sách màu sắc
    if (isset($_POST["color"]) && is_array($_POST["color"])) {
            $color = $_POST['color'];
    }
    $data['name'] = $_POST['name'];
    $data['id'] = $_POST['id'];
    $data['price'] = $_POST['price'];
    $data['cat_product_id'] = $_POST['cat'];
    $data['detail'] = $_POST['detail'];
    $data['qty'] = $_POST['qty'];
    if (!empty($data['name']) && !empty($data['id']) && !empty($data['price']) && !empty($data['cat_product_id']) && !empty($data['detail']) && !empty($data['qty']) && !empty($data['img'])) {
        insert_db("products", $data);
        //xử lí thêm  màu sắc
        if (!empty($color)) {
            foreach ($color as $key => $value) {
                $data_color['color_id'] = $value;
                $data_color['id_product_color'] = $data['id'];
                insert_db("product_color", $data_color);
            }
        }
        echo "<script>window.location='?mod=products'</script>";

        echo "<pre>";
        print_r($data);
        echo "</pre>";

        echo "<script>window.location='?mod=products'</script>";
    }
}
//hết

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
        $cat_item_id = $row['id'];
        // Nếu mảng chưa có key tương ứng với cat, thêm nó vào mảng
        if (!array_key_exists($cat, $data_cat_item)) {
            $data_cat_item[$cat] = array();
        }
        // Thêm cat_item vào mảng của cat tương ứng
        $data_cat_item[$cat][$cat_item_id] = $cat_item;
    }
} else {
    echo "Không có kết quả.";
}
// echo "<pre>";
// print_r($data_cat_item);
// echo "</pre>";
?>
<div class="post" style="background-color:#f3f0ec; margin-bottom: 20px;">
    <div class="post-header card-header" style="text-align: start;">
        <span style="font-weight: bold; font-size: 25px; margin-left: 10px;">Thêm sản phẩm</span>
        <hr>
    </div>
    <hr>
    <form action="" method="post" style="margin: 0 10px;" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id">Mã sản phẩm</label>
            <input type="text" class="form-control" id="id" name="id">
        </div>
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="price">Giá sản phẩm</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="form-group">
            <label for="">Màu sắc</label>
        </div>
        <div class="form-group">
            <?php
            while ($row = $list_color->fetch_assoc()) {
                echo "<label for='{$row['id']}'>{$row['name']}</label>";
                echo "<input type='checkbox' name='color[]' id='{$row['id']}' value='{$row['id']}' style='margin:0 20px 0 5px'>";
            }
            ?>

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
                    foreach ($value as $k => $v) {
                        echo '<option value=' . $k . '>' . $v . '</option>';
                    }
                    echo '</optgroup>';
                }
                ?>
        </div>
        <input type="submit" class="btn btn-primary" value="Thêm mới" name="btn_add" style="margin: 20px 0;">
    </form>
</div>