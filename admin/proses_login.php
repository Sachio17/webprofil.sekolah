<?php
session_start();
include "../koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM admin 
WHERE username='$username' AND password='$password'");

$data = mysqli_fetch_assoc($query);
$cek  = mysqli_num_rows($query);

if ($cek > 0) {

    $_SESSION['status'] = "login";
    $_SESSION['username'] = $data['username'];

    header("location:hal_admin.php");
    exit;

} else {
    header("location:index.php?pesan=gagal");
    exit;
}
?>
