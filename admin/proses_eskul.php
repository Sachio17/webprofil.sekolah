<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form
$nama           = $_POST['nama'];
$deskripsi         = $_POST['deskripsi'];
$icon  = $_POST['icon'];


// menginput data ke database
mysqli_query(
    $koneksi,
    "insert into eskul values ('', '$nama', '$deskripsi', '$icon')"
);

// mengalihkan halaman kembali ke data_kontak.php
header("location:data_eskul.php");
?>