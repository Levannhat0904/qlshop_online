<?php
// include_once './Classes/PHPExcel.php';
// include_once './Classes/PHPExcel/IOFactory.php';
// $sql_data_user = "SELECT users.*, permissions.description FROM role_permission,users,permissions WHERE users.id = role_permission.user_id AND permissions.id = role_permission.permission_id";
//     $data_user = $conn->query($data_user);
require 'admin/plugins/excel/vendor/autoload.php'; // Đảm bảo đã đúng đường dẫn tới autoload.php của PhpSpreadsheet

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
//Kết nối database
$con = mysqli_connect('localhost', 'root', '', 'tesr_php') or die('Lỗi kết nối');
//Thực hiện truy vấn
$sql = "SELECT * FROM loaisach";
$data = mysqli_query($con, $sql);
//Tìm kiếm
if (isset($_POST['btnTim'])) {
    $ml = $_POST['txt_maloai'];
    $tl = $_POST['txt_tenloai'];
    $sqltk = "SELECT * FROM loaisach WHERE Maloai like '%$ml%' and Tenloai like '%$tl%'";
    $data = mysqli_query($con, $sqltk);
}
if (isset($_POST['btnXuat'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "qlshop_online";
    // global $conn;
    $conn = new mysqli($servername, $username, $password, $database);
    $sql_data_user = "SELECT users.*, permissions.description FROM role_permission,users,permissions WHERE users.id = role_permission.user_id AND permissions.id = role_permission.permission_id";
    $data_user = $conn->query($sql_data_user);

    // require 'vendor/autoload.php'; // Đảm bảo đã đúng đường dẫn tới autoload.php của PhpSpreadsheet

    $objExcel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $objExcel->setActiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet()->setTitle('DSSV');
    $rowCount = 1;

    // Tạo tiêu đề cho cột trong excel
    $sheet->setCellValue('A' . $rowCount, 'Mã loại sách');
    $sheet->setCellValue('B' . $rowCount, 'Tên loại sách');
    $sheet->setCellValue('C' . $rowCount, 'Mô tả');

    // Định dạng cột tiêu đề
    $sheet->getColumnDimension('A')->setAutoSize(true);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);

    // Gán màu nền
    $sheet->getStyle('A1:C1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');

    // Căn giữa
    $sheet->getStyle('A1:C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    // Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
    while ($row = $data_user->fetch_assoc()) {
        $rowCount++;
        $sheet->setCellValue('A' . $rowCount, $row['name']);
        $sheet->setCellValue('B' . $rowCount, $row['email']);
        $sheet->setCellValue('C' . $rowCount, $row['description']);
    }

    // Kẻ bảng
    $styleArray = array(
        'borders' => array(
            'allborders' => array(
                'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
            )
        )
    );

    $sheet->getStyle('A1:' . 'C' . ($rowCount))->applyFromArray($styleArray);

    $objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($objExcel, 'Xlsx');

    $fileName = 'ExportExcel.xlsx';
    $objWriter->save($fileName);

    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Length: ' . filesize($fileName));
    readfile($fileName);

    // Xóa tệp sau khi gửi
    unlink($fileName);
}
if (isset($_POST['btnXuats'])) {
    $ml = $_POST['txt_maloai'];
    $tl = $_POST['txt_tenloai'];
    $sqltk = "SELECT * FROM loaisach WHERE Maloai LIKE '%$ml%' AND Tenloai LIKE '%$tl%'";
    $data = mysqli_query($con, $sqltk);

    // require 'vendor/autoload.php'; // Đảm bảo đã đúng đường dẫn tới autoload.php của PhpSpreadsheet

    $objExcel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $objExcel->setActiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet()->setTitle('DSSV');
    $rowCount = 1;

    // Tạo tiêu đề cho cột trong excel
    $sheet->setCellValue('A' . $rowCount, 'Mã loại sách');
    $sheet->setCellValue('B' . $rowCount, 'Tên loại sách');
    $sheet->setCellValue('C' . $rowCount, 'Mô tả');

    // Định dạng cột tiêu đề
    $sheet->getColumnDimension('A')->setAutoSize(true);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);

    // Gán màu nền
    $sheet->getStyle('A1:C1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');

    // Căn giữa
    $sheet->getStyle('A1:C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    // Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
    while ($row = mysqli_fetch_array($data)) {
        $rowCount++;
        $sheet->setCellValue('A' . $rowCount, $row['Maloai']);
        $sheet->setCellValue('B' . $rowCount, $row['Tenloai']);
        $sheet->setCellValue('C' . $rowCount, $row['Mota']);
    }

    // Kẻ bảng
    $styleArray = array(
        'borders' => array(
            'allborders' => array(
                'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
            )
        )
    );

    $sheet->getStyle('A1:' . 'C' . ($rowCount))->applyFromArray($styleArray);

    $objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($objExcel, 'Xlsx');

    $fileName = 'ExportExcel.xlsx';
    $objWriter->save($fileName);

    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Length: ' . filesize($fileName));
    readfile($fileName);

    // Xóa tệp sau khi gửi
    unlink($fileName);
}
if(isset($_POST['btnImport']))
{
    // Đảm bảo đã đúng đường dẫn tới autoload.php của PhpSpreadsheet
    // require 'vendor/autoload.php';
    
    $inputFileName = $_FILES['file']['tmp_name']; // Đường dẫn tạm thời của tệp tải lên
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
    $sheet = $spreadsheet->getActiveSheet();
    
    $rowCount = 1;
    
    foreach ($sheet->getRowIterator() as $row) {
        if ($rowCount > 1) { // Bỏ qua dòng tiêu đề
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            
            $ml = $cellIterator->current()->getValue(); // Mã loại sách
            $cellIterator->next();
            $tl = $cellIterator->current()->getValue(); // Tên loại sách
            $cellIterator->next();
            $mota = $cellIterator->current()->getValue(); // Mô tả
            
            // Thực hiện lưu dữ liệu vào CSDL hoặc thực hiện các thao tác cần thiết
            // Ví dụ: INSERT INTO loaisach (Maloai, Tenloai, Mota) VALUES ('$ml', '$tl', '$mota');
            $sql="INSERT INTO loaisach VALUES('$ml','$tl','$mota')";
			if(mysqli_query($con,$sql)){
                echo "nhap thanh cong";
            }else{
                echo "that bai";
            }
        }
        $rowCount++;
    }
    header('location:DanhSachLoaiSach.php');
}


mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once './header.php';
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td colspan="2">
                    <h4>Thông tin tìm kiếm loại sách</h4>
                </td>
            </tr>
            <tr>
                <td class="col1">Mã loại sách</td>
                <td class="col2">
                    <input type="text" name="txt_maloai">
                </td>
            </tr>
            <tr>
                <td class="col1">Tên loại sách</td>
                <td class="col2">
                    <input type="text" name="txt_tenloai">
                </td>
            </tr>
            <tr>
                <td class="col1"></td>
                <td class="col2">
                    <input type="submit" name="btnTim" value="Tìm kiếm">
                    <input type="submit" name="btnXuat" value="Xuất danh sách">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <!-- <form method="post" enctype="multipart/form-data"> -->
                        <input type="file" name="file" accept=".xlsx, .xls">
                        <button type="submit" name="btnImport">Import</button>
                    <!-- </form> -->

                </td>
            </tr>
        </table>
        <table border="1">
            <tr align="center">
                <th>STT</th>
                <TH>Mã loại sách</TH>
                <th>Tên loại sách</th>
                <th>Mô tả</th>
                <th></th>
            </tr>
            <?php
            if (isset($data) && $data != null) {
                $i = 0;
                while ($row = mysqli_fetch_array($data)) {
            ?>
                    <tr align="center">
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row['Maloai'] ?></td>
                        <td><?php echo $row['Tenloai'] ?></td>
                        <td><?php echo $row['Mota'] ?></td>
                        <td>
                            <a href="./Loaisach_sua.php?maloai=<?php echo $row['Maloai'] ?>"><img src="./Picture/but.jpg" alt="" width="20px" height="20px"></a> &nbsp;&nbsp;&nbsp;
                            <a href="./Loaisach_xoa.php?maloai=<?php echo $row['Maloai'] ?>"><img src="./Picture/xoa.png" alt="" width="20px" height="20px"></a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </form>
</body>

</html>