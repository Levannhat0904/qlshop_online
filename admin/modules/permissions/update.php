<?php
$id=$_GET["id"];
$permission = search_data('permissions', $id,'id');
$permission = $permission->fetch_assoc();
$permissions = search_data('permissions');
if(isset($_POST['btn_update'])){
    $data['name'] = $_POST['name'];
    $data['description'] = $_POST['desc'];
    update_db('permissions', $data,"id", $id);
    echo "<script>window.location='?mod=permissions&act=add_permission'</script>";
}

?>
<div class="row" style="display: flex; justify-content: space-around;">
    <div class="post col-4" style="background-color:#f3f0ec;">
        <div class="cat-product">
            <div class="post-header">
                <span style="font-weight: bold; font-size: 20px; line-height: 2; margin-left: 10px;">
                    Cập nhật quyền
                </span>
                <hr>
            </div>

            <form action="" method="post">
                <div class="form-group">
                    <label for="cat">Tên quyền</label>
                    <input type="text" class="form-control" value="<?php echo $permission['name']?>" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="cat">Mô tả</label>
                    <input type="text" class="form-control" value="<?php echo $permission['description']?>" id="desc" name="desc">
                </div>
                <input type="submit" class="btn btn-primary" value="Cập nhật" name="btn_update" style="margin: 10px;">
            </form>
        </div>

    </div>
    <div class="post col-7" style="background-color:#f3f0ec;">
        <div class="list-cat-child">
            <div class="post-header" style="text-align: start; background-color:#a1a19c;">
                <span style="font-weight: bold; font-size: 20px; line-height: 2; margin-left: 10px;">
                    Danh sách quyền
                </span>
                <hr>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        $t = 0;
                        while ($row = $permissions->fetch_assoc()){
                            echo "<tr>";
                            $t++;
                            echo "<th>{$t} </th>";
                            echo "<td> {$row['name']}</td>";
                            echo "<td> {$row['description']}</td>";
                            echo '<td>
                                <a href="?mod=permissions&act=update&id='.$row['id'].'"><i title="Sửa" class="fa-regular fa-pen-to-square" style="font-size: 20px; color: blue;"></i></a>
                                <a href="?mod=permissions&act=delete&id='.$row['id'].'"><i title="Xóa" class="fa-solid fa-trash" style="font-size: 20px; "></i></a>
                              </td>';
                            $t++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>