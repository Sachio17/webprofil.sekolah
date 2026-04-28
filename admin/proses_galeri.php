<?php
include '../koneksi.php';

$judul   = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$tanggal_upload = $_POST['tanggal_upload'];

// ambil gambar lama
$gambar = $_POST['gambar_lama'];

// kalau upload gambar baru
if(!empty($_FILES['gambar']['name'])){
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../gambar/".$gambar);
}
$username = $_SESSION['username'];

mysqli_query($koneksi, "
  INSERT INTO galeri (judul, deskripsi, gambar, tanggal_upload)
  VALUES ('$judul', '$deskripsi', '$gambar', '$tanggal_upload')
");

header("location:data_galeri.php");
?>
