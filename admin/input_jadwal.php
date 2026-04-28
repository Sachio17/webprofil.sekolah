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
          <h3 class="mb-0">Input Jadwal Harian </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Input Jadwal Harian </li>
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
                  <div class="card-title">Masukkan Jadwal Harian</div>
                </div>

                <!--begin::Form-->
                
                <form action="proses_jadwal.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">

                    <div class="mb-3">
                      <label class="form-label">Waktu</label>
                      <input type="text" name="waktu" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Kegiatan</label>
                      <input type="text" name="kegiatan" class="form-control" required>
                        <div class="mb-3">
                      <label class="form-label">Kategori</label>
                      <input type="text" name="kategori" class="form-control" required>
                    </div>
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