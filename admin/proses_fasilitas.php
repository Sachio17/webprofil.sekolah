<?php
include '../koneksi.php';

$judul   = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];

// ambil gambar lama
$foto = $_POST['gambar_lama'];

// kalau upload gambar baru
if(!empty($_FILES['foto']['name'])){
    $foto = $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], "../gambar/".$foto);
}
$username = $_SESSION['username'];

mysqli_query($koneksi, "
  INSERT INTO fasilitas (judul, deskripsi, foto)
  VALUES ('$judul', '$deskripsi', '$foto')
");

header("location:data_fasilitas.php");
?>
