<?php
include 'template/header.php';
include 'template/menu.php';
?>

<form action="proses_jurusan.php" method="post" enctype="multipart/form-data">
  <div class="card-body">

    <div class="mb-3">
      <label class="form-label">Kode Jurusan</label>
      <input type="text" name="kode_jurusan" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Nama Jurusan</label>
      <input type="text" name="nama_jurusan" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Keahlian (Pisahkan dengan tanda | )</label>
      <textarea name="keahlian" class="form-control" rows="3" 
      placeholder="Contoh: Pemrograman Web|Mobile App|Game Dev" required></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Prospek Karir (Pisahkan dengan tanda | )</label>
      <textarea name="prospek_karir" class="form-control" rows="3"
      placeholder="Contoh: Web Developer|Freelancer|UI/UX Designer" required></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Gambar</label>
      <input type="file" name="gambar" class="form-control" accept="image/*" onchange="previewImage(this)" required>
    </div>

    <div>
      <img id="img-preview" class="img-fluid mt-2" style="max-height:200px;">
    </div>

  </div>

  <div class="card-footer">
    <button type="submit" class="btn btn-success">Simpan Jurusan</button>
  </div>
</form>
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
<?php
include 'template/footer.php';
?>