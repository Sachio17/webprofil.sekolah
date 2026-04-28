<?php
include "../koneksi.php";

$id = $_POST['id'];
$nama_guru = $_POST['nama_guru'];
$nip = $_POST['nip'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$mapel = $_POST['mapel'];
$foto = $_POST['foto'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];

// ambil gambar lama
$foto = $_POST['foto_lama'];

$username = $_SESSION['username'];

// kalau upload gambar baru
if(!empty($_FILES['foto']['name'])){
    $foto = $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], "../gambar/".$gambar);
}

mysqli_query($koneksi, "update guru set nama_guru='$nama_guru', nip='$nip', jenis_kelamin='$jenis_kelamin', mapel='$mapel', foto='$foto', email='$email', no_hp='$no_hp' WHERE id='$id'");

header("location:data_guru.php");
?>