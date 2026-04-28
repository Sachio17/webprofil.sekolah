<?php
include 'koneksi.php';

if(isset($_POST['kirim'])){
  $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
  $email = mysqli_real_escape_string($koneksi, $_POST['email']);
  $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);

  mysqli_query($koneksi,"INSERT INTO pesan 
  (nama,email,tanggal,isi,status)
  VALUES
  ('$nama','$email',CURDATE(),'$pesan','baru')");

  session_start();
  $_SESSION['success'] = true;
  header("Location: index.php#kontak");
  exit();
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SMK LUQMAN AL HAKIM KUDUS</title>
 <link rel="icon" type="image/png" href="gambar/hid.png">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">


</head>
<body>


<!-- HEADER -->
<header class="navbar">
  <div class="container">
    <h1 class="school-name">SMK LUQMAN AL HAKIM </h1>
    <nav class="nav-menu">
      <a href="#home" class="modern-btn">Home</a>
      <a href="#about" class="modern-btn">Profil</a>
      <a href="#guru" class="modern-btn">Guru</a>
      <a href="#news" class="modern-btn">Berita</a>
       <a href="#program" class="modern-btn">Jurusan</a>

      <a href="#fasilitas" class="modern-btn">Fasilitas</a>
      <a href="#eskul" class="modern-btn">Eskul</a>
      <a href="#galeri" class="modern-btn">Galeri</a>
      <a href="#contact" class="modern-btn">Kontak</a>

    </nav>

  </div>
</header>
 <div class="running-text">
  <p>📢 SPMB 2026 Sudah Dibuka | 🏆 Juara LKS Tingkat Kabupaten | 🎓 Alumni Diterima di PTN Favorit</p>
</div>
<style>.running-text{
  background:#16a34a;
  color:white;
  overflow:hidden;
  white-space:nowrap;
}

.running-text p{
  display:inline-block;
  padding:10px 0;
  animation:marquee 15s linear infinite;
}

@keyframes marquee{
  from{transform:translateX(100%);}
  to{transform:translateX(-100%);}
}</style>
<style>
  .hero {
  position: relative;
  height: 90vh;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  color: white;
  background: linear-gradient(rgba(15,23,42,0.75),rgba(15,23,42,0.75)),
              url('gambar/Gerbang2.jpg') center/cover no-repeat;
}

.hero-content h2 {
  font-size: 42px;
  font-weight: 800;
  letter-spacing: 1px;
}

.hero-content p {
  font-size: 18px;
  margin-top: 10px;
  opacity: .9;
}
  /* NAVBAR FLOATING */
.navbar {
  width: 100%;
  margin: 0;
  border-radius: 0;   /* supaya tidak kepotong */
}
.container {
  max-width: 1400px;
}
.modern-btn {
  padding: 8px 14px;
  font-size: 14px;
}

/* Sticky effect */
.navbar.fixed-top {
  margin-top: 8px;
}

/* LOGO */
.navbar-brand {
  font-weight: 800;
  color: #16a34a !important;
  letter-spacing: 0.5px;
}

/* MENU */
.navbar-nav .nav-link {
  font-weight: 600;
  color: #374151 !important;
  padding: 10px 16px;
  border-radius: 10px;
  transition: .25s ease;
}

/* Hover menu */
.navbar-nav .nav-link:hover {
  background: rgba(22, 163, 74, 0.12);
  color: #16a34a !important;
}

/* Active menu */
.navbar-nav .nav-link.active {
  background: #16a34a;
  color: white !important;
}

/* Shadow on scroll */
.navbar.scrolled {
  box-shadow: 0 14px 40px rgba(0,0,0,0.18);
}

</style>

<!-- HERO -->
<section id="home" class="hero">
  <div class="hero-content">
    <div class="logo-stack">
  <img src="gambar/hid.png" class="logo-top">
    <h2>BOARDING SCHOOL & FULLDAY SCHOOL </h2>
    <p>PROGRAM KEAHLIAN PPLG (PENGEMBANGAN PERANGKAT LUNAK DAN GIM)</p>
  </div>
</section>
<section class="stats-modern">
  <div class="stats-container">

    <div class="stat-box">
      <div class="stat-icon">🎓</div>
      <h2 class="counter" data-target="50">0</h2>
      <span class="plus">+</span>
      <p>Siswa Aktif</p>
    </div>

    <div class="stat-box">
      <div class="stat-icon">👨‍🏫</div>
      <h2 class="counter" data-target="15">0</h2>
      <span class="plus">+</span>
      <p>Guru & Staff</p>
    </div>

    <div class="stat-box">
      <div class="stat-icon">🏆</div>
      <h2 class="counter" data-target="30">0</h2>
      <span class="plus">+</span>
      <p>Prestasi</p>
    </div>

    <div class="stat-box">
      <div class="stat-icon">📅</div>
      <h2 class="counter" data-target="12">0</h2>
      <span class="plus">+</span>
      <p>Tahun Berdiri</p>
    </div>

  </div>
</section>
<style>

  .stats-modern {
  padding: 110px 20px;
  background: linear-gradient(135deg,#0f172a,#1e3a8a);
  color: white;
  text-align: center;
}

.stats-container {
  max-width: 1200px;
  margin: auto;
  display: grid;
  grid-template-columns: repeat(auto-fit,minmax(220px,1fr));
  gap: 40px;
}

.stat-box {
  background: rgba(255,255,255,0.08);
  padding: 45px 20px;
  border-radius: 25px;
  backdrop-filter: blur(12px);
  transition: .4s ease;
  position: relative;
  overflow: hidden;
}

.stat-box:hover {
  transform: translateY(-12px);
  background: rgba(255,255,255,0.15);
}

.stat-icon {
  font-size: 42px;
  margin-bottom: 15px;
}

.counter {
  font-size: 48px;
  font-weight: 800;
  color: #22c55e;
  display: inline-block;
  text-shadow: 0 0 15px rgba(34,197,94,0.7);
}

.plus {
  font-size: 30px;
  font-weight: bold;
  color: #22c55e;
  margin-left: 3px;
  text-shadow: 0 0 12px rgba(34,197,94,0.7);
}

.stat-box p {
  margin-top: 10px;
  font-size: 16px;
  opacity: .9;
}
</style>

<?php
             include 'koneksi.php';
             
             $tampil= mysqli_query($koneksi, "select* from profil_sekolah");
             while($hasil = mysqli_fetch_array($tampil)){
               ?>
<!-- PROFIL -->
<section id="about" class="section">
  <h2 class="title-gradient">Profil Sekolah</h2>

 
</div>
<div class="profil-container">

    <div class="profil-atas">
<div class="logo-sekolah">
            <img src="gambar/<?php echo $hasil['logo']; ?>" alt="Logo Sekolah">
   <div class="data-sekolah">
   <p>Sekolah : <?php echo $hasil['nama_sekolah']; ?></p>
   <p>NPSN : <?php echo $hasil['npsn']; ?></p>
   <p>Alamat : <?php echo $hasil['alamat']; ?></p>
   <p>Desa  : <?php echo $hasil['desa']; ?></p>
   <p>Kecamatan  : <?php echo $hasil['kecamatan']; ?></p>
   <p>Kabupaten  : <?php echo $hasil['kabupaten']; ?></p>
   <p>Provinsi  : <?php echo $hasil['provinsi']; ?></p>
   <p>Email  : <?php echo $hasil['email']; ?></p>
   <p>Telepon : <?php echo $hasil['telepon']; ?></p>
   <p>Website : <?php echo $hasil['website']; ?></p>
   <p>Kepala sekolah : <?php echo $hasil['kepala_sekolah']; ?></p>
  
 </div>
</div>
      <div class="video-sekolah">
  <iframe width="560" height="315" src="https://www.youtube.com/embed/9kjiEU0zw-4?si=qADfDzWw0JS1LeYn" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
    
  </iframe>
</div>
</div>
</div>
 </section>
<?php
}
?>

<style>
.title-gradient {
  text-align: center;
  font-size: 30px;
  font-weight: 800;
  margin-bottom: 50px;
  position: relative;
  display: inline-block;
}

.title-gradient::after {
  content: "";
  display: block;
  width: 60%;
  height: 4px;
  margin: 10px auto 0;
  border-radius: 10px;
  background: linear-gradient(90deg,#16a34a,#2563eb);
}
</style>
<?php
             include 'koneksi.php';
             
             $tampil= mysqli_query($koneksi, "select* from profil_sekolah");
             while($hasil = mysqli_fetch_array($tampil)){
               ?>
<section class="tentang-sekolah">
  <div class="tentang-container">

    <div class="tentang-gambar">
      <img src="gambar/Gerbang2.jpg" alt="SMK Luqman Al Hakim">
    </div>

    <div class="tentang-text">
      <h2>Tentang SMK Luqman Al Hakim Kudus</h2>

          <p><?php echo $hasil['deskripsi']; ?></p>

    

      <div class="program-unggulan">

        <div class="program-item">
          💻 Pendidikan IT Berbasis Industri
        </div>

        <div class="program-item">
          📖 Program Tahfidz Al-Qur'an
        </div>


      </div>

  

    </div>

  </div>
</section>
<?php
}
?>
<style>
  .tentang-sekolah{
  padding:100px 20px;
  background:#f8fafc;
}

.tentang-container{
  max-width:1200px;
  margin:auto;
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:60px;
  align-items:center;
}

/* GAMBAR */

.tentang-gambar img{
  width:100%;
  border-radius:20px;
  box-shadow:0 20px 40px rgba(0,0,0,0.15);
}

/* TEXT */

.tentang-text h2{
  font-size:36px;
  margin-bottom:20px;
  color:#0f172a;
}

.tentang-text p{
  color:#475569;
  line-height:1.7;
  margin-bottom:18px;
}

/* PROGRAM */

.program-unggulan{
  margin-top:20px;
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:15px;
}

.program-item{
  background:white;
  padding:12px 15px;
  border-radius:12px;
  box-shadow:0 5px 15px rgba(0,0,0,0.08);
  font-weight:500;
}

/* BUTTON */

.btn-profil{
  display:inline-block;
  margin-top:25px;
  padding:12px 25px;
  background:#1e3a8a;
  color:white;
  border-radius:30px;
  text-decoration:none;
  font-weight:600;
  transition:.3s;
}

.btn-profil:hover{
  background:#0f172a;
  transform:translateY(-3px);
}
@media(max-width:768px){

.tentang-container{
  grid-template-columns:1fr;
}

.program-unggulan{
  grid-template-columns:1fr;
}

}
</style>
<?php
             include 'koneksi.php';
             
             $tampil= mysqli_query($koneksi, "select* from profil_sekolah");
             while($hasil = mysqli_fetch_array($tampil)){
               ?>
<!-- VISI MISI -->
<section id="visi" class="section gray">
<h2 class="title-gradient">Visi & Misi</h2>


  <div class="grid">
    <div class="card">
      <h3>Visi</h3>
      <p><?php echo $hasil['visi']; ?></p>
    </div>
    <div class="card">
      <h3>Misi</h3>
      <ul class="list">
<?php
$lines = explode("\n", $hasil['misi']);
foreach ($lines as $line) {
    if (trim($line) != '') {
        echo "<li>$line</li>";
    }
}
?>
    </div>
  </div>
</section>
<?php
}
?>

<?php
include 'koneksi.php';
$tampil = mysqli_query($koneksi, "SELECT * FROM guru");
?>
<!-- GURU -->
<section id="guru" class="section gray">
   <h2 class="title-gradient">Data Guru</h2>

    <div class="grid">
        <?php while ($hasil = mysqli_fetch_assoc($tampil)) { ?>
            <div class="teacher-card" onclick="openModal(
  '<?php echo $hasil['foto']; ?>',
  '<?php echo $hasil['nama_guru']; ?>',
  '<?php echo $hasil['nip']; ?>',
  '<?php echo $hasil['jenis_kelamin']; ?>',
  '<?php echo $hasil['mapel']; ?>',
  '<?php echo $hasil['email']; ?>',
  '<?php echo $hasil['no_hp']; ?>'
)">

                <img src="gambar/<?php echo $hasil['foto']; ?>">
                <h3><?php echo $hasil['nama_guru']; ?></h3>
                <p><?php echo $hasil['mapel']; ?></p>

                <button class="btn-detail">Lihat Detail</button>
            </div>
        <?php } ?>
    </div>
</section>
<style>
   .section.gray {
  background: none !important;
}
</style>

<!-- MODAL POPUP -->
<div id="guruModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">×</span>

    <h2 class="modal-title">📘 Data Guru</h2>

    <img id="modalFoto">
    <h3 id="modalNama"></h3>
    <p id="modalNIP"></p>
    <p id="modalJenisKelamin"></p>
    <p id="modalMapel"></p>
    <p id="modalEmail"></p>
    <p id="modalNoHp"></p>
  </div>
</div>
<style>
  /* Guru Card */
.teacher-card {
  background: white;
  border-radius: 18px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.12);
  padding: 15px;
  text-align: center;
  transition: .3s;
  cursor: pointer;
}

.teacher-card:hover {
  transform: translateY(-6px);
}

.teacher-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 12px;
}

