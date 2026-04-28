<?php
include "../koneksi.php";
include "template/header.php";
include "template/menu.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM guru WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<main class="app-main">
<div class="app-content">
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data guru</h3>
    </div>

    <form method="post" action="update_guru.php" enctype="multipart/form-data">
    <div class="card-body">

        <input type="hidden" name="id" value="<?= $d['id']; ?>">

        <div class="mb-3">
            <label class="form-label">Nama Guru</label>
            <input type="text" name="nama_guru" class="form-control" 
                   value="<?= $d['nama_guru']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nip</label>
            <input type="number" name="nip" class="form-control" 
                   value="<?= $d['nip']; ?>" required>
        </div>
<div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <input type="text" name="jenis_kelamin" class="form-control" 
                   value="<?= $d['jenis_kelamin']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">mapel </label>
            <input type="text" name="mapel" class="form-control" 
                   value="<?= $d['mapel']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" accept="image/*" onchange="previewImage(this)">
        </div>
            <input type="hidden" name="foto_lama" value="<?= $d['foto']; ?>">
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
<div class="mb-3">
            <label class="form-label">email </label>
            <input type="email" name="email" class="form-control" 
                   value="<?= $d['email']; ?>" required>
        </div>
<div class="mb-3">
            <label class="form-label">No Hp </label>
            <input type="tel" name="no_hp" class="form-control" 
                   value="<?= $d['no_hp']; ?>" required>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan
        </button>
        <a href="data_guru.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    </form>

</div>

</div>
</div>
</main>

<?php include "template/footer.php"; ?>