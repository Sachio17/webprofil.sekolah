<?php 
include "../koneksi.php";


include "template/header.php"; 
include "template/menu.php"; 
// Ambil 5 pesan terbaru
$pesan_terbaru = mysqli_query($koneksi, 
    "SELECT * FROM kontak ORDER BY id DESC LIMIT 5"
);

// Hitung jumlah pesan
$jml_pesan = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM kontak"));

// HITUNG DATA
$jml_berita = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM berita"));
$jml_galeri = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM galeri"));
$jml_guru   = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM guru"));
$jml_pesan  = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM kontak"));
$jml_eskul      = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM eskul"));
$jml_fasilitas  = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM fasilitas"));
$jml_testimoni  = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM testimoni"));
$jml_pendaftaran= mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM pendaftaran"));

// Ambil pendaftar terbaru
$pendaftar_terbaru = mysqli_query($koneksi,
    "SELECT id, nama_lengkap, no_hp, asal_sekolah 
     FROM pendaftaran 
     ORDER BY id DESC LIMIT 5");

?>


<main class="app-main">

<div class="container-fluid mt-4">
	<div class="top-info-bar mb-4">
    <div class="admin-info">
        <i class="bi bi-person-circle"></i>
        <div>
            <span>Admin Aktif</span>
            <strong><?= $_SESSION['username']; ?></strong>
        </div>
    </div>

    <div class="time-info">
        <i class="bi bi-clock-history"></i>
        <div>
            <span id="tanggal"></span>
            <strong id="jam"></strong>
        </div>
        <div class="notif-wrapper">
    <div class="dropdown">
        <button class="notif-btn" data-bs-toggle="dropdown">
            <i class="bi bi-bell-fill"></i>
            <?php if($jml_pesan > 0): ?>
                <span class="notif-badge"><?= $jml_pesan ?></span>
            <?php endif; ?>
        </button>

        <ul class="dropdown-menu notif-dropdown">
            <li class="dropdown-header">
                Pesan Masuk Terbaru
            </li>

            <?php while($row = mysqli_fetch_assoc($pesan_terbaru)) : ?>
            <li>
                <a class="dropdown-item" href="data_kontak.php">
                    <strong><?= $row['nama']; ?></strong><br>
                    <small><?= substr($row['pesan'],0,40); ?>...</small>
                </a>
            </li>
            <?php endwhile; ?>

            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item text-center" href="data_kontak.php">
                    Lihat Semua Pesan
                </a>
            </li>
        </ul>
    </div>
</div>

    </div>



<div class="card control-panel mt-4">
  <div class="card-body text-center">
    <h2>Pusat Kontrol Administrasi</h2>
    <p>Sistem Manajemen Digital SMK Luqman Al Hakim</p>
  </div>
</div>

</div>


<div class="row g-4">

<div class="row g-4">

<!-- BERITA -->
<div class="col-md-6 col-lg-3">
  <div class="stat-card-horizontal berita">
      <div class="icon-left">
          <i class="bi bi-megaphone-fill"></i>
      </div>
      <div class="info">
          <span>Berita</span>
          <h3><?= $jml_berita ?></h3>
      </div>
  </div>
</div>


<!-- GALERI -->
<div class="col-md-6 col-lg-3">
  <div class="stat-card-horizontal galeri">
      <div class="icon-left">
          <i class="bi bi-camera-fill"></i>
      </div>
      <div class="info">
          <span>Galeri</span>
          <h3><?= $jml_galeri ?></h3>
      </div>
  </div>
</div>

<!-- GURU -->
<div class="col-md-6 col-lg-3">
  <div class="stat-card-horizontal guru">
      <div class="icon-left">
          <i class="bi bi-person-video3"></i>
      </div>
      <div class="info">
          <span>Guru</span>
          <h3><?= $jml_guru ?></h3>
      </div>
  </div>
</div>

<!-- PESAN -->
<div class="col-md-6 col-lg-3">
  <div class="stat-card-horizontal pesan">
      <div class="icon-left">
          <i class="bi bi-chat-dots-fill"></i>
      </div>
      <div class="info">
          <span>Pesan Masuk</span>
          <h3><?= $jml_pesan ?></h3>
      </div>
  </div>
</div>
<!-- EKSTRAKURIKULER -->
<div class="col-md-6 col-lg-3">
  <div class="stat-card-horizontal eskul">
      <div class="icon-left">
          <i class="bi bi-trophy-fill"></i>
      </div>
      <div class="info">
          <span>Ekstrakurikuler</span>
          <h3><?= $jml_eskul ?></h3>
      </div>
  </div>
</div>

<!-- FASILITAS -->
<div class="col-md-6 col-lg-3">
  <div class="stat-card-horizontal fasilitas">
      <div class="icon-left">
          <i class="bi bi-building"></i>
      </div>
      <div class="info">
          <span>Fasilitas</span>
          <h3><?= $jml_fasilitas ?></h3>
      </div>
  </div>
</div>

<!-- TESTIMONI ALUMNI -->
<div class="col-md-6 col-lg-3">
  <div class="stat-card-horizontal testimoni">
      <div class="icon-left">
          <i class="bi bi-chat-quote-fill"></i>
      </div>
      <div class="info">
          <span>Testimoni Alumni</span>
          <h3><?= $jml_testimoni ?></h3>
      </div>
  </div>
</div>
<!-- PENDAFTARAN -->
<div class="col-md-6 col-lg-3">
  <div class="stat-card-horizontal pendaftaran">
      <div class="icon-left">
          <i class="bi bi-person-plus-fill"></i>
      </div>
      <div class="info">
          <span>Pendaftaran</span>
          <h3><?= $jml_pendaftaran ?></h3>
      </div>
  </div>
</div>
<?php
include "../koneksi.php";

$query = "SELECT * FROM pendaftaran ORDER BY id DESC";
$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

    <div class="card daftar-terbaru mt-4">
    <div class="card-header daftar-header">
        <i class="bi bi-person-plus-fill me-2"></i> Pendaftar Terbaru
    </div>

    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th style="width:60px;">No</th>
                    <th>Nama Siswa</th>
                    <th>No HP</th>
                    <th>Asal Sekolah</th>
                    <th style="width:120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; while($row = mysqli_fetch_assoc($hasil)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_lengkap']; ?></td>
                    <td><?= $row['no_hp']; ?></td>
                    <td>
                        <span class="badge bg-soft">
                            <?= $row['nama_sekolah']; ?>
                        </span>
                    </td>
                    <td>
                        <a href="data_pendaftaran.php" class="btn btn-sm btn-kelola">
                            <i class="bi bi-pencil-square"></i> Kelola
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="card-footer text-center">
        <a href="data_pendaftaran.php" class="lihat-semua">
            Buka Manajemen Pendaftaran Penuh »
        </a>
    </div>
</div>

</div>

</div>



<!-- PANEL SELAMAT DATANG -->


</main>

<style>
/* NOTIFIKASI */
.notif-btn {
  position: relative;
  background: none;
  border: none;
  font-size: 22px;
  color: #2a5298;
  cursor: pointer;
}

.notif-badge {
  position: absolute;
  top: -5px;
  right: -8px;
  background: #e74a3b;
  color: white;
  font-size: 11px;
  padding: 4px 7px;
  border-radius: 50%;
  font-weight: 700;
}

.notif-dropdown {
  width: 280px;
  border-radius: 15px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.15);
  padding: 10px 0;
}

