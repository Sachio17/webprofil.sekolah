<?php
include '../koneksi.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if(isset($_POST['kirim_balasan'])){

    $id       = $_POST['id'];
    $email    = $_POST['email'];
    $balasan  = $_POST['balasan'];

    // simpan ke database
    mysqli_query($koneksi,"UPDATE pesan 
                           SET balasan='$balasan',
                           status='dibalas'
                           WHERE id='$id'");

    // kirim email
    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'EMAIL_KAMU@gmail.com';
        $mail->Password   = 'APP_PASSWORD_GMAIL';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('EMAIL_KAMU@gmail.com', 'Admin Sekolah');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Balasan Pesan Dari Sekolah';
        $mail->Body    = $balasan;

        $mail->send();

        header("Location: data_kontak.php?status=sukses");

    } catch (Exception $e) {
        echo "Email gagal dikirim: {$mail->ErrorInfo}";
    }
}
?>
