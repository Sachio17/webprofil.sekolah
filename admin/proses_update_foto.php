<?php
include '../koneksi.php';

$id = $_POST['id'];

if ($_FILES['foto']['name'] != '') {
    $nama_file = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
    $nama_baru = 'admin_' . time() . '.' . $ext;

    move_uploaded_file($tmp, "../upload/" . $nama_baru);

    mysqli_query($koneksi, "UPDATE admin SET foto='$nama_baru' WHERE id='$id'");
}

header("Location: profil_admin.php");
