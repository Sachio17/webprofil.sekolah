<?php
include "../koneksi.php";

$id = $_POST['id'];
$nama_sekolah = $_POST['nama_sekolah'];
$npsn = $_POST['npsn'];
$alamat = $_POST['alamat'];
$desa = $_POST['desa'];
$kecamatan = $_POST['kecamatan'];
$kabupaten = $_POST['kabupaten'];
$provinsi = $_POST['provinsi'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$website = $_POST['website'];
$kepala_sekolah = $_POST['kepala_sekolah'];
$visi = $_POST['visi'];
$misi = $_POST['misi'];
$deskripsi = $_POST['deskripsi'];
$video_kegiatan = $_POST['video_kegiatan'];

// ambil gambar lama
$logo = $_POST['logo_lama'];

$username = $_SESSION['username'];

// kalau upload gambar baru
if(!empty($_FILES['logo']['name'])){
    $logo = $_FILES['logo']['name'];
    move_uploaded_file($_FILES['logo']['tmp_name'], "../gambar/".$logo);
}




mysqli_query($koneksi, "UPDATE profil_sekolah SET
nama_sekolah='$nama_sekolah',
npsn='$npsn',
alamat='$alamat',
desa='$desa',
kecamatan='$kecamatan',
kabupaten='$kabupaten',
provinsi='$provinsi',
email='$email',
telepon='$telepon',
website='$website',
kepala_sekolah='$kepala_sekolah',
logo='$logo',
visi='$visi',
misi='$misi',
deskripsi='$deskripsi',
video_kegiatan='$video_kegiatan'
WHERE id='$id'");

header("location:data_sekolah.php");
?>