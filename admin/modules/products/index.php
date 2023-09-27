<?php
$products = search_data('products');
//    $sql ="SELECT * FROM product_color WHERE id_product_color = 'SP001'";
//    $data =  $result = $conn->query($sql);

?>
<div class="post" style="background-color:#f3f0ec;">
    <div class="post-header" style="text-align: start;">
        <span style="font-weight: bold; font-size: 25px; margin-left: 10px;">Danh sách Sản Phẩm</span>
        <hr>
        <div class="search">
            <form action="" method="get">
                <input type="text" placeholder="Tìm kiếm">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="submit" value="Tìm kiếm" name="btn_search">
            </form>
        </div>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Mã</th>
                <th scope="col">Ảnh</th>
                <th scope="col" style="width:20%">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Danh mục </th>
                <th scope="col">Màu sắc </th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tác vụ</th>
            </tr>

            <img src="" alt="">
        </thead>
        <tbody>
            <?php
            $stt = 1;
            while ($product = $products->fetch_assoc()) {
                // print_r($product);
                echo "<tr >";
                echo "<td>" . $stt . "</td>";
                echo "<td>" . $product['id'] . "</td>";
                echo "<td> <img style='width: 100px;' src='../" . $product['img'] . "' alt=''>" . "</td>";
                echo "<td>" . $product['name'] . "</td>";
                // echo "<td>" . $product['image'] . "</td>";
                echo "<td>" .number_format($product['price'], 0 ,  "." , "," ) . "₫ </td>";
                echo "<td>" . $product['qty'] . "</td>";
                $cat_product = search_data('cat_product', $product['cat_product_id'], 'id');
                while ($product_cat = $cat_product->fetch_assoc()) {
                    echo "<td>" . $product_cat['cat_item'] . "</td>";
                }
                echo "<td>";
                $color_data = search_data('product_color', $product['id'], 'id_product_color');
                $row = $color_data->num_rows;//xử lí dấu , phân tách các màu
                $count=1;
                while ($color_id = $color_data->fetch_assoc()) {
                    $list_color = search_data('color', $color_id['color_id'], 'id');
                    // echo $row;
                    while ($color = $list_color->fetch_assoc()) {
                         echo $color['name'];
                         if($count<$row){
                             echo ", ";
                             $count++;
                         }

                    }
                }
                echo "</td>";
                echo "<td>" . "Còn hàng" . "</td>";
                echo '<td>';
                echo '<a href="?mod=products&act=update&id='.$product['id'].'""><i class="fa-regular fa-pen-to-square" title="Sửa sản phẩm" onclick="return confirm(\'Bạn có chắc chắn muốn sửa?\')" style="font-size: 20px; color: blue;"></i> </a>';
                echo '<a href="?mod=products&act=delete&id='.$product['id'].'""><i class="fa-solid fa-trash"  title="Xóa sản phẩm" onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\')" style="font-size: 20px;"></i> </a>';
                echo '</td>';
                echo "</tr>";
                $stt++;
            }
            ?>
        </tbody>
    </table>
</div>