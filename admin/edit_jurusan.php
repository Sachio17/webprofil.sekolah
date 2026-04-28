<?php
include "../koneksi.php";
include "template/header.php";
include "template/menu.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<main class="app-main">
<div class="app-content">
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data Jurusan</h3>
    </div>

    <form method="post" action="update_jurusan.php" enctype="multipart/form-data">
    <div class="card-body">

        <input type="hidden" name="id" value="<?= $d['id']; ?>">
        <input type="hidden" name="gambar_lama" value="<?= $d['gambar']; ?>">

        <div class="mb-3">
            <label class="form-label">Kode Jurusan</label>
            <input type="text" name="kode_jurusan" class="form-control"
                   value="<?= $d['kode_jurusan']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Jurusan</label>
            <input type="text" name="nama_jurusan" class="form-control"
                   value="<?= $d['nama_jurusan']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required><?= $d['deskripsi']; ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Keahlian (Pisahkan dengan | )</label>
            <textarea name="keahlian" class="form-control" rows="3" required><?= $d['keahlian']; ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Prospek Karir (Pisahkan dengan | )</label>
            <textarea name="prospek_karir" class="form-control" rows="3" required><?= $d['prospek_karir']; ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" name="gambar" class="form-control"
                   accept="image/*" onchange="previewImage(this)">
        </div>

        <div>
            <img id="img-preview"
                 src="../gambar/<?= $d['gambar']; ?>"
                 class="img-fluid mt-2"
                 style="max-height:200px;">
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Update
        </button>
        <a href="data_jurusan.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    </form>

</div>

</div>
</div>
</main>

<script>
function previewImage(input){
  const preview = document.getElementById('img-preview');
  const file = input.files[0];

  if(file){
    const reader = new FileReader();
    reader.onload = function(){
      preview.src = reader.result;
    }
    reader.readAsDataURL(file);
  }
}
</script>

<?php include "template/footer.php"; ?>