.btn-detail {
  margin-top: 10px;
  padding: 8px 14px;
  background: linear-gradient(135deg,#2563eb,#22c55e);
  color: white;
  border-radius: 8px;
  border: none;
}

/* Modal Popup */
.modal {
  display: none;
  position: fixed;
  z-index: 999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.6);
  backdrop-filter: blur(6px);
}

.modal-content {
  background: white;
  max-width: 420px;
  margin: 8% auto;
  padding: 25px;
  border-radius: 18px;
  text-align: center;
  animation: fadeIn .3s ease;
}

.modal-content img {
  width: 100%;
  height: 220px;
  object-fit: cover;
  border-radius: 12px;
  margin-bottom: 12px;
}
.modal-title {
  font-size: 22px;
  font-weight: 700;
  margin-bottom: 12px;
  color: #444;
  text-align: center;
}


.close {
  float: right;
  font-size: 22px;
  cursor: pointer;
}

/* Animation */
@keyframes fadeIn {
  from {opacity: 0; transform: scale(.9);}
  to {opacity: 1; transform: scale(1);}
}

</style>


<?php
include 'koneksi.php';
$tampil = mysqli_query($koneksi, "SELECT * FROM berita");
?>
<!-- BERITA -->
<section id="news" class="section gray">
  <h2 class="title-gradient">Berita Terbaru</h2>

  <div class="grid">
    <?php while ($hasil = mysqli_fetch_assoc($tampil)) { ?>

    <div class="news-card">
        <img src="gambar/<?php echo $hasil['gambar']; ?>">

        <div class="news-content">
            <h3><?php echo $hasil['judul']; ?></h3>
           
             <p><?php echo $hasil['penulis']; ?></p>
            <small>📅 <?= date('d M Y', strtotime($hasil['tanggal'])); ?></small>

<button class="btn-read" onclick="openBeritaModal(
  '<?php echo $hasil['judul']; ?>',
  '<?php echo $hasil['gambar']; ?>',
  '<?php echo date('d M Y', strtotime($hasil['tanggal'])); ?>',
  '<?php echo $hasil['penulis']; ?>',
  `<?php echo addslashes($hasil['isi']); ?>`
)">Baca Selengkapnya</button>

        </div>
    </div>

    <?php } ?>
  </div>
