<?php
session_start();
include "../koneksi.php";

$nama_admin = $_POST['nama_admin'];
$username   = $_POST['username'];
$password   = $_POST['password'];


// SIMPAN DATA KE DATABASE
$query = mysqli_query($koneksi, "INSERT INTO admin (nama_admin, username, password)
VALUES ('$nama_admin','$username','$password')");

if($query){

    // BUAT SESSION SEPERTI LOGIN
    $_SESSION['status'] = "login";
    $_SESSION['username'] = $username;

    header("location:index.php");
    exit;

}else{
    echo "Register gagal";
}
?>
