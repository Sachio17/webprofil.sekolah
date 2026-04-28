<?php
include '../koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$tanggal = $_POST['tanggal'];
$penulis = $_POST['penulis'];

// ambil gambar lama
$gambar = $_POST['gambar_lama'];

// kalau upload gambar baru
if(!empty($_FILES['gambar']['name'])){
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../gambar/".$gambar);
}

$username = $_SESSION['username'];
// update database
mysqli_query($koneksi, "UPDATE berita SET
    judul='$judul',
    isi='$isi',
    gambar='$gambar',
    tanggal='$tanggal',
    penulis='$penulis'
    WHERE id='$id'
");

header("location:data_berita.php");
?>