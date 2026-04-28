<?php
include "../koneksi.php";
include "template/header.php";
include "template/menu.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM fasilitas WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<main class="app-main">
<div class="app-content">
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data fasilitas</h3>
    </div>

    <form method="post" action="update_fasilitas.php" enctype="multipart/form-data">
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
            <label class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" accept="image/*" onchange="previewImage(this)">
        </div>
            <input type="hidden" name="gambar_lama" value="<?= $d['foto']; ?>">
        <div>
          <img id="img-preview" src="../gambar/<?= $d['foto']; ?>" class="img-fluid mt-2" style="max-height:200px;">
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

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan
        </button>
        <a href="data_fasilitas.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    </form>

</div>

</div>
</div>
</main>

<?php include "template/footer.php"; ?>