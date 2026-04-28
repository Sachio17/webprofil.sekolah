<?php
include '../koneksi.php';

if(isset($_POST['kirim'])){
  $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
  $email = mysqli_real_escape_string($koneksi, $_POST['email']);
  $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);

  mysqli_query($koneksi, "INSERT INTO kontak VALUES(NULL,'$nama','$email','$pesan',NOW())");

  // Redirect agar tidak resend saat refresh
  header("Location: index.php?success=1#contact");
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SMK LUQMAN AL HAKIM KUDUS</title>
 <link rel="icon" type="image/png" href="../gambar/hid.png">
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
<body>

<!-- HEADER -->
<header class="navbar">
  <div class="container">
    <h1 class="logo">SMK LUQMAN AL HAKIM </h1>
    <nav>
      <a href="#home">Home</a>
      <a href="#about">Profil</a>
      <a href="#visi">Visi & Misi</a>
      <a href="#guru">Guru</a>
      <a href="#news">Berita</a>
      <a href="#galeri">Galeri</a>
      <a href="#contact">Kontak</a>
    </nav>
  </div>
</header>


<!-- HERO -->
<section id="home" class="hero">
  <div class="hero-content">
    <div class="logo-stack">
  <img src="../gambar/hid.png" class="logo-top">
    <h2>Pendidikan Integral
Berbasis Tauhid</h2>
    <p>Pintar Ngaji Jago It</p>
    <a href="https://wa.me/6285712549038"><button>Daftar SPMB</button></a>
 </div>
</section>
<?php
             include '../koneksi.php';
             
             $tampil= mysqli_query($koneksi, "select* from profil_sekolah");
             while($hasil = mysqli_fetch_array($tampil)){
               ?>
<!-- PROFIL -->
<section id="about" class="section">
  <h2>Profil Sekolah</h2>
  <img src="../gambar/<?php echo $hasil['logo']; ?>">
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
   <h2>Tentang Sekolah</h2>
   <p><?php echo $hasil['deskripsi']; ?></p>
 </section>
<?php
}
?>
<?php
             include '../koneksi.php';
             
             $tampil= mysqli_query($koneksi, "select* from profil_sekolah");
             while($hasil = mysqli_fetch_array($tampil)){
               ?>
<!-- VISI MISI -->
<section id="visi" class="section gray">
  <h2>Visi & Misi</h2>
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
include '../koneksi.php';
$tampil = mysqli_query($koneksi, "SELECT * FROM guru");
?>
<!-- GURU -->
<section id="guru" class="section gray">
    <h2>Data Guru</h2>
    <div class="grid">
        <?php while ($hasil = mysqli_fetch_assoc($tampil)) { ?>

        <div class="teacher-card">

            <img src="../gambar/<?php echo $hasil['foto']; ?>">

            <h3><?php echo $hasil['nama_guru']; ?></h3>
            <p><?php echo $hasil['nip']; ?></p>
            <p><?php echo $hasil['jenis_kelamin']; ?></p>
            <p><?php echo $hasil['mapel']; ?></p>
            <p><?php echo $hasil['email']; ?></p>
            <p><?php echo $hasil['no_hp']; ?></p>
        </div>

        <?php } ?>
    </div>
</section>


<?php
include '../koneksi.php';
$tampil = mysqli_query($koneksi, "SELECT * FROM berita");
?>
<!-- BERITA -->
<section id="news" class="section gray">
  <h2>Berita Terbaru</h2>

  <div class="grid">
    <?php while ($hasil = mysqli_fetch_assoc($tampil)) { ?>

    <div class="news-card">
        <img src="../gambar/<?php echo $hasil['gambar']; ?>">

        <div class="news-content">
            <h3><?php echo $hasil['judul']; ?></h3>
            <p><?php echo $hasil['isi']; ?></p>
             <p><?php echo $hasil['penulis']; ?></p>
            <small>📅 <?= date('d M Y', strtotime($hasil['tanggal'])); ?></small>
        </div>
    </div>

    <?php } ?>
  </div>
</section>
<?php
include '../koneksi.php';
$tampil = mysqli_query($koneksi, "SELECT * FROM galeri");
?>
<!--GALERI-->


<section id="galeri" class="section">
  <h2>Galeri Sekolah</h2>

  <div class="gallery-grid">
    <?php while ($hasil = mysqli_fetch_assoc($tampil)) { ?>

      <div class="gallery-item">
        <img src="../gambar/<?php echo $hasil['gambar']; ?>">
            <h3><?php echo $hasil['judul']; ?></h3>
            <p><?php echo $hasil['deskripsi']; ?></p>
             <small>📅 <?= date('d M Y', strtotime($hasil['tanggal_upload'])); ?></small>
      </div>

   <?php } ?>
  </div>
</section>
 

<!-- KONTAK -->
<section id="contact" class="section">

  <div class="contact-grid">

    <!-- MAP -->
    <div class="map-area">
      <h2>Lokasi Sekolah</h2>

      <div class="map-box">
        <iframe 
          src="https://www.google.com/maps?q=SMK+Luqman+Al+Hakim+Kudus&output=embed" 
          allowfullscreen 
          loading="lazy">
        </iframe>
      </div>
    </div>

    <!-- FORM KONTAK -->
    <div class="contact-area">
      <h2>Hubungi Kami</h2>

      <div class="contact-form">
        <form method="post" class="contact-form">
          <input type="text" name="nama" placeholder="Nama Lengkap" required>
          <input type="email" name="email" placeholder="Email Aktif" required>
          <textarea name="pesan" placeholder="Tulis pesan..." required></textarea>
          <button type="submit" name="kirim">Kirim Pesan</button>

         
        </form>
        <?php if(isset($_GET['success'])) { ?>
  <p class="success">Pesan berhasil dikirim!</p>
<?php } ?>

      </div>
    </div>

  </div>
</section>


<!-- FOOTER -->
<footer class="footer">
  <p>© 2026 SMK LUQMAN AL HAKIM KUDUS — All Rights Reserved</p>

  <div class="footer-social">
    <a href="https://www.instagram.com/smkluqmanalhakim.kudus" target="_blank"><i class="bi bi-instagram"></i></a>
    <a href="https://www.facebook.com/smkluqmanalhakim.kudus" target="_blank"><i class="bi bi-facebook"></i></a>
    <a href="https://www.youtube.com/@smkluqmanalhakimkudus" target="_blank"><i class="bi bi-youtube"></i></a>
    <a href="https://www.tiktok.com/@smkluqmanalhakimkudus" target="_blank"><i class="bi bi-tiktok"></i></a>
  </div>
</footer>

</body>
</html>