</section>
<style>
  .news-card {
  background: white;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 12px 30px rgba(0,0,0,0.08);
  transition: .3s;
}

.news-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 18px 45px rgba(0,0,0,0.15);
}

.news-card img {
  height: 220px;
  object-fit: cover;
}

.news-content {
  padding: 20px;
}
#news {
 background: none !important;
</style>

<div id="beritaModal" class="modal">
  <div class="modal-content berita-modal">
    <span class="close" onclick="closeBeritaModal()">×</span>

    <h2 id="modalJudulBerita" class="modal-title"></h2>
    <small id="modalTanggalBerita"></small>

    <img id="modalGambarBerita">

    <p id="modalPenulisBerita"></p>
    <p id="modalIsiBerita" class="modal-text"></p>
  </div>
</div>
<style>

#modalGambarBerita {
  display: block;
  margin: 16px auto 20px auto; /* CENTER */
  width: 100%;
  height: auto;
  max-height: 600px;
  object-fit: contain; /* biar tidak kepotong */
  border-radius: 18px;
}


  .berita-modal {
  max-width: 950px;
  text-align: left;
}

 #modalGambarBerita {
  width: auto;
  height: auto;
  max-height: 600px;
  object-fit: cover;
  border-radius: 18px;
}

.modal-text {
  line-height: 1.7;
  font-size: 15px;
}

</style>
<section id="video" class="section">
  <h2 class="title-gradient">Video Kegiatan Sekolah</h2>
      <p>Dokumentasi kegiatan siswa SMK Luqman Al Hakim Kudus</p>
  <div class="program-container">




    <div class="video-grid">

<?php
include "koneksi.php";
$data = mysqli_query($koneksi,"SELECT * FROM video_kegiatan");
while($d=mysqli_fetch_array($data)){
?>

      <div class="video-card">
        <div class="video-frame">
          <iframe src="<?php echo $d['video']; ?>" allowfullscreen></iframe>
        </div>
        <h4><?php echo $d['judul_video']; ?></h4>
      </div>

     

<?php } ?>

    </div>
  </div>
</section>
<style>
 .program-container {
  background: white;
  padding: 40px;
  border-radius: 28px;
  box-shadow: 0 20px 50px rgba(0,0,0,0.08);
}
  .video-kegiatan{
padding:80px 20px;
background:#f5f7fb;
}

.video-header{
text-align:center;
margin-bottom:50px;
}

.video-header h2{
font-size:32px;
font-weight:700;
color:#1e293b;
}

.video-header p{
color:#64748b;
}

.video-grid{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:25px;
}

.video-card{
background:white;
border-radius:10px;
overflow:hidden;
box-shadow:0 6px 15px rgba(0,0,0,0.08);
transition:0.3s;
}

.video-card:hover{
transform:translateY(-6px);
box-shadow:0 10px 20px rgba(0,0,0,0.15);
}

.video-frame iframe{
width:100%;
height:180px;
}

.video-card h4{
text-align:center;
padding:12px;
font-size:16px;
color:#1e293b;
}
</style>

<?php
include "koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM jurusan");

while($row = mysqli_fetch_assoc($data)):
?>

<section id="program" class="section">
  <h2 class="title-gradient">Program Unggulan</h2>
  <div class="program-container">

    <div class="program-text">
      <h3><?= $row['kode_jurusan']; ?></h3>
      <h4><?= $row['nama_jurusan']; ?></h4>

      <p><?= $row['deskripsi']; ?></p>

      <ul class="program-list">
        <?php
        $keahlian = explode("|", $row['keahlian']);
        foreach($keahlian as $k):
        ?>
          <li><?= $k; ?></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="program-image">
      <img src="gambar/<?= $row['gambar']; ?>" alt="">
    </div>

  </div>

  <div class="program-career">
    <h4>Prospek Karir Lulusan</h4>
    <div class="career-grid">
      <?php
      $karir = explode("|", $row['prospek_karir']);
      foreach($karir as $k):
      ?>
        <div><?= $k; ?></div>
      <?php endforeach; ?>
    </div>
  </div>

