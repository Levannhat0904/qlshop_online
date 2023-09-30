<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'plugins/PHPMailer/src/Exception.php';
require 'plugins/PHPMailer/src/PHPMailer.php';
require 'plugins/PHPMailer/src/SMTP.php';
$email = '';
if (isset($_POST['btn_getpass'])) {
    $email = $_POST['email'];
}
$users = search_data('users', $email, 'email');
// print_r($users);
if ($users->num_rows != 0) {
    $username = 'Joe User'; // Thay thế bằng thông tin thực tế của người dùng
    $newPassword = 'new_password';
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function

    //Load Composer's autoloader
    // require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                    //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'lenhat.6868686868@gmail.com';                     //SMTP username
        $mail->Password   = 'ihvi lxes dyox nwrr';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('lenhat.6868686868@gmail.com', 'Mailer');
        $mail->addAddress($email, 'Joe User');     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        // Read HTML content from a file
        $htmlFilePath = 'modules/users/layout_mail.php';
        $htmlBody = file_get_contents($htmlFilePath);
        // Thay thế giá trị của biến trong nội dung email
        $htmlBody = str_replace('<?php echo $username; ?>', $username, $htmlBody);
        $htmlBody = str_replace('<?php echo $newPassword; ?>', $newPassword, $htmlBody);
        // Assign the HTML content to the email body
        $mail->Body = $htmlBody;
        // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        // echo 'Message has been sen'; 
        echo "<script>alert('Chúng tôi đã gửi mã xác nhận đến email của bạn')</script>";
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo "<script>alert('Thông tin mail không hợp lệ hoặc không tồn tại trên hệ thống')</script>";
    }
} else {
    echo "<script>alert('Không tìm thấy email trong hệ thống')</script>";
}
echo "<script>window.location.href = '?mod=users&act=getpass'</script>";
