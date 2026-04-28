<?php
include '../koneksi.php';

$id   = $_POST['id'];
$waktu           = $_POST['waktu'];
$kegiatan         = $_POST['kegiatan'];
$kategori  = $_POST['kategori'];
// update database
mysqli_query($koneksi, "UPDATE jadwal SET
    waktu='$waktu',
    kegiatan='$kegiatan',
    kategori='$kategori'
    
    WHERE id='$id'
");

header("location:data_jadwal.php");
?>