</section>

<?php endwhile; ?>


<style>
  .program-container {
  background: white;
  padding: 40px;
  border-radius: 28px;
  box-shadow: 0 20px 50px rgba(0,0,0,0.08);
}

.program-text h3 {
  font-size: 34px;
}

.program-career div {
  font-weight: 600;
  background: linear-gradient(135deg,#f0fdf4,#dbeafe);
}
  
  .program-list {
  list-style: disc;
  padding-left: 20px;
}
  .program-container {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 40px;
  max-width: 1100px;
  margin: 40px auto;
}

.program-text {
  flex: 1;
}

.program-text h3 {
  font-size: 32px;
  color: #16a34a;
  font-weight: 800;
}

.program-text h4 {
  font-size: 18px;
  color: #444;
  margin-bottom: 15px;
}

.program-text p {
  color: #555;
  margin-bottom: 20px;
}

.program-list {
  list-style: none;
  padding: 0;
  margin-bottom: 25px;
}

.program-list li {
  margin-bottom: 10px;
  font-size: 15px;
}

.btn-program {
  display: inline-block;
  padding: 12px 25px;
  background: #16a34a;
  color: white;
  border-radius: 30px;
  text-decoration: none;
  font-weight: 600;
  transition: 0.3s;
}

.btn-program:hover {
  background: #0f7a35;
}

.program-image {
  flex: 1;
  text-align: center;
}

.program-image img {
  width: 100%;
  max-width: 450px;
  aspect-ratio: 4 / 3;   /* Rasio stabil */
  object-fit: cover;
  border-radius: 20px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}
.program-career {
  max-width: 1100px;
  margin: 50px auto 0;
  text-align: center;
}

.program-career h4 {
  margin-bottom: 25px;
  font-size: 22px;
  color: #16a34a;
}

.career-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 20px;
}

.career-grid div {
  background: white;
  padding: 18px;
  border-radius: 15px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.08);
  transition: 0.3s;
}

.career-grid div:hover {
  transform: translateY(-5px);
}
</style>
<section class="hafalan-section">

<h2 class="hafalan-title">Program Tahfidz Al-Qur'an</h2>
<p class="hafalan-subtitle">Target hafalan untuk membentuk generasi Qur'ani</p>

<div class="hafalan-container">

<div class="hafalan-card">
<h3 class="counter" data-target="3">0</h3>
<span>Juz</span>
<p>Target Hafalan</p>
</div>

<div class="hafalan-card">
<h3 class="counter" data-target="50">0</h3>
<span>+</span>
<p>Siswa Menghafal</p>
</div>

<div class="hafalan-card">
<h3 class="counter" data-target="3">0</h3>
<span>Pertemuan</span>
<p>Halaqoh Harian</p>
</div>

</div>

</section>
<style>
  .hafalan-section{
padding:70px 20px;
background:#f7f9fc;
text-align:center;
}

.hafalan-title{
font-size:32px;
color:#2c3e50;
margin-bottom:10px;
}

.hafalan-subtitle{
color:#777;
margin-bottom:40px;
}

.hafalan-container{
display:flex;
justify-content:center;
gap:30px;
flex-wrap:wrap;
}

.hafalan-card{
background:white;
padding:30px;
width:200px;
border-radius:12px;
box-shadow:0 5px 20px rgba(0,0,0,0.1);
transition:0.3s;
}

.hafalan-card:hover{
transform:translateY(-8px);
}

.hafalan-card h3{
font-size:40px;
color:#2c7be5;
margin:0;
}

.hafalan-card span{
font-size:20px;
font-weight:bold;
}

.hafalan-card p{
margin-top:10px;
color:#555;
}
</style>
<section class="why-us-modern">
  <div class="container">

    <h2 class="why-title">Mengapa Memilih Sekolah Kami?</h2>
    <p class="why-subtitle">
      SMK berbasis <b>IT, Tahfidz Qur’an, dan Wirausaha</b> untuk masa depan cerah.
    </p>

    <div class="why-grid">

      <div class="why-card animate">
        <div class="icon">💻</div>
        <h3>Jurusan IT Unggulan</h3>
        <p>Program keahlian PPLG(Membuat website,Desain Grafis dan Game)</p>
      </div>

      <div class="why-card animate">
        <div class="icon">📖</div>
        <h3>Program Tahfidz Qur’an</h3>
        <p>Menghafal Al-Qur’an dengan bimbingan ustadz profesional.</p>
      </div>

      <div class="why-card animate">
        <div class="icon">🚀</div>
        <h3>Wirausaha Mandiri</h3>
        <p>Kelas berbasis teknologi dan kewirausahaan.</p>
      </div>

      <div class="why-card animate">
        <div class="icon">🎓</div>
        <h3>Boarding School</h3>
        <p>Boarding school yang membina karakter</p>
      </div>

  <a href="brosur.php" target="_blank" class="btn-brosur">
        <i class="bi bi-file-earmark-pdf"></i> Lihat Brosur
    </a>
    </div>
  </div>
</section>
<style>
  .animate {
  opacity: 0;
  transform: translateY(40px);
  transition: .7s ease;
}

.animate.show {
  opacity: 1;
  transform: translateY(0);
}

  .why-us-modern {
  background: linear-gradient(135deg, #f0f9ff, #ecfdf5);
  padding: 80px 20px;
}

.why-title {
  text-align: center;
  font-size: 32px;
  font-weight: 800;
  margin-bottom: 10px;
  color: #0f172a;
}

.why-subtitle {
  text-align: center;
  color: #475569;
  margin-bottom: 50px;
  font-size: 16px;
}

/* GRID */
.why-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 24px;
}

/* CARD MODERN */
.why-card {
  background: white;
  border-radius: 20px;
  padding: 26px;
  text-align: center;
  box-shadow: 0 10px 28px rgba(0,0,0,0.08);
  transition: .35s ease;
  border: 2px solid transparent;
  position: relative;
}

