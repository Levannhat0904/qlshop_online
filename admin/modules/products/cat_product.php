<?php

$cats = search_data('cats', 'product', 'slug', false);
$cat_1 = search_data('cats', 'product', 'slug', false);

//lấy dữ liệu các danh mục sản phẩm con
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

//thêm danh mục cha
require 'modules/products/add_cat.php';
//thêm danh mục con
require 'modules/products/add_cat_item.php';
?>
<div class="row" style="display: flex; justify-content: space-around;">
    <div class="post col-4" style="background-color:#f3f0ec;">
        <div class="cat-product">
            <div class="post-header">
                <span style="font-weight: bold; font-size: 20px; line-height: 2; margin-left: 10px;">Thêm
                    danh mục cha 
                    
                </span>
                <hr>
            </div>

            <form action="" method="post">
                <div class="form-group">
                    <label for="cat">Tên danh mục cha</label>
                    <input type="text" class="form-control" id="cat" name="cat">
                    <?php if (empty($data['cat']) && isset($error)) {
                        echo '<div class="error">' . $error . '</div>';
                    }
                    ?>
                </div>
                <input type="submit" class="btn btn-primary" value="Thêm mới" name="btn_add_cat" style="margin: 10px;">
            </form>
        </div>
        <div class="cat-product-child">
            <div class="post-header" style="text-align: start; background-color:#a1a19c;">
                <span style="font-weight: bold; font-size: 20px; line-height: 2; margin-left: 10px;">Thêm
                    danh mục con</span>
                <hr>
            </div>
            <form action="" method="post">
                <div class="form-group">
                    <label for="cat">Tên danh mục</label>
                    <input type="text" class="form-control" id="cat" name="cat_item">
                </div>
                <div class="form-group">
                    <label for="list-cat">Danh mục cha</label>
                    <select class="form-control" id="list-cat" name="cat_parent">
                        <?php
                        if ($cats->num_rows > 0) {
                            while ($row = $cats->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['cat'] . "</option>";
                            }
                        }
                        ?>
                    </select>

                </div>

                <input type="submit" class="btn btn-primary" value="Thêm mới" name="btn_add_child" style="margin: 10px;">

            </form>
        </div>
    </div>
    <div class="post col-7" style="background-color:#f3f0ec;">
        <div class="list-cat-child">
            <div class="post-header" style="text-align: start; background-color:#a1a19c;">
                <span style="font-weight: bold; font-size: 20px; line-height: 2; margin-left: 10px;"> Danh
                    mục con</span>
                <hr>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Danh mục cha</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $t = 0;
                    // foreach($cat_product_item as $item)
                    ?>
                    <?php
                    foreach ($data_cat_item as $cat => $cat_item) {
                        foreach ($cat_item as $v) {
                            echo "<tr>";
                            $t++;
                            echo "<th> {$t}</th>";
                            echo "<td> {$v}</td>";
                            echo "<td> {$cat}</td>";
                            echo '<td>
                                <a href="#"><i class="fa-regular fa-pen-to-square" style="font-size: 20px; color: blue;"></i></a>
                                <a href="#"><i class="fa-solid fa-trash" style="font-size: 20px;"></i></a>
                              </td>';
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="list-cat">
            <div class="post-header" style="text-align: start; background-color:#a1a19c;">
                <span style="font-weight: bold; font-size: 20px; line-height: 2; margin-left: 10px;"> Danh
                    mục cha</span>
                <hr>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($cat_1->num_rows > 0) {
                        while ($row_1 = $cat_1->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $row_1['id'] . "</th>";
                            echo "<td>" . $row_1['cat'] . "</td>";
                            echo '<td>
                                <a href="#"><i class="fa-regular fa-pen-to-square" style="font-size: 20px; color: blue;"></i></a>
                                <a href="#"><i class="fa-solid fa-trash" style="font-size: 20px;"></i></a>
                              </td>';
                            echo "</tr>";
                        }
                    }
                    ?>
                    <!-- <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>
                            <a href="#""><i class=" fa-regular fa-pen-to-square"style="font-size: 20px; color: blue;"></i></a>
                            <a href="#"><i class="fa-solid fa-trash" style="font-size: 20px;"></i></a>
                        </td>
                    </tr> -->

                </tbody>
            </table>
        </div>
    </div>
</div>