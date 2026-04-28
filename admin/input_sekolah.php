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
          <h3 class="mb-0">Input Sekolah</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Input Sekolah</li>
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
                  <div class="card-title">Masukkan Data Sekolah</div>
                </div>

                <!--begin::Form-->
                <form action="proses_sekolah.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">

                    <div class="mb-3">
                      <label class="form-label">Nama Sekolah</label>
                      <input type="text" name="nama_sekolah" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">NPSN</label>
                      <input type="text" name="npsn" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Alamat</label>
                      <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Desa</label>
                      <input type="text" name="desa" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Kecamatan</label>
                      <input type="text" name="kecamatan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Kabupaten</label>
                      <input type="text" name="kabupaten" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Provinsi</label>
                      <input type="text" name="provinsi" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Telepon</label>
                      <input type="number" name="telepon" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Website</label>
                      <input type="text" name="website" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Kepala Sekolah</label>
                      <input type="text" name="kepala_sekolah" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Logo</label>
                       <input type="file" name="logo"
                            placeholder="Masukkan Foto Anda ..." class="form-control" required>
                    </div>
                 <div class="mb-3">
  <label class="form-label">Visi</label>
  <textarea name="visi" class="form-control" rows="3" required></textarea>
</div>

<div class="mb-3">
  <label class="form-label">Misi</label>
  <textarea name="misi" class="form-control" rows="6" required></textarea>
</div>

<div class="mb-3">
  <label class="form-label">Deskripsi</label>
  <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
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