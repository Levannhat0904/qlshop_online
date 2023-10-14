<!-- trang hiển thị danh sách -->
<?php
$data = search_data("pages");
if(isset($_POST['btn_search'])&&!empty($_POST['btn_search'])){
    $data =search_data('pages',$_POST['key'],'name','0');
}
?>
<div class="post" style="background-color:#f3f0ec;">
    <div class="post-header" style="text-align: start;">
        <span style="font-weight: bold; font-size: 25px; margin-left: 10px;">Danh sách bài viết</span>
        <hr>
        <div class="search">
            <form action="" method="post">
                <input type="text" placeholder="Tìm kiếm" name="key" value="<?php if (!empty($_POST['key'])) {
                    echo $_POST['key'];
                } ?>">
                <i class="fa-solid fa-magnifying-glass"></i>
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
                <th scope="col">Mã</th>
                <th scope="col">Tiêu đề</th>
                <!-- <th scope="col">Nội dung</th> -->
                <th scope="col">Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stt = 1;
            if ($data->num_rows > 0) {
                while ($row = $data->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $stt . "</th>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
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