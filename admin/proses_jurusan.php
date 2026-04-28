<?php
include "../koneksi.php";

$kode_jurusan   = $_POST['kode_jurusan'];
$nama_jurusan   = $_POST['nama_jurusan'];
$deskripsi      = $_POST['deskripsi'];
$keahlian       = $_POST['keahlian'];
$prospek_karir  = $_POST['prospek_karir'];

$gambar = $_FILES['gambar']['name'];
$tmp    = $_FILES['gambar']['tmp_name'];

move_uploaded_file($tmp, "../gambar/".$gambar);

mysqli_query($koneksi, "INSERT INTO jurusan
(kode_jurusan,nama_jurusan,deskripsi,keahlian,prospek_karir,gambar)
VALUES
('$kode_jurusan','$nama_jurusan','$deskripsi','$keahlian','$prospek_karir','$gambar')
");

header("Location: data_jurusan.php");
?>