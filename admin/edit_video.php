<?php
include "../koneksi.php";
include "template/header.php";
include "template/menu.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM video_kegiatan WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<main class="app-main">
<div class="app-content">
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Video Kegiatan</h3>
    </div>

<form method="post" action="update_video.php">

<div class="card-body">

<input type="hidden" name="id" value="<?= $d['id']; ?>">

<div class="form-group mb-3">
<label>Judul Video</label>
<input type="text" name="judul_video" class="form-control"
value="<?= $d['judul_video']; ?>" required>
</div>

<div class="form-group mb-3">
<label>Link Video (Embed Youtube)</label>
<input type="text" name="video" class="form-control"
value="<?= $d['video']; ?>" required>
</div>

<!-- Preview Video Lama -->
<div class="mb-3">
<label>Preview Video Lama</label><br>

<iframe id="video-preview"
width="400"
height="225"
src="<?= $d['video']; ?>"
frameborder="0"
allowfullscreen>
</iframe>

</div>

<div class="form-group mb-3">
<label>Tanggal</label>
<input type="date" name="tanggal" class="form-control"
value="<?= $d['tanggal']; ?>" required>
</div>

</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary">
<i class="bi bi-save"></i> Simpan
</button>

<a href="data_berita.php" class="btn btn-secondary">
<i class="bi bi-arrow-left"></i> Kembali
</a>
</div>

</form>

</div>

</div>
</div>
</main>

<?php include "template/footer.php"; ?>