<?php
    $list_color = search_data("color");
    // require 'modules/products/color_product.php';
    require 'modules/products/add_color.php';
    
    // require 'modules/products/add_cat.php';
?>
<div class="row" style="display: flex; justify-content: space-around;">
    <div class="post col-4" style="background-color:#f3f0ec;">
        <div class="cat-product">
            <div class="post-header">
                <span style="font-weight: bold; font-size: 20px; line-height: 2; margin-left: 10px;">Thêm
                    Màu sắc</span>
                <hr>
            </div>

            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Tên Màu:
                    <input type="text" class="form-control" id="name" name="name">
                    <?php if (empty($data['name']) && isset($error)) {
                        echo '<div class="error">' . $error . '</div>';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="value">Chọn màu sắc</label>
                    <input type="color"class="form-control" name="value" id="value">
                </div>
                <input type="submit" class="btn btn-primary" value="Thêm mới" name="btn_add_color" style="margin: 10px;">
            </form>
        </div>
    </div>
    <div class="post col-7" style="background-color:#f3f0ec;">
        <div class="list-cat-child">
            <div class="post-header" style="text-align: start; background-color:#a1a19c;">
                <span style="font-weight: bold; font-size: 20px; line-height: 2; margin-left: 10px;"> Danh
                    sách màu sắc</span>
                <hr>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên Màu sắc</th>
                        <th scope="col">Giá trị</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $t = 0;
                        ?>
                    <?php
                    while($row=$list_color->fetch_assoc()){
                            echo "<tr>";
                            $t++;
                            echo "<th> {$t}</th>";
                            echo "<td> {$row['name']}</td>";
                            echo "<td> {$row['value']}</td>";
                            echo '<td>
                                <a href="#"><i class="fa-regular fa-pen-to-square" style="font-size: 20px; color: blue;"></i></a>
                                <a href="#"><i class="fa-solid fa-trash" style="font-size: 20px;"></i></a>
                              </td>';
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>