<?php
include '../koneksi.php';

$id   = $_POST['id'];
$nama           = $_POST['nama'];
$deskripsi         = $_POST['deskripsi'];
$icon  = $_POST['icon'];
// update database
mysqli_query($koneksi, "UPDATE eskul SET
    nama='$nama',
    deskripsi='$deskripsi',
    icon='$icon'
    WHERE id='$id'
");

header("location:data_eskul.php");
?>