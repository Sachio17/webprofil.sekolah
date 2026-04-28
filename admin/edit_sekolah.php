<?php
include "../koneksi.php";
include "template/header.php";
include "template/menu.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM profil_sekolah WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<main class="app-main">
<div class="app-content">
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data Sekolah</h3>
    </div>

    <form method="post" action="update_sekolah.php" enctype="multipart/form-data">
    <div class="card-body">

        <input type="hidden" name="id" value="<?= $d['id']; ?>">

        <div class="mb-3">
            <label class="form-label">Nama Sekolah</label>
            <input type="text" name="nama_sekolah" class="form-control" 
                   value="<?= $d['nama_sekolah']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">NPSN</label>
            <input type="number" name="npsn" class="form-control" 
                   value="<?= $d['npsn']; ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" 
                   value="<?= $d['alamat']; ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Desa</label>
            <input type="text" name="desa" class="form-control" 
                   value="<?= $d['desa']; ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Kecamatan</label>
            <input type="text" name="kecamatan" class="form-control" 
                   value="<?= $d['kecamatan']; ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Kabupaten</label>
            <input type="text" name="kabupaten" class="form-control" 
                   value="<?= $d['kabupaten']; ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Provinsi</label>
            <input type="text" name="provinsi" class="form-control" 
                   value="<?= $d['provinsi']; ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" 
                   value="<?= $d['email']; ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Telepon</label>
            <input type="tel" name="telepon" class="form-control" 
                   value="<?= $d['telepon']; ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Website</label>
            <input type="text" name="website" class="form-control" 
                   value="<?= $d['website']; ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Kepala Sekolah</label>
            <input type="text" name="kepala_sekolah" class="form-control" 
                   value="<?= $d['kepala_sekolah']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Logo</label>
            <input type="file" name="logo" class="form-control" accept="image/*" onchange="previewImage(this)">
        </div>
            <input type="hidden" name="logo_lama" value="<?= $d['logo']; ?>">
        <div>
          <img id="img-preview" src="../gambar/<?= $d['logo']; ?>" class="img-fluid mt-2" style="max-height:200px;">
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
  <label class="form-label">Visi</label>
  <textarea name="visi" class="form-control" rows="3" 
  value="<?= $d['visi']; ?>" required></textarea>
</div>

<div class="mb-3">
  <label class="form-label">Misi</label>
  <textarea name="misi" class="form-control" rows="6" 
  value="<?= $d['misi']; ?>" required></textarea>
</div>

<div class="mb-3">
  <label class="form-label">Deskripsi</label>
  <textarea name="deskripsi" class="form-control" rows="4" 
  value="<?= $d['deskripsi']; ?>" required></textarea>
</div>
       
         


    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan
        </button>
        <a href="data_sekolah.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    </form>

</div>

</div>
</div>
</main>

<?php include "template/footer.php"; ?>