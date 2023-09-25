<?php
//thêm danh mục cha
if (isset($_POST['btn_add_color'])) {
    $data['name'] = $_POST['name'];
    $data['value'] = $_POST['value'];
    if (empty($data['name']|| empty($data['value']))) {
        $error ="Dữ liệu không hợp lệ";
    }else{
        print_r($data);
        // Thêm dữ liệu vào CSDL
        insert_db("color_product", $data);
        echo "<script>window.location='?mod=products&act=color_product'</script>";
    }
    // header("location:?mod=products&act=cat_product");
}
?>