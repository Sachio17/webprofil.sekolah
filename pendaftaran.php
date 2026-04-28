<?php
include 'koneksi.php';
if(isset($_POST['simpan'])){


    // ========================
    // DATA TEXT
    // ========================
    $nama_lengkap     = $_POST['nama_lengkap'];
    $nama_panggilan   = $_POST['nama_panggilan'];
    $ttl              = $_POST['ttl'];
    $jk               = $_POST['jk'];
    $agama            = $_POST['agama'];
    $kewarganegaraan  = $_POST['kewarganegaraan'];
    $ortu_nama        = $_POST['ortu_nama'];
    $ortu_status      = $_POST['ortu_status'];
    $no_hp            = $_POST['no_hp'];
    $asal_sekolah     = $_POST['asal_sekolah'];
    $nama_sekolah     = $_POST['nama_sekolah'];
    $tahun_lulus      = $_POST['tahun_lulus'];
    $sumber_info      = $_POST['sumber_info'];

    // ========================
    // FOLDER UPLOAD
    // ========================
    $uploadDir = "upload/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    function uploadFile($file, $uploadDir){
        if($file['error'] == 0){
            $namaBaru = time() . "_" . uniqid() . "_" . basename($file['name']);
            $target = $uploadDir . $namaBaru;
            move_uploaded_file($file['tmp_name'], $target);
            return $namaBaru;
        }
        return null;
    }

    $ktp      = uploadFile($_FILES['ktp'], $uploadDir);
    $kk       = uploadFile($_FILES['kk'], $uploadDir);
    $akta     = uploadFile($_FILES['akta'], $uploadDir);
    $ijazah   = uploadFile($_FILES['ijazah'], $uploadDir);
    $foto_2x3 = uploadFile($_FILES['foto_2x3'], $uploadDir);
    $foto_3x4 = uploadFile($_FILES['foto_3x4'], $uploadDir);

    // ========================
    // INSERT DATABASE
    // ========================
    $stmt = mysqli_prepare($koneksi,
        "INSERT INTO pendaftaran 
        (nama_lengkap,nama_panggilan,ttl,jk,agama,kewarganegaraan,
        ortu_nama,ortu_status,no_hp,asal_sekolah,nama_sekolah,
        tahun_lulus,ktp,kk,akta,ijazah,foto_2x3,foto_3x4,sumber_info)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
    );

    mysqli_stmt_bind_param($stmt,"sssssssssssssssssss",
        $nama_lengkap,
        $nama_panggilan,
        $ttl,
        $jk,
        $agama,
        $kewarganegaraan,
        $ortu_nama,
        $ortu_status,
        $no_hp,
        $asal_sekolah,
        $nama_sekolah,
        $tahun_lulus,
        $ktp,
        $kk,
        $akta,
        $ijazah,
        $foto_2x3,
        $foto_3x4,
        $sumber_info
    );

    if(mysqli_stmt_execute($stmt)){
        echo "<script>
                alert('Pendaftaran Berhasil!');
                window.location='pendaftaran.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Form Pendaftaran</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

<style>
/* ===== STYLE FORM ESTETIK ELEGAN ===== */

body {
    background: #f4f6f9;
    font-family: 'Poppins', sans-serif;
}

/* container form */
.form-container {
    background: #ffffff;
    padding: 30px;
    border-radius: 18px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

/* semua input */
.form-control,
.form-select,
textarea {
    border: 1.5px solid #d9dee7;
    border-radius: 12px;
    padding: 10px 14px;
    transition: all 0.3s ease;
    background-color: #f9fafc;
}

/* efek saat diklik (FOCUS) */
.form-control:focus,
.form-select:focus,
textarea:focus {
    border-color: #4f46e5;       /* ungu elegan */
    box-shadow: 0 0 0 3px rgba(79,70,229,0.15);
    background-color: #f9fafc;   /* tetap, tidak putih */
    outline: none;
}

/* placeholder */
.form-control::placeholder {
    color: #9aa4b2;
}

/* tombol */
.btn-elegan {
    background: linear-gradient(135deg, #4f46e5, #6366f1);
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 12px;
    font-weight: 500;
    transition: 0.3s;
}

.btn-elegan:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(79,70,229,0.3);
}

/* ===== NAVBAR PREMIUM ===== */

.premium-nav{
    background: rgba(255,255,255,0.75);
    backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(0,0,0,0.08);
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    padding: 12px 0;
}

.school-brand{
    font-size: 1.2rem;
    color: #1e3a8a !important;
    letter-spacing: 0.3px;
    transition: .3s;
}

.school-brand:hover{
    color:#4f46e5 !important;
    transform: translateY(-1px);
}

</style>
</head>

<body>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg premium-nav">
  <div class="container">
    <a class="navbar-brand fw-bold school-brand" href="#">
        🎓 SMK Luqman Al Hakim Kudus
    </a>
  </div>
</nav>


<!-- HERO -->
<section class="bg-light py-5 text-center">
  <div class="container">
    <h2 class="fw-bold">Penerimaan Peserta Didik Baru</h2>
    <p class="text-muted">Formulir Pendaftaran Online Tahun Ajaran 2026/2027</p>

    <!-- Progress -->
    <div class="progress mt-4" style="height:8px;">
      <div class="progress-bar bg-success" style="width: 100%;"></div>
    </div>
  </div>
</section>

<div class="container my-5">
<div class="main-card">

<form method="POST" enctype="multipart/form-data">

<div class="form-section">
<h4 class="section-title">Data Pribadi</h4>

<div class="row g-4">

<div class="col-md-6">
<div class="form-floating">
<input type="text" name="nama_lengkap" class="form-control elite-input" placeholder="Nama Lengkap" required>
<label>👤 Nama Lengkap *</label>
</div>
</div>

<div class="col-md-6">
<div class="form-floating">
<input type="text" name="nama_panggilan" class="form-control elite-input" placeholder="Nama Panggilan" required>
<label>🏷️ Nama Panggilan *</label>
</div>
</div>

<div class="col-md-6">
<div class="form-floating">
<input type="text" name="ttl" class="form-control elite-input" placeholder="TTL" required>
<label>📅 Tempat, Tanggal Lahir *</label>
</div>
</div>

<div class="col-md-6">
<label class="mb-2 fw-semibold">Jenis Kelamin *</label>
<div class="d-flex gap-4">
<div class="form-check">
<input class="form-check-input" type="radio" name="jk" value="Laki-laki" required>
<label class="form-check-label">Laki-laki</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="jk" value="Perempuan">
<label class="form-check-label">Perempuan</label>
</div>
</div>
</div>

<div class="col-md-6">
<div class="form-floating">
<select name="agama" class="form-select elite-input" required>
<option value="">Pilih</option>
<option>Islam</option>
<option>Non-Islam</option>
</select>
<label>🕌 Agama *</label>
</div>
</div>

<div class="col-md-6">
<div class="form-floating">
<select name="kewarganegaraan" class="form-select elite-input">
<option>WNI</option>
<option>WNI Keturunan</option>
<option>WNA</option>
</select>
<label>🌍 Kewarganegaraan *</label>
</div>
</div>

</div>
</div>

<hr class="my-5">

<h4 class="mb-4 fw-bold text-primary">Data Orang Tua / Wali</h4>

<div class="row g-4">

<div class="col-md-6">
<div class="form-floating">
<input type="text" name="ortu_nama" class="form-control elite-input" placeholder="Nama Ortu" required>
<label>👨‍👩‍👧 Nama Orang Tua *</label>
</div>
</div>

<div class="col-md-6">
<div class="form-floating">
<input type="text" name="no_hp" class="form-control elite-input" placeholder="No HP" required>
<label>📱 Nomor Handphone *</label>
</div>
</div>

<div class="col-md-6">
<div class="form-floating">
<select name="ortu_status" class="form-select elite-input">
<option>Orang Tua</option>
<option>Wali Siswa</option>
</select>
<label>Status *</label>
</div>
</div>

</div>

<hr class="my-5">

<h4 class="mb-4 fw-bold text-primary">Data Sekolah Sebelumnya</h4>

<div class="row g-4">

<div class="col-md-4">
<div class="form-floating">
<select name="asal_sekolah" class="form-select elite-input">
<option>SMP</option>
<option>MTS</option>
</select>
<label>🏫 Asal Sekolah *</label>
</div>
</div>

<div class="col-md-4">
<div class="form-floating">
<input type="text" name="nama_sekolah" class="form-control elite-input" placeholder="Nama Sekolah" required>
<label>Nama Sekolah *</label>
</div>
</div>

<div class="col-md-4">
<div class="form-floating">
<input type="number" name="tahun_lulus" class="form-control elite-input" placeholder="Tahun Lulus">
<label>Tahun Lulus</label>
</div>
</div>

</div>

<hr class="my-5">

<h4 class="mb-4 fw-bold text-primary">Informasi PPDB</h4>

<div class="mb-3">
    <label class="form-label">
        Darimana mendapatkan informasi mengenai PPDB Kudus?
    </label>

    <select class="form-select info-select" name="sumber_info" required>
        <option value="">Pilih</option>
        <option>Website</option>
        <option>Media Sosial (Instagram, Facebook, dll)</option>
        <option>Media Cetak (Banner, Brosur, dll)</option>
        <option>Teman, Saudara, dll</option>
        <option>Sekolah/Guru</option>
    </select>
</div>
<style>
    /* ===== DROPDOWN ESTETIK ===== */
/* ===== GLOBAL ===== */
body{
    background: linear-gradient(135deg,#eef2f7,#e8edf5);
    font-family:'Plus Jakarta Sans',sans-serif;
}

/* CARD UTAMA */
.main-card{
    background: rgba(255,255,255,0.85);
    backdrop-filter: blur(12px);
    border-radius: 22px;
    padding: 35px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    border: 1px solid rgba(255,255,255,0.5);
}

/* SECTION TITLE */
.section-title{
    font-weight: 700;
    color: #1e3a8a;
    margin-bottom: 25px;
}

/* INPUT PREMIUM */
.elite-input{
    border: 1.5px solid #dbe2ea;
    border-radius: 14px !important;
    background: #f8fafc;
    transition: all .3s ease;
    padding: 12px 14px;
}

.elite-input:focus{
    border-color: #4f46e5 !important;
    box-shadow: 0 0 0 4px rgba(79,70,229,0.15);
    background: #f8fafc;
    transform: translateY(-1px);
}

/* FLOATING LABEL */
.form-floating > label{
    color: #64748b;
    font-weight: 500;
}

/* RADIO */
.form-check-input{
    width: 18px;
    height: 18px;
    cursor: pointer;
}
.form-check-input:checked{
    background-color:#4f46e5;
    border-color:#4f46e5;
}

/* DROPDOWN KHUSUS INFORMASI */
.info-select{
    background:#f1f5f9;
    border:1.5px solid #d6dde8;
    border-radius:14px;
    padding:12px 14px;
    transition:.3s;
}

.info-select:focus{
    background:#f1f5f9;
    border-color:#4f46e5;
    box-shadow:0 0 0 4px rgba(79,70,229,.15);
}

.info-select option{
    background:#ffffff;
    padding:10px;
}

/* BUTTON PREMIUM */
.btn-elegan{
    width:100%;
    padding:14px;
    font-size:16px;
    font-weight:700;
    border:none;
    border-radius:14px;
    background: linear-gradient(135deg,#4f46e5,#6366f1);
    color:white;
    transition:.3s;
    box-shadow:0 8px 20px rgba(79,70,229,.25);
}

.btn-elegan:hover{
    transform: translateY(-3px);
    box-shadow:0 12px 25px rgba(79,70,229,.35);
}

/* GARIS PEMBATAS */
hr{
    border-top:1px dashed #cbd5e1;
}

/* HERO */
section{
    background: transparent !important;
}


</style>
<hr class="my-5">

<h4 class="mb-4 fw-bold text-primary">Upload Berkas Persyaratan</h4>

<div class="row g-4">

<div class="col-md-6">
<label class="form-label">📄 Upload KTP *</label>
<input type="file" name="ktp" class="form-control elite-input" accept="image/*,.pdf" required>
</div>

<div class="col-md-6">
<label class="form-label">📄 Upload KK *</label>
<input type="file" name="kk" class="form-control elite-input" accept="image/*,.pdf" required>
</div>

<div class="col-md-6">
<label class="form-label">📄 Upload Akta Kelahiran *</label>
<input type="file" name="akta" class="form-control elite-input" accept="image/*,.pdf" required>
</div>

<div class="col-md-6">
<label class="form-label">📄 Upload Ijazah / SKL *</label>
<input type="file" name="ijazah" class="form-control elite-input" accept="image/*,.pdf" required>
</div>

<div class="col-md-6">
<label class="form-label">📷 Pas Foto 2x3 *</label>
<input type="file" name="foto_2x3" class="form-control elite-input" accept="image/*" required>
</div>

<div class="col-md-6">
<label class="form-label">📷 Pas Foto 3x4 *</label>
<input type="file" name="foto_3x4" class="form-control elite-input" accept="image/*" required>
</div>

</div>

<button type="submit" name="simpan" class="btn-elegan">
🎓 Kirim Pendaftaran
</button>



</form>

</div>
</div>

</div>
</div>

</body>
</html>
