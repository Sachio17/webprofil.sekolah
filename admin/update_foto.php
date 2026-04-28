<?php
session_start();
include "../koneksi.php";

$username = $_SESSION['username'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

move_uploaded_file($tmp, "../gambar/" . $foto);


mysqli_query($koneksi, "UPDATE admin SET foto='$foto' WHERE username='$username'");

header("Location: profil_admin.php");
