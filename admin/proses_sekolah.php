<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form
$nama_sekolah           = $_POST['nama_sekolah'];
$npsn         = $_POST['npsn'];
$alamat          = $_POST['alamat'];
$desa  = $_POST['desa'];
$kecamatan  = $_POST['kecamatan'];
$kabupaten           = $_POST['kabupaten'];
$provinsi         = $_POST['provinsi'];
$email          = $_POST['email'];
$telepon  = $_POST['telepon'];
$website  = $_POST['website'];
$kepala_sekolah           = $_POST['kepala_sekolah'];
$logo  = $_POST['logo'];
$visi         = $_POST['visi'];
$misi          = $_POST['misi'];
$deskripsi  = $_POST['deskripsi'];

$logo = $_FILES['logo']['name'];
$tmp    = $_FILES['logo']['tmp_name'];

move_uploaded_file($tmp, "../gambar/".$logo);

$username = $_SESSION['username'];


// menginput data ke database
mysqli_query(
    $koneksi,
    "insert into profil_sekolah values ('', '$nama_sekolah', '$npsn', '$alamat', '$desa', '$kecamatan', '$kabupaten', '$provinsi', '$email', '$telepon', '$website', '$kepala_sekolah','$logo','$visi', '$misi', '$deskripsi')"
);

// mengalihkan halaman kembali ke data_kontak.php
header("location:data_sekolah.php");
?>