/* Gradient Border Effect */
.why-card::before {
  content: "";
  position: absolute;
  inset: 0;
  padding: 2px;
  border-radius: 20px;
  background: linear-gradient(135deg, #22c55e, #3b82f6);
  -webkit-mask: 
    linear-gradient(#fff 0 0) content-box, 
    linear-gradient(#fff 0 0);
  -webkit-mask-composite: xor;
}

/* Hover Glow */
.why-card:hover {
  transform: translateY(-10px) scale(1.02);
  box-shadow: 0 15px 35px rgba(59,130,246,0.2);
}

/* ICON */
.why-card .icon {
  font-size: 42px;
  margin-bottom: 14px;
}

/* TEXT */
.why-card h3 {
  font-size: 18px;
  font-weight: 700;
  margin-bottom: 8px;
}

.why-card p {
  color: #64748b;
  font-size: 14px;
}

/* ANIMASI MASUK */
.animate {
  opacity: 0;
  transform: translateY(40px);
  animation: fadeUp .8s ease forwards;
}

.animate:nth-child(1){animation-delay:.1s;}
.animate:nth-child(2){animation-delay:.2s;}
.animate:nth-child(3){animation-delay:.3s;}
.animate:nth-child(4){animation-delay:.4s;}

@keyframes fadeUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
.brosur-box{
    text-align:center;
    margin-bottom:10px;
}

.btn-brosur{
    display:inline-block;
    padding:8px 14px;      /* lebih kecil */
    background:linear-gradient(135deg,#1e3a8a,#2563eb);
    color:#fff;
    font-size:16px;        /* font diperkecil */
    font-weight:600;
    border-radius:4px;     /* lebih kecil */
    text-decoration:none;
    transition:0.3s ease;
}

.btn-brosur:hover{
    transform:translateY(-2px);
}

</style>


<!-- PENDAFTARAN -->
<section id="pendaftaran" class="pendaftaran-section">
  <div class="container">

    <h2 class="title-gradient">Pendaftaran</h2>
    <p class="pendaftaran-subtitle">
      Sistem Penerimaan Murid Baru (SPMB)  
      <br>SMK Luqman Al Hakim
    </p>

    <div class="pendaftaran-card">

      <div class="pendaftaran-info">
      

        <h3>📄 Persyaratan Umum</h3>
        <ul>
          <li>✔ Mengisi formulir pendaftaran online</li>
          <li>✔ Fotocopy Akta Kelahiran</li>
          <li>✔ Fotocopy KTP Orang Tua</li>
          <li>✔ Fotocopy Kartu Keluarga</li>
          <li>✔ Pas Foto Terbaru (2x3)&(3x4)</li>
          <li>✔ Fotocopy Ijazah & SKL</li>
        </ul>

        <h3>🕒 Periode Pendaftaran</h3>
      <ul>
          <li> Nov 2025 - Jan 2026</li>
          <li> Feb - Mei 2026</li>
          <li> Juni - Juli 2026</li>
        
        </ul>
      </div>

      <div class="pendaftaran-action">
        <h3>Daftar Online Sekarang</h3>
        <p>
          Klik tombol di bawah ini untuk melanjutkan  
          ke formulir pendaftaran resmi SPMB
        </p>

        <a href="https://bit.ly/SPMB-SMKLuqmanAlHakim"
           target="_blank"
           class="btn-daftar">
          📝 Daftar Sekarang
        </a>
         <a href="http://localhost/web_profile/pendaftaran.php"
           target="_blank"
           class="btn-daftar">
          📝 Daftar Melalui Website 
        </a>
      </div>

    </div>

  </div>
</section>
<style>
  
  .pendaftaran-section {
  padding: 80px 0;
  background: linear-gradient(135deg, #f0fdf4, #ecfeff);
}

.pendaftaran-subtitle {
  text-align: center;
  color: #555;
  margin-bottom: 40px;
  font-size: 16px;
}

.pendaftaran-card {
  display: grid;
  grid-template-columns: 1.4fr 1fr;
  gap: 30px;
  background: white;
  border-radius: 26px;
  padding: 40px;
  box-shadow: 0 25px 60px rgba(0,0,0,0.12);
}

.pendaftaran-info h3 {
  font-weight: 700;
  margin-top: 20px;
}

.pendaftaran-info ul {
  padding-left: 20px;
}

.pendaftaran-info li {
  margin-bottom: 8px;
}

.pendaftaran-action {
  background: linear-gradient(135deg, #1e40af, #2563eb);
  color: white;
  padding: 35px;
  border-radius: 22px;
  text-align: center;
}

.btn-daftar {
  display: inline-block;
  margin-top: 20px;
  padding: 14px 28px;
  border-radius: 14px;
  background: white;
  color: #1e40af;
  font-weight: 700;
  text-decoration: none;
  transition: .3s;
}

.btn-daftar:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 30px rgba(255,255,255,0.3);
}

/* RESPONSIVE */
@media (max-width: 768px) {
  .pendaftaran-card {
    grid-template-columns: 1fr;
  }
}


</style>

<section id="jadwal" class="jadwal-pondok">
  <div class="container">
    <h2 class="jadwal-title">Jadwal Harian </h2>
   

    <div class="jadwal-wrapper">
      <table class="jadwal-table">
        <tr>
          <th>Waktu</th>
          <th>Kegiatan</th>
        </tr>

        <?php
        include "koneksi.php";
        $data = mysqli_query($koneksi, "SELECT * FROM jadwal ORDER BY id ASC");

        while($row = mysqli_fetch_assoc($data)):
        ?>

        <tr>
          <td><i class="bi bi-alarm"></i> <?= $row['waktu']; ?></td>
          <td>
            <span class="badge <?= $row['kategori']; ?>">
              <?= $row['kegiatan']; ?>
            </span>
          </td>
        </tr>

        <?php endwhile; ?>

      </table>
    </div>
  </div>
</section>
<style>
 .jadwal-pondok{
  padding:90px 20px;
  background:linear-gradient(135deg,#f8fafc,#eef2ff);
}

.jadwal-title{
  text-align:center;
  font-size:34px;
  font-weight:700;
  margin-bottom:10px;
  color:#1e3a8a;
}

.jadwal-sub{
  text-align:center;
  margin-bottom:50px;
  color:#555;
  font-style:italic;
}

.jadwal-wrapper{
  max-width:850px;
  margin:auto;
  background:#fff;
  border-radius:18px;
  overflow:hidden;
  box-shadow:0 15px 35px rgba(0,0,0,0.08);
}

.jadwal-table{
  width:100%;
  border-collapse:collapse;
}

.jadwal-table th{
  background:#1e3a8a;
  color:#fff;
  padding:15px;
  text-align:left;
}

.jadwal-table td{
  padding:14px 20px;
  border-bottom:1px solid #f1f1f1;
}

.jadwal-table tr:nth-child(even){
  background:#f9fbff;
}

.jadwal-table tr:hover{
  background:#e0e7ff;
}

/* Badge kategori */
.badge{
  padding:6px 14px;
  border-radius:20px;
  font-size:13px;
  font-weight:500;
}

.ibadah{
  background:#d1fae5;
  color:#065f46;
}

.belajar{
  background:#dbeafe;
  color:#1e3a8a;
}

.istirahat{
  background:#fef3c7;
  color:#92400e;
}
</style>

<?php
include 'koneksi.php';
$tampil = mysqli_query($koneksi, "SELECT * FROM fasilitas");
?>
<!--GALERI-->


<section id="fasilitas" class="section">
  <h2 class="title-gradient">Fasilitas Sekolah</h2>

  <div class="gallery-grid">
    <?php while ($hasil = mysqli_fetch_assoc($tampil)) { ?>
      <div class="gallery-item"
        onclick="openGalleryModal(
          '<?php echo $hasil['foto']; ?>',
          '<?php echo htmlspecialchars($hasil['judul']); ?>',
         ' <?php echo htmlspecialchars($hasil['deskripsi']); ?>'
        )">

        <img src="gambar/<?php echo $hasil['foto']; ?>">
        
        <div class="gallery-info">
          <h3><?php echo $hasil['judul']; ?></h3>
          
        </div>

      </div>
    <?php } ?>
  </div>
</section>
<div id="galleryModal" class="gallery-modal">
  <div class="gallery-modal-content">
    <span class="close" onclick="closeGalleryModal()">×</span>
   <h2 class="modal-title">📘 Data Fasilitas</h2>
    <img id="modalGambar">
    <h3 id="modalJudul"></h3>
    <p id="modalDeskripsi"></p>
  </div>
</div>

<style>
  .section {
  max-width: 1200px;
  margin: 80px auto;
  padding: 0 20px;
}
 .gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 20px;
  max-width: 1100px;   /* batas lebar */
  margin: auto;        /* supaya tengah */
}

.gallery-item {
  border-radius: 16px;
  overflow: hidden;
  cursor: pointer;
  position: relative;
  box-shadow: 0 8px 18px rgba(0,0,0,0.1);
  transition: .3s ease;
  background: white;
}

.gallery-item img {
  width: 100%;
  height: 220px;
  object-fit: cover;
  transition: .3s ease;
}

.gallery-item:hover img {
  transform: scale(1.08);
}

.gallery-item:hover {
  transform: translateY(-6px);
  box-shadow: 0 12px 28px rgba(0,120,255,0.25);
}

.gallery-info {
  padding: 14px;
}

.gallery-info h3 {
  font-size: 16px;
  font-weight: 700;
  margin-bottom: 4px;
}
.gallery-modal {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.8);
  backdrop-filter: blur(6px);
  justify-content: center;
  align-items: center;
  z-index: 99999;
}

.gallery-modal-content {
  background: white;
  max-width: 600px;   /* lebih kecil */
  width: 90%;
  padding: 20px;
  border-radius: 18px;
  max-height: 85vh;   /* tidak melebihi layar */
  overflow-y: auto;   /* kalau panjang bisa scroll */
}
.gallery-modal-content img {
  width: 100%;
  max-height: 400px;   /* batasi tinggi */
  object-fit: cover;
  border-radius: 14px;
  margin-bottom: 12px;
}

</style>

<section id="eskul" class="section">
  <h2 class="title-gradient">Ekstrakurikuler</h2>

  <div class="eskul-grid">

    <?php
    include "koneksi.php";
    $data = mysqli_query($koneksi, "SELECT * FROM eskul ORDER BY id ASC");

    while ($row = mysqli_fetch_assoc($data)) {
    ?>

      <div class="eskul-card">
        <h3>
          <?php 
          if (strpos($row['icon'], 'bi') !== false) {
              echo '<i class="'.$row['icon'].'"></i> ';
          } else {
              echo $row['icon'].' ';
          }
          ?>
          <?php echo $row['nama']; ?>
        </h3>
        <p><?php echo $row['deskripsi']; ?></p>
      </div>

    <?php } ?>

  </div>
</section>
<style>
.eskul-grid {
 display: grid;
   padding: 18px;
  grid-template-columns: repeat(5, 1fr); /* 5 kolom */
  gap: 20px;
  max-width: 1300px; /* sedikit dilebarkan */
  margin: 40px auto 0;

}

  .eskul-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 576px) {
  .eskul-grid {
    grid-template-columns: 1fr;
  }
}
.eskul-card {
  background: white;
  padding: 22px;
  border-radius: 18px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.08);
  transition: 0.3s ease;
  text-align: center;
}

.eskul-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 16px 35px rgba(0,0,0,0.15);
}

