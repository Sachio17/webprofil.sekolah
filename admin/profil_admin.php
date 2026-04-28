<?php
session_start();
include "../koneksi.php";

$username = $_SESSION['username'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'"));

$foto = $data['foto'] ?? 'default.png';
?>

<!DOCTYPE html>
<html>
<head>
<title>Profil Admin</title>

<style>
body {
  background: linear-gradient(135deg, #e9f5ff, #f9fcff);
  font-family: 'Segoe UI', sans-serif;
}

/* CONTAINER */
.profile-wrapper {
  max-width: 950px;
  margin: 50px auto;
  background: rgba(255,255,255,0.8);
  backdrop-filter: blur(18px);
  border-radius: 22px;
  padding: 30px;
  box-shadow: 0 25px 45px rgba(0,0,0,.08);
  animation: fadeIn .6s ease;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

/* HEADER */
.profile-header {
  text-align: center;
  margin-bottom: 30px;
}

.profile-header img {
  width: 190px;
  height: 190px;
  border-radius: 50%;
  object-fit: cover;
  border: 5px solid #2563eb;
  box-shadow: 0 12px 30px rgba(0,0,0,.15);
  cursor: pointer;
  transition: .3s;
}

.profile-header img:hover {
  transform: scale(1.05);
  box-shadow: 0 0 30px rgba(37,99,235,.7);
}

.profile-header h2 {
  margin-top: 12px;
}

.badge-role {
  background: linear-gradient(135deg,#22c55e,#2563eb);
  color: white;
  padding: 6px 18px;
  border-radius: 999px;
  font-size: 14px;
  font-weight: 600;
}

/* INFO GRID */
.profile-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 22px;
  margin-top: 30px;
}

.info-card {
  background: white;
  border-radius: 16px;
  padding: 18px 20px;
  box-shadow: 0 10px 22px rgba(0,0,0,.06);
  transition: .25s;
}

.info-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 28px rgba(0,0,0,.12);
}

.info-label {
  font-size: 13px;
  color: #777;
}

.info-value {
  font-size: 16px;
  font-weight: 600;
  margin-top: 4px;
}

/* HIDDEN INPUT */
#fotoInput {
  display: none;
}

/* SAVE BUTTON */
.save-btn {
  margin-top: 28px;
  width: 100%;
  padding: 14px;
  border-radius: 14px;
  border: none;
  background: linear-gradient(135deg,#2563eb,#22c55e);
  color: white;
  font-weight: 700;
  cursor: pointer;
  transition: .25s;
}

.save-btn:hover {
  transform: scale(1.02);
  box-shadow: 0 0 25px rgba(37,99,235,.4);
}
</style>

</head>
<body>

<div class="profile-wrapper">

<form action="update_foto.php" method="post" enctype="multipart/form-data">

  <!-- FOTO PROFIL -->
  <div class="profile-header">
    <img src="../gambar/<?php echo $foto; ?>" id="previewFoto" onclick="document.getElementById('fotoInput').click()">

    <input type="file" name="foto" id="fotoInput" required>

    <h2><?php echo $data['username']; ?></h2>
    <span class="badge-role">Administrator</span>
  </div>

  <!-- INFO AKUN -->
  <div class="profile-grid">

    <div class="info-card">
      <div class="info-label">Username</div>
      <div class="info-value"><?php echo $data['username']; ?></div>
    </div>

    <div class="info-card">
      <div class="info-label">Status</div>
      <div class="info-value">Aktif</div>
    </div>

    <div class="info-card">
      <div class="info-label">Bergabung</div>
      <div class="info-value"><?php echo $data['created_at'] ?? 'Admin Sekolah'; ?></div>
    </div>

  </div>

  <button class="save-btn">💾 Simpan Foto Profil</button>

</form>

</div>

<script>
document.getElementById('fotoInput').addEventListener('change', function(e) {
  const file = e.target.files[0];
  if(file){
    document.getElementById('previewFoto').src = URL.createObjectURL(file);
  }
});
</script>

</body>
</html>
