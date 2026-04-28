<?php
include "../koneksi.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

// cek id
if (!isset($_GET['id'])) {
    header("Location: data_kontak.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM pesan WHERE id='$id'");
$p = mysqli_fetch_assoc($data);

if (!$p) {
    header("Location: data_kontak.php");
    exit;
}
?>

<?php
include "template/header.php";
include "template/menu.php";
?>

<main class="app-main">
<div class="app-content">
<div class="container-fluid">

<div class="card">
<div class="card-body">

<table class="table table-bordered">
<tr>
<th width="200">Nama</th>
<td><?= htmlspecialchars($p['nama']); ?></td>
</tr>

<tr>
<th>Email</th>
<td><?= htmlspecialchars($p['email']); ?></td>
</tr>

<tr>
<th>Pesan</th>
<td><?= nl2br(htmlspecialchars($p['isi'])); ?></td>
</tr>
</table>

<form method="POST">
<textarea name="balasan" class="form-control" rows="5" required><?= $p['balasan']; ?></textarea>

<br>
<button type="submit" name="kirim" class="btn btn-primary">
Kirim Balasan
</button>

</form>

</div>
</div>

</div>
</div>
</main>

<?php

if (isset($_POST['kirim'])) {

$balasan = mysqli_real_escape_string($koneksi, $_POST['balasan']);

$update = mysqli_query($koneksi,
"UPDATE pesan SET balasan='$balasan', status='dibalas' WHERE id='$id'"
);

if ($update) {

$mail = new PHPMailer(true);

try {

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'mfrmdhn88@gmail.com';
$mail->Password = 'ohvcdjskmtevephs';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->CharSet = 'UTF-8';

$mail->setFrom('mfrmdhn88@gmail.com', 'Admin Sekolah');
$mail->addAddress($p['email'], $p['nama']);

$mail->isHTML(true);
$mail->Subject = 'Balasan Admin Sekolah';

$mail->Body = "
Halo {$p['nama']} <br><br>
$balasan <br><br>
Admin Sekolah
";

$mail->SMTPDebug = 2;

$mail->send();

echo "<script>
alert('Balasan berhasil dikirim');
window.location='data_kontak.php';
</script>";

} catch (Exception $e) {

echo "Email gagal dikirim: " . $mail->ErrorInfo;

}

}
}

include "template/footer.php";
?>
