<!-- add-post -->
<?php
$permissions = search_data('permissions');
$id = "";
$name = "";
$content = "";
if (isset($_POST['btn_add'])) {
    $error = "";
    if (empty($_POST['name'])) {
        $error = "Name is required";
    }
    if (empty($_POST['Email'])) {
        $error = "Email is required";
    }
    if (empty($_POST['password'])) {
        $error = "password is required";
    }

    if (empty($error)) {
        $data['name'] = $_POST['name'];
        $data['Email'] = $_POST['Email'];
        $data['password'] = $_POST['password'];
        insert_db('users', $data);
    }
    // thêm quyền
    $per = $_POST['permission'];
    $user = $last_id;
    insert_db('role_permission', ['user_id' => $user, 'permission_id' => $per]);    
    echo "<script>window.location.href = '?mod=users&act=add_user'</script>";

}
?>
<div class="post" style="background-color:#f3f0ec; margin-bottom: 20px;">
    <div class="post-header card-header" style="text-align: start;">
        <span style="font-weight: bold; font-size: 25px; margin-left: 10px;">Thêm mới quản trị viên</span>
        <hr>
    </div>
    <hr>
    <form action="" method="post" style="margin: 0 10px;">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" value="<?php echo $name ?>" id="name" name="name">
            <?php if (empty($id) && isset($error)) {
                echo '<div class="error">' . $error . '</div>';
            }
            ?>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" value="<?php echo $id ?>" id="Email" name="Email">
            <?php if (empty($id) && isset($error)) {
                echo '<div class="error">' . $error . '</div>';
            }
            ?>
        </div>
        <div class="form-group">
            <label for="title">Password</label>
            <input type="password" class="form-control" value="<?php echo $password ?>" id="password" name="password">
            <?php if (empty($password) && isset($error)) {
                echo '<div class="error">' . $error . '</div>';
            }
            ?>
        </div>
        <div class="form-group">
            <label for="user">Chọn quyền</label>
            <select name="permission" class="form-control" id="permission">
                <?php
                while ($permission = $permissions->fetch_assoc()) {
                    $selected = ($permission['id'] == $per) ? 'selected' : '';
                    // echo $selected;
                    // echo "<script>console.log('{$selected}');</script>";
                    echo "<option class='form-control' value='{$permission['id']}' $selected>{$permission['name']}</option>";
                }
                ?>

            </select>
        </div>

        <input type="submit" class="btn btn-primary" value="Thêm mới" name="btn_add" style="margin: 20px 0;">
    </form>
</div>