<?php 
// $users = search_data('users');
// $products = search_data('products');
// lây danh sách quản trị viên
$role_permissions = search_data('role_permission');
?>
 <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Vai trò</th>
                <th scope="col">Tác vụ</th>
            </tr>

            <img src="" alt="">
        </thead>
        <tbody>
            <?php
            $stt = 1;
            while ($role_permission = $role_permissions->fetch_assoc()) {
                echo "<tr >";
                echo "<td>" . $stt . "</td>";
                $sql_user = "SELECT * FROM users WHERE id = {$role_permission['user_id']}";
                $user = mysqli_query($conn, $sql_user);
                while ($row = $user->fetch_assoc()) {
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                }
                $sql_permission = "SELECT * FROM permissions WHERE id = {$role_permission['permission_id']}";
                $permission = mysqli_query($conn, $sql_permission);
                while ($row = $permission->fetch_assoc()) {
                    echo "<td>" . $row['name'] . "</td>";
                }
                echo '<td>';
                echo '<a href="?mod=products&act=update&id='.$role_permission['id'].'""><i class="fa-regular fa-pen-to-square" title="Sửa sản phẩm" onclick="return confirm(\'Bạn có chắc chắn muốn sửa?\')" style="font-size: 20px; color: blue;"></i> </a>';
                echo '<a href="?mod=products&act=delete&id='.$role_permission['id'].'""><i class="fa-solid fa-trash"  title="Xóa sản phẩm" onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\')" style="font-size: 20px;"></i> </a>';
                echo '</td>';
                echo "</tr>";
                $stt++;
            }
            ?>
        </tbody>
    </table>