.eskul-card h3 {
  margin-bottom: 10px;
  color: #16a34a;
  font-weight: 700;
}

.eskul-card p {
  font-size: 14px;
  color: #555;
}
</style>


</section>
<?php
include 'koneksi.php';
$tampil = mysqli_query($koneksi, "SELECT * FROM galeri");
?>
<!--GALERI-->


<section id="galeri" class="section">
  <h2 class="title-gradient">Galeri Sekolah</h2>

  <div class="gallery-grid">
    <?php while ($hasil = mysqli_fetch_assoc($tampil)) { ?>
      <div class="gallery-item"
        onclick="openGalleryModal(
          '<?php echo $hasil['gambar']; ?>',
          '<?php echo htmlspecialchars($hasil['judul']); ?>',
          '<?php echo htmlspecialchars($hasil['deskripsi']); ?>',
          '<?php echo date('d M Y', strtotime($hasil['tanggal_upload'])); ?>'
        )">

        <img src="gambar/<?php echo $hasil['gambar']; ?>">
        
        <div class="gallery-info">
          <h3><?php echo $hasil['judul']; ?></h3>
          <small>📅 <?= date('d M Y', strtotime($hasil['tanggal_upload'])); ?></small>
        </div>

      </div>
    <?php } ?>
  </div>
</section>


<div id="galleryModal" class="gallery-modal">
  <div class="gallery-modal-content">
    <span class="close" onclick="closeGalleryModal()">×</span>
   <h2 class="modal-title">📘 Data Galeri</h2>
    <img id="modalGambar">
    <h3 id="modalJudul"></h3>
    <p id="modalDeskripsi"></p>
    <small id="modalTanggalUpload"></small>
  </div>
