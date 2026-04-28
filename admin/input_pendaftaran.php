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
          <h3 class="mb-0">Input Kontak</h3>
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
                  <div class="card-title">Masukkan Data Kontak</div>
                </div>

                <!--begin::Form-->
                <form action="proses_kontak.php" method="post">
                  <div class="card-body">

                    <div class="mb-3">
                      <label class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Pesan</label>
                      <input type="text" name="pesan" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Tanggal Kirim</label>
                      <input type="date" name="tanggal_kirim" class="form-control" required>
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