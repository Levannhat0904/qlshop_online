<?php
//thêm danh mục cha
$error=array();
if (isset($_POST['btn_add_cat'])) {
    $data['cat'] = $_POST['cat'];
    if (empty($data['cat'])) {
        $error ="Dữ liệu không hợp lệ";
    }else{
        $data['slug'] = "product." .  $data['cat'];
        // Thêm dữ liệu vào CSDL
        if(insert_db("cats", $data, "slug", $data['slug'])){
            // echo $error['key'];
            echo "<script>window.location='?mod=products&act=cat_product'</script>";
        }
        // echo "hahah";   
    }   
    // print_r($error);
    // header("location:?mod=products&act=cat_product");
}
?>