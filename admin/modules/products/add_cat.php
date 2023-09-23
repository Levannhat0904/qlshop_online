<?php
//thêm danh mục cha
if (isset($_POST['btn_add_cat'])) {
    $data['cat'] = $_POST['cat'];
    if (empty($data['cat'])) {
        $error ="Dữ liệu không hợp lệ";
    }else{
        $data['slug'] = "product." .  $data['cat'];
        // Thêm dữ liệu vào CSDL
        // insert_db("cats", $data, "slug", $data['slug']);
        // echo "<script>window.location='?mod=products&act=cat_product'</script>";
    }
    // header("location:?mod=products&act=cat_product");
}
?>