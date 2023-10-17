<!-- trang hiển thị danh sách -->
<?php
$orders = search_data("orders");
// if (isset($_POST['btn_search']) && !empty($_POST['btn_search'])) {
//     $data = search_data('pages', $_POST['key'], 'name', '0');
// }

?>
<div class="post" style="background-color:#f3f0ec;">
    <div class="post-header" style="text-align: start;">
        <span style="font-weight: bold; font-size: 25px; margin-left: 10px;">Danh sách đơn hàng</span>
        <hr>
        <div class="search">
            <form action="" method="post">

                <input type="text" placeholder="Tìm kiếm" name="key" value="<?php if (!empty($_POST['key'])) {
                                                                                    echo $_POST['key'];
                                                                                } ?>">
                <input type="submit" value="Tìm kiếm" name="btn_search">

            </form>
        </div>
    </div>
    <hr>
    <!-- <ul class="status">
                    <li class="status-item"><a href="#" class="status-item_link">trạng thái 1</a></li>
                    <li class="status-item"><a href="#" class="status-item_link">trạng thái 2</a></li>
                    <li class="status-item"><a href="#" class="status-item_link">trạng thái 3</a></li>
                </ul> -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số điện thoai</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Ngày hoàn thành</th>
                <!-- <th scope="col">Nội dung</th> -->
                <th scope="col">Tác vụ</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $stt = 1;

            if ($orders->num_rows > 0) {
                while ($row = $orders->fetch_assoc()) {

                    echo " <tr>";
                    echo "<th scope='row'>" . $stt . "</th>";
                    echo "<td> <a href='?mod=orders&act=detail&id={$row['id']}'>" . $row['id'] . "</a> </td>";
                    echo "<td> <a href='?mod=orders&act=detail&id={$row['id']}'>" . $row['name'] . "</a> </td>";
                    echo "<td> <a href='?mod=orders&act=detail&id={$row['id']}'>" . $row['phone_number'] . "</a> </td>";
                    echo "<td style ='max-width:200px'> <a href='?mod=orders&act=detail&id={$row['id']}'>" . $row['address'] . "</a> </td>";
                    echo "<td> <a href='?mod=orders&act=detail&id={$row['id']}'>" . $row['status'] . "</a> </td>";
                    echo "<td> <a href='?mod=orders&act=detail&id={$row['id']}'>" . $row['created_at'] . "</a> </td>";
                    if ($row['status'] != "Hoàn thành") {
                        $row['updated_at'] = "Chưa xác định";
                    }
                    echo "<td> <a href='?mod=orders&act=detail&id={$row['id']}'>" . $row['updated_at'] . "</a> </td>";
                    // $content = substr($row['content'], 0, 100); // Lấy 100 ký tự đầu
                    // // Kiểm tra độ dài của chuỗi
                    // if (strlen($row['content']) > 100) {
                    //     $content .= ' ...'; // Nếu chuỗi dài hơn 100 ký tự, thêm "..." vào cuối
                    // }
                    // echo "<td>" . $content . "</td>";
                    echo "<td>";
            ?>
                    <a href="?mod=pages&&act=update&&id=<?php echo $row['id'] ?>"><i class="fa-regular fa-pen-to-square" style="font-size: 20px; color: blue;"></i></a>
                    <a href="?mod=pages&&act=delete&&id=<?php echo $row['id'] ?>"><i class="fa-solid fa-trash" style="font-size: 20px;"></i></a>
            <?php
                    echo "</td>";
                    $stt++;
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>