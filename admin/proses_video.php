<?php
include "../koneksi.php";

$judul = $_POST['judul_video'];
$video = $_POST['video'];
$tanggal = $_POST['tanggal'];

mysqli_query($koneksi,"INSERT INTO video_kegiatan
VALUES('','$judul_video','$video','$tanggal')");

header("location:data_video.php");
?>