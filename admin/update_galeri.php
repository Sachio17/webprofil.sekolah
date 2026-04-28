
<?php
include "../koneksi.php";

$id =$_POST['id'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$tanggal_upload = $_POST['tanggal_upload'];

// ambil gambar lama
$gambar = $_POST['gambar_lama'];

$username = $_SESSION['username'];

// kalau upload gambar baru
if(!empty($_FILES['gambar']['name'])){
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../gambar/".$gambar);
}
mysqli_query($koneksi, "update galeri set judul='$judul', deskripsi='$deskripsi', gambar='$gambar', tanggal_upload='$tanggal_upload' WHERE id='$id'");

header("location:data_galeri.php");
?>