<?php
include "../koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];
$tanggal_kirim = $_POST['tanggal_kirim'];

$username = $_SESSION['username'];

mysqli_query($koneksi, "update kontak set nama='$nama', email='$email', pesan='$pesan', tanggal_kirim='$tanggal_kirim' WHERE id='$id'");

header("location:data_kontak.php");
?>