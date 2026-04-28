<?php
include "../koneksi.php";
include "template/header.php";
include "template/menu.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM galeri WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<main class="app-main">
<div class="app-content">
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data galeri</h3>
    </div>

    <form method="post" action="update_galeri.php" enctype="multipart/form-data">
    <div class="card-body">

        <input type="hidden" name="id" value="<?= $d['id']; ?>">

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" 
                   value="<?= $d['judul']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" 
                   value="<?= $d['deskripsi']; ?>" required>
        </div>
<div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" name="gambar" class="form-control" accept="image/*" onchange="previewImage(this)">
        </div>
            <input type="hidden" name="gambar_lama" value="<?= $d['gambar']; ?>">
        <div>
          <img id="img-preview" src="../gambar/<?= $d['gambar']; ?>" class="img-fluid mt-2" style="max-height:200px;">
        </div>
        
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
          <div class="mb-3">
    <label class="form-label">Tanggal Upload</label>
    <input type="date" name="tanggal_upload"
           class="form-control"
           value="<?= $d['tanggal_upload']; ?>" required>
</div>


    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan
        </button>
        <a href="data_galeri.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    </form>

</div>

</div>
</div>
</main>

<?php include "template/footer.php"; ?>