<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form
$nama           = $_POST['nama'];
$angkatan         = $_POST['angkatan'];
$pesan  = $_POST['pesan'];


// menginput data ke database
mysqli_query(
    $koneksi,
    "insert into testimoni values ('', '$nama', '$angkatan', '$pesan')"
);

// mengalihkan halaman kembali ke data_kontak.php
header("location:data_testimoni.php");
?>