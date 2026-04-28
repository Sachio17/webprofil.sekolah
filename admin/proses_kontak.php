<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form
$nama           = $_POST['nama'];
$email          = $_POST['email'];
$pesan          = $_POST['pesan'];
$tanggal_kirim  = $_POST['tanggal_kirim'];

$username = $_SESSION['username'];
// menginput data ke database
mysqli_query(
    $koneksi,
    "insert into kontak values ('', '$nama', '$email', '$pesan', '$tanggal_kirim')"
);

// mengalihkan halaman kembali ke data_kontak.php
header("location:data_kontak.php");
?>