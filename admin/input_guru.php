<?php
include 'template/header.php';
include 'template/menu.php';
?>

<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Input Guru</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Input Kontak</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--end::App Content Header-->

  <!--begin::App Content-->
  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Title</h3>
            </div>

            <div class="card-body">
              <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                  <div class="card-title">Masukkan Data Guru</div>
                </div>

                <!--begin::Form-->
                <form action="proses_guru.php" method="post" >
                  <div class="card-body">

                    <div class="mb-3">
                      <label class="form-label">Nama Guru</label>
                      <input type="text" name="nama_guru" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Nip</label>
                      <input type="text" name="nip" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Jenis Kelamin</label>
                      <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
<input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan

                    </div>

                    <div class="mb-3">
                      <label class="form-label">Mapel</label>
                      <input type="text" name="mapel" class="form-control" required>
 
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
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">No Hp</label>
                      <input type="text" name="no_hp" class="form-control" required>
                    </div>
                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
                <!--end::Form-->

              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
  <!--end::App Content-->
</main>

<?php
include 'template/footer.php';
?>