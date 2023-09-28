<?php
$permissions = search_data('permissions');
$users = search_data('users');
if(isset($_POST['btn_search'])){
    $users = search_data('users', $_POST['email'], 'email', '1');
    // echo $_POST['email'];
    print_r($_POST);
}
?>
<div class="row" style="display: flex; justify-content: space-around;">
    <div class="post col-4" style="background-color:#f3f0ec;">
        <div class="cat-product">
            <div class="post-header">
                <span style="font-weight: bold; font-size: 20px; line-height: 2; margin-left: 10px;">
                    Thêm quản trị viên
                </span>
                <hr>
            </div>
            <form action="" method="post">
                <label for="email">Tìm kiếm user</label>
                <div class="form-group" style="display: flex;">
                    <input type="email" class="form-control"  placeholder="Nhập email user" name="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email']; ?>" id="email">
                    <input type="submit" value="Tìm kiếm" style="margin-left: 10px;" name="btn_search">
                </div>
            </form>
            <form action="" method="post">
                <div class="form-group">
                    <label for="user">Chọn user</label>
                    <select name="user" class="form-control" id="user">
                        <?php
                        while ($user = $users->fetch_assoc()) {
                            echo "<option value='1'>{$user['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="user">Chọn quyền</label>
                    <select name="permission" class="form-control" id="permission">
                        <?php
                        while ($permission = $permissions->fetch_assoc()) {
                            echo "<option value='1'>{$permission['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Thêm mới" name="btn_add" style="margin: 10px;">
            </form>
        </div>

    </div>
    <div class="post col-7" style="background-color:#f3f0ec;">
        <div class="list-cat-child">
            <div class="post-header" style="text-align: start; background-color:#a1a19c;">
                <span style="font-weight: bold; font-size: 20px; line-height: 2; margin-left: 10px;">
                    Danh sách quản trị viên
                </span>
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
                    while ($row = $permissions->fetch_assoc()) {
                        echo "<tr>";
                        $t++;
                        echo "<th>{$t} </th>";
                        echo "<td> {$row['name']}</td>";
                        echo "<td> {$row['description']}</td>";
                        echo '<td>
                                <a href="?mod=permissions&act=update&id=' . $row['id'] . '"><i title="Sửa" class="fa-regular fa-pen-to-square" style="font-size: 20px; color: blue;"></i></a>
                                <a href="?mod=permissions&act=delete&id=' . $row['id'] . '"><i title="Xóa" class="fa-solid fa-trash" style="font-size: 20px; "></i></a>
                              </td>';
                        $t++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>