<?php
include "../koneksi.php";

$id              = $_POST['id'];
$kode_jurusan    = $_POST['kode_jurusan'];
$nama_jurusan    = $_POST['nama_jurusan'];
$deskripsi       = $_POST['deskripsi'];
$keahlian        = $_POST['keahlian'];
$prospek_karir   = $_POST['prospek_karir'];

$gambar = $_POST['gambar_lama']; // ambil gambar lama

// Kalau upload gambar baru
if(!empty($_FILES['gambar']['name'])){

    // hapus gambar lama
    if(file_exists("../gambar/".$gambar)){
        unlink("../gambar/".$gambar);
    }

    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../gambar/".$gambar);
}

mysqli_query($koneksi, "UPDATE jurusan SET
    kode_jurusan   = '$kode_jurusan',
    nama_jurusan   = '$nama_jurusan',
    deskripsi      = '$deskripsi',
    keahlian       = '$keahlian',
    prospek_karir  = '$prospek_karir',
    gambar         = '$gambar'
WHERE id='$id'
");

header("location:data_jurusan.php");
?>