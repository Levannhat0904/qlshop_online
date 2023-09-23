<?php 
// thêm danh mục con
if (isset($_POST['btn_add_child'])) {
    $cat_parent = $_POST['cat_parent'];
    $cat_item = $_POST['cat_item'];
    // Validate dữ liệu 
    if (empty($cat_item) || empty($cat_parent)) {
        die("Dữ liệu không hợp lệ");
    }

    // Kiểm tra xem cat_item đã tồn tại trong CSDL chưa
    // $sql = "SELECT * FROM cat_product WHERE cat_item = '$cat_item'";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     die("cat_item đã tồn tại");
    // }

    // // Thêm dữ liệu vào CSDL
    // $sql = "INSERT INTO cat_product (cat_item, cat_id) VALUES ('$cat_item', '$cat_parent')";

    // if ($conn->query($sql) === TRUE) {
    //     echo "Đã thêm danh mục thành công";
    // } else {
    //     echo "Lỗi: " . $sql . "<br>" . $conn->error;
    // }

    if(insert_db("cat_product", array(
        "cat_item" => $cat_item,
        "cat_id" => $cat_parent
    ), "cat_item", $cat_item)){
        echo "<script>window.location='?mod=products&act=cat_product'</script>";
    }else{ 
        // xu ly loi
        // echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
?>