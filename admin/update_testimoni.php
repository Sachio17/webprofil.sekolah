<?php
include '../koneksi.php';

$id   = $_POST['id'];
$nama           = $_POST['nama'];
$angkatan         = $_POST['angkatan'];
$pesan  = $_POST['pesan'];
// update database
mysqli_query($koneksi, "UPDATE testimoni SET
    nama='$nama',
    angkatan='$angkatan',
    pesan='$pesan'
    
    WHERE id='$id'
");

header("location:data_testimoni.php");
?>