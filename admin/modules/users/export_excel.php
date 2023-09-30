<?php 
require_once '../../plugins/excel/vendor/autoload.php'; 
require_once '../../config/connectdb.php'; 
global $conn;
if (isset($_POST['btnXuat'])) {
    $sql_data_user = "SELECT users.*, permissions.description FROM role_permission,users,permissions WHERE users.id = role_permission.user_id AND permissions.id = role_permission.permission_id";
    $data_user = $conn->query($sql_data_user);

    // require 'vendor/autoload.php'; // Đảm bảo đã đúng đường dẫn tới autoload.php của PhpSpreadsheet

    $objExcel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $objExcel->setActiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet()->setTitle('DSSV');
    $rowCount = 1;

    // Tạo tiêu đề cho cột trong excel
    $sheet->setCellValue('A' . $rowCount, 'Họ và tên');
    $sheet->setCellValue('B' . $rowCount, 'Email');
    $sheet->setCellValue('C' . $rowCount, 'Vai trò');

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
// echo "<script>window.location='?module=users';</script>";
?>