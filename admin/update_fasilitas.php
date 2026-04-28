
<?php
include "../koneksi.php";

$id =$_POST['id'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];

// ambil gambar lama
$foto = $_POST['gambar_lama'];

$username = $_SESSION['username'];

// kalau upload gambar baru
if(!empty($_FILES['foto']['name'])){
    $foto = $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], "../gambar/".$foto);
}
mysqli_query($koneksi, "update fasilitas set judul='$judul', deskripsi='$deskripsi', foto='$foto' WHERE id='$id'");

header("location:data_fasilitas.php");
?>