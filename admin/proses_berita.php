<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form
$judul           = $_POST['judul'];
$isi         = $_POST['isi'];
$tanggal  = $_POST['tanggal'];
$penulis  = $_POST['penulis'];


// ambil gambar lama
$gambar = $_POST['gambar_lama'];

// kalau upload gambar baru
if(!empty($_FILES['gambar']['name'])){
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../gambar/".$gambar);
}
$username = $_SESSION['username'];

// menginput data ke database
mysqli_query(
    $koneksi,
    "insert into berita values ('', '$judul', '$isi', '$gambar', '$tanggal', '$penulis')"
);

// mengalihkan halaman kembali ke data_kontak.php
header("location:data_berita.php");
?>