.notif-dropdown .dropdown-item {
  white-space: normal;
  font-size: 14px;
}

.dropdown-header {
  font-weight: 700;
  font-size: 14px;
  padding: 10px 15px;
}

/* CARD STAT - DYNAMIC ISLAND FEEL */
.control-panel {
  border-radius: 20px;
  background: linear-gradient(135deg, #f8f9fa, #e9ecef);
  box-shadow: 0 15px 40px rgba(0,0,0,0.08);
}

.control-panel h2 {
  font-weight: 800;
  color: #2c3e50;
  margin-bottom: 6px;
}

.control-panel p {
  color: #6c757d;
  letter-spacing: 1px;
}
/* TOP INFO BAR */
.top-info-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: rgba(255,255,255,0.7);
  backdrop-filter: blur(12px);
  padding: 18px 25px;
  border-radius: 18px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

/* BOX */
.admin-info, .time-info {
  display: flex;
  align-items: center;
  gap: 12px;
}

.admin-info i, .time-info i {
  font-size: 26px;
  color: #2a5298;
}

.admin-info span,
.time-info span {
  display: block;
  font-size: 13px;
  color: #6c757d;
}

.admin-info strong,
.time-info strong {
  font-size: 16px;
  font-weight: 700;
  color: #1f2937;
}


.stat-card-horizontal {
  display: flex;
  align-items: center;
  padding: 18px 22px;
  border-radius: 18px;
  color: white;
  transition: .35s ease;
  box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

/* ICON KIRI */
.icon-left {
  width: 55px;
  height: 55px;
  border-radius: 14px;
  background: rgba(255,255,255,0.18);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  margin-right: 18px;
}

/* TEXT */
.stat-card-horizontal span {
  font-size: 14px;
  opacity: 0.9;
  display: block;
}

.stat-card-horizontal h3 {
  font-size: 26px;
  font-weight: 800;
  margin: 0;
}

/* HOVER */
.stat-card-horizontal:hover {
  transform: translateY(-6px);
  box-shadow: 0 18px 40px rgba(0,0,0,0.25);
}

/* WARNA PREMIUM */
.berita {
  background: linear-gradient(135deg, #2c3e50, #4ca1af);
}

.galeri {
  background: linear-gradient(135deg, #134e5e, #71b280);
}

.guru {
  background: linear-gradient(135deg, #42275a, #734b6d);
}

.pesan {
  background: linear-gradient(135deg, #373b44, #4286f4);
}
.eskul {
  background: linear-gradient(135deg, #0f2027, #2c5364);
}

.fasilitas {
  background: linear-gradient(135deg, #1d4350, #a43931);
}

.testimoni {
  background: linear-gradient(135deg, #42275a, #734b6d);
}

.pendaftaran {
  background: linear-gradient(135deg, #134e5e, #71b280);
}
/* ===== PENDAFTAR TERBARU — ELEGANT VERSION ===== */

.daftar-terbaru{
    border-radius:20px;
    overflow:hidden;
    border:none;
    background:#ffffff;
    box-shadow:0 10px 30px rgba(15,23,42,0.08);
}

/* HEADER CARD */
.daftar-header{
    background: linear-gradient(135deg,#1e293b,#334155);
    color:#fff;
    font-weight:700;
    padding:15px 22px;
    font-size:15px;
    letter-spacing:0.3px;
}

/* TABLE */
.table thead th{
    font-size:13px;
    font-weight:700;
    color:#475569;
    border-bottom:1px solid #e2e8f0;
    background:#f8fafc;
}

.table tbody td{
    vertical-align:middle;
    font-size:14px;
    color:#334155;
    border-color:#f1f5f9;
}

.table tbody tr:hover{
    background:#f8fafc;
    transition:.2s;
}

/* BADGE ASAL SEKOLAH */
.bg-soft{
    background:#eef2ff;
    color:#4338ca;
    font-weight:600;
    padding:6px 11px;
    border-radius:10px;
    font-size:12px;
}

/* BUTTON KELOLA */
.btn-kelola{
    background:#334155;
    color:white;
    border:none;
    border-radius:10px;
    padding:5px 12px;
    font-size:12px;
    transition:.25s ease;
}

.btn-kelola:hover{
    background:#1e293b;
    transform: translateY(-1px);
    box-shadow:0 6px 12px rgba(30,41,59,0.25);
    color:white;
}

/* FOOTER LINK */
.card-footer{
    background:#f8fafc;
    border-top:1px solid #e2e8f0;
}

.lihat-semua{
    color:#334155;
    font-weight:600;
    text-decoration:none;
    font-size:14px;
}

.lihat-semua:hover{
    color:#1e293b;
    text-decoration:underline;
}

</style>
<script>
function updateJam() {
    const now = new Date();

    const jam = now.toLocaleTimeString('id-ID');
    const tanggal = now.toLocaleDateString('id-ID', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });

    document.getElementById('jam').innerHTML = jam;
    document.getElementById('tanggal').innerHTML = tanggal;
}

setInterval(updateJam, 1000);
updateJam();
</script>

<?php include "template/footer.php"; ?>
