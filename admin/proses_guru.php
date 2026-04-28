<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form
$nama_guru        = $_POST['nama_guru'];
$nip         = $_POST['nip'];
$jenis_kelamin          = $_POST['jenis_kelamin'];
$mapel  = $_POST['mapel'];
$email  = $_POST['email'];
$no_hp  = $_POST['no_hp'];


// ambil gambar lama
$foto = $_POST['foto'];

// kalau upload gambar baru
if(!empty($_FILES['foto']['name'])){
    $foto = $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], "../gambar/".$gambar);
}
$username = $_SESSION['username'];

// menginput data ke database
mysqli_query(
    $koneksi,
    "insert into guru values ('', '$nama_guru', '$nip', '$jenis_kelamin', '$mapel', '$foto', '$email', '$no_hp')"
);


// mengalihkan halaman kembali ke data_kontak.php
header("location:data_guru.php");
?>