</div>

<style>
  .bg-soft {
  background: linear-gradient(135deg, #f0f9ff, #ecfdf5);
  padding: 80px 0;
}
  .gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 20px;
}

.gallery-item {
  border-radius: 16px;
  overflow: hidden;
  cursor: pointer;
  position: relative;
  box-shadow: 0 8px 18px rgba(0,0,0,0.1);
  transition: .3s ease;
  background: white;
}

.gallery-item img {
  width: 100%;
  height: 220px;
  object-fit: cover;
  transition: .3s ease;
}

.gallery-item:hover img {
  transform: scale(1.08);
}

.gallery-item:hover {
  transform: translateY(-6px);
  box-shadow: 0 12px 28px rgba(0,120,255,0.25);
}

.gallery-info {
  padding: 14px;
}

.gallery-info h3 {
  font-size: 16px;
  font-weight: 700;
  margin-bottom: 4px;
}
.gallery-modal {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.8);
  backdrop-filter: blur(6px);
  justify-content: center;
  align-items: center;
  z-index: 99999;
}

.gallery-modal-content {
  background: white;
  max-width: 720px;
  width: 94%;
  padding: 18px;
  border-radius: 18px;
  animation: fadeIn .3s ease;
}

.gallery-modal-content img {
  width: 100%;
  border-radius: 14px;
  margin-bottom: 12px;
}

</style>
<section id="testimoni" class="section">
  <h2 class="title-gradient">Testimoni Alumni</h2>

  <div class="testimoni-grid">

    <?php
    include "koneksi.php";
    $data = mysqli_query($koneksi, "SELECT * FROM testimoni ORDER BY id DESC");

    while ($row = mysqli_fetch_assoc($data)) {
    ?>

      <div class="testi-card">
        <p class="testi-text">"<?php echo $row['pesan']; ?>"</p>
        <h3><?php echo $row['nama']; ?></h3>
        <span>Angkatan <?php echo $row['angkatan']; ?></span>
      </div>

    <?php } ?>

  </div>
</section>
<style>
 .testimoni-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 25px;
  max-width: 1100px;
  margin: 40px auto;
}

.testi-card {
  background: linear-gradient(135deg,#ffffff,#f8fafc);
  padding: 35px;
  border-radius: 24px;
  text-align: center;
  box-shadow: 0 15px 35px rgba(0,0,0,0.08);
  position: relative;
}

.testi-card::before {
  content: "“";
  font-size: 60px;
  position: absolute;
  top: 10px;
  left: 20px;
  color: #16a34a;
  opacity: .2;
}

.testi-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 18px 40px rgba(0,0,0,0.15);
}

.testi-text {
  font-style: italic;
  font-size: 15px;
  color: #444;
  margin-bottom: 15px;
}

.testi-card h3 {
  margin: 5px 0;
  color: #111;
}

.testi-card span {
  font-size: 13px;
  color: #16a34a;
  font-weight: 600;
}
</style>
<!-- KONTAK -->
<section id="contact" class="contact-modern">

  <div class="contact-container">

    <!-- MAP -->
    <div class="contact-card map-card">
      <h2>📍 Lokasi Sekolah</h2>

      <div class="map-box">
        <iframe 
          src="https://www.google.com/maps?q=SMK+Luqman+Al+Hakim+Kudus&output=embed" 
          allowfullscreen 
          loading="lazy">
        </iframe>
      </div>
    </div>

    <!-- FORM -->
    <div class="contact-card form-card">
      <h2>✉ Hubungi Kami</h2>

      <form method="post">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Email Aktif" required>
        <textarea name="pesan" placeholder="Tulis pesan..." required></textarea>
        <button type="submit" name="kirim">Kirim Pesan</button>
      </form>

      <?php if(isset($_SESSION['success'])) { ?>
        <p class="success-msg">Pesan berhasil dikirim ✅</p>
        <?php unset($_SESSION['success']); ?>
      <?php } ?>
    </div>

  </div>
