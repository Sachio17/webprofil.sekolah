<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form
$waktu           = $_POST['waktu'];
$kegiatan         = $_POST['kegiatan'];
$kategori  = $_POST['kategori'];


// menginput data ke database
mysqli_query(
    $koneksi,
    "insert into jadwal values ('', '$waktu', '$kegiatan', '$kategori')"
);

// mengalihkan halaman kembali ke data_kontak.php
header("location:data_jadwal.php");
?>