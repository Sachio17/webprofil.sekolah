<?php
include '../koneksi.php';

$judul_video = $_POST['judul_video'];
$video = $_POST['video'];
$tanggal = $_POST['tanggal'];


$username = $_SESSION['username'];
// update database
mysqli_query($koneksi, "UPDATE berita SET
    judul_video='$judul_video',
    video='$video',
    tanggal='$tanggal'
    WHERE id='$id'
");

header("location:data_video.php");
?>