</section>
<style>
  .contact-modern {
  padding: 90px 20px;
  background: linear-gradient(135deg,#f0fdf4,#ecfeff);
}

.contact-container {
  max-width: 1200px;
  margin: auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
}

.contact-card {
  background: white;
  padding: 35px;
  border-radius: 24px;
  box-shadow: 0 25px 50px rgba(0,0,0,0.08);
  transition: .3s ease;
}

.contact-card:hover {
  transform: translateY(-6px);
}

.contact-card h2 {
  margin-bottom: 20px;
  font-weight: 700;
  color: #1e3a8a;
}

.map-box iframe {
  width: 100%;
  height: 300px;
  border-radius: 18px;
  border: none;
}

/* FORM */
.form-card input,
.form-card textarea {
  width: 100%;
  padding: 14px;
  margin-bottom: 14px;
  border-radius: 14px;
  border: 1px solid #e2e8f0;
  font-family: 'Poppins', sans-serif;
  transition: .2s;
}

.form-card input:focus,
.form-card textarea:focus {
  border-color: #2563eb;
  outline: none;
  box-shadow: 0 0 0 3px rgba(37,99,235,0.15);
}

.form-card textarea {
  min-height: 120px;
  resize: none;
}

.form-card button {
  width: 100%;
  padding: 14px;
  border-radius: 14px;
  border: none;
  background: linear-gradient(135deg,#1e40af,#2563eb);
  color: white;
  font-weight: 600;
  cursor: pointer;
  transition: .3s;
}

.form-card button:hover {
  transform: translateY(-3px);
  box-shadow: 0 15px 30px rgba(37,99,235,0.3);
}

.success-msg {
  margin-top: 15px;
  color: #16a34a;
  font-weight: 600;
  text-align: center;
}

/* RESPONSIVE */
@media(max-width:768px){
  .contact-container{
    grid-template-columns:1fr;
  }
}
</style>

<!-- FOOTER -->

<footer class="footer-modern">
  <div class="footer-container">

    <div class="footer-col">
      <h3>SMK LUQMAN AL HAKIM</h3>
      <p>Sekolah berbasis IT, Tahfidz Qur’an, dan Wirausaha.</p>
      <p><i class="bi bi-geo-alt"></i> Kudus, Jawa Tengah</p>
      <p><i class="bi bi-envelope"></i> smklh0291@gmail.com</p>
      <p><i class="bi bi-telephone"></i> +62 812-3456-7890</p>
    </div>

    <div class="footer-col">
      <h4>Menu </h4>
      <ul>
        <li><a href="#about">Profil</a></li>
        <li><a href="#program">Jurusan</a></li>
        <li><a href="#news">Berita</a></li>
        <li><a href="#contact">Kontak</a></li>
        <li><a href="#eskul">Eskul</a></li>
        <li><a href="#pendaftaran">Pendaftaran</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Ikuti Kami</h4>
      <div class="footer-social">
        <a href="https://www.instagram.com/smkelha_kudus.store"><i class="bi bi-instagram"></i></a>
        <a href="https://facebook.com/smkluqmanalhakim.kudus"><i class="bi bi-facebook"></i></a>
        <a href="https://www.youtube.com/@smkluqmanalhakimkudus"><i class="bi bi-youtube"></i></a>
      </div>
    </div>

  </div>

  <div class="footer-bottom">
    © 2026 SMK LUQMAN AL HAKIM KUDUS — All Rights Reserved
  </div>
</footer>
<style>
  .footer-modern {
  background: #0f172a;
  color: #cbd5e1;
  padding-top: 70px;
}

.footer-container {
  max-width: 1200px;
  margin: auto;
  display: grid;
  grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
  gap: 40px;
  padding: 0 20px 50px;
}

.footer-col h3,
.footer-col h4 {
  color: white;
  margin-bottom: 15px;
}

.footer-col p {
  font-size: 14px;
  margin-bottom: 8px;
}

.footer-col ul {
  list-style: none;
  padding: 0;
}

.footer-col ul li {
  margin-bottom: 8px;
}

.footer-col ul li a {
  color: #cbd5e1;
  text-decoration: none;
  transition: .3s;
}

.footer-col ul li a:hover {
  color: #22c55e;
}

.footer-social a {
  display: inline-block;
  margin-right: 10px;
  font-size: 20px;
  color: #cbd5e1;
  transition: .3s;
}

.footer-social a:hover {
  color: #22c55e;
  transform: translateY(-3px);
}

.footer-bottom {
  text-align: center;
  padding: 20px;
  border-top: 1px solid #1e293b;
  font-size: 14px;
}
</style>

<script>
function openModal(foto, nama, nip, jenis_kelamin, mapel, email, no_hp ) {
  document.getElementById("guruModal").style.display = "block";

  document.getElementById("modalFoto").src = "gambar/" + foto;
  document.getElementById("modalNama").innerText = nama;
  document.getElementById("modalNIP").innerText = "NIP: " + nip;
  document.getElementById("modalJenisKelamin").innerText = "Jenis Kelamin: " + jenis_kelamin;
  document.getElementById("modalMapel").innerText = "Mata Pelajaran: " + mapel;
  document.getElementById("modalEmail").innerText = "Email: " + email;
  document.getElementById("modalNoHp").innerText = "No HP: " + no_hp;
}

function closeModal() {
  document.getElementById("guruModal").style.display = "none";
}
</script>
<script>
function openBeritaModal(judul, gambar, tanggal, penulis, isi) {
  document.getElementById("beritaModal").style.display = "block";

  document.getElementById("modalJudulBerita").innerText = judul;
  document.getElementById("modalTanggalBerita").innerText = "📅 " + tanggal;
  document.getElementById("modalPenulisBerita").innerText = "✍️ " + penulis;
  document.getElementById("modalIsiBerita").innerText = isi;
  document.getElementById("modalGambarBerita").src = "gambar/" + gambar;
}

function closeBeritaModal() {
  document.getElementById("beritaModal").style.display = "none";
}
</script>
<script>
function openGalleryModal(gambar, judul, deskripsi, tanggal_upload) {

console.log("Popup OK:", gambar);

  document.getElementById("modalGambar").src = "gambar/" + gambar;
  document.getElementById("modalJudul").innerText = judul;
  document.getElementById("modalDeskripsi").innerText = deskripsi;
  document.getElementById("modalTanggalUpload").innerText = "📅 " + tanggal_upload;

  document.getElementById("galleryModal").style.display = "flex";
}
function closeGalleryModal() {
  document.getElementById("galleryModal").style.display = "none";
}
</script>


<script>
const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add("show");
    }
  });
});

document.querySelectorAll(".animate").forEach(el => observer.observe(el));
</script>

<script>
window.addEventListener("scroll", function() {
  const nav = document.querySelector(".navbar");
  nav.classList.toggle("scrolled", window.scrollY > 10);
});
</script>
<div id="popupInfo" class="popup-info">
  <div class="popup-content">
    <span onclick="closePopup()" class="popup-close">×</span>
    <h3>📢 INFO PENTING</h3>
    <p>Pendaftaran Gelombang 2 telah dibuka!</p>
    <a href="https://bit.ly/SPMB-SMKLuqmanAlHakim" class="popup-btn">Daftar Sekarang</a>
  </div>
</div>
<style>
  .popup-info{
  position:fixed;
  inset:0;
  background:rgba(0,0,0,.6);
  display:flex;
  justify-content:center;
  align-items:center;
  z-index:99999;
}

.popup-content{
  background:white;
  padding:30px;
  border-radius:20px;
  text-align:center;
  width:350px;
  animation:fadeIn .4s ease;
}

.popup-close{
  float:right;
  cursor:pointer;
  font-size:20px;
}

.popup-btn{
  display:inline-block;
  margin-top:15px;
  padding:10px 20px;
  background:#16a34a;
  color:white;
  border-radius:20px;
  text-decoration:none;
}
</style>
<script>
function closePopup(){
  document.getElementById("popupInfo").style.display="none";
}
</script>
<script>
const counters = document.querySelectorAll(".counter");
let started = false;

function formatNumber(num) {
  return num.toLocaleString("id-ID");
}

function startCounting() {
  counters.forEach(counter => {
    const target = +counter.getAttribute("data-target");
    let count = 0;
    const speed = target / 100;

    const updateCount = () => {
      count += speed;
      if (count < target) {
        counter.innerText = formatNumber(Math.ceil(count));
        requestAnimationFrame(updateCount);
      } else {
        counter.innerText = formatNumber(target);
      }
    };

    updateCount();
  });
}

window.addEventListener("scroll", function () {
  const section = document.querySelector(".stats-modern");
  const position = section.getBoundingClientRect().top;
  const screenPosition = window.innerHeight;

  if (position < screenPosition && !started) {
    startCounting();
    started = true;
  }
});
</script>
</body>
</html>
