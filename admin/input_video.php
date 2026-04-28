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
          <h3 class="mb-0">Input Video Kegiatan</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Input Video Kegiatan</li>
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
                  <div class="card-title">Masukkan Video Kegiatan</div>
                </div>

                <!--begin::Form-->
               <form action="proses_video.php" method="POST">

<div class="form-group">
<label>Judul Video</label>
<input type="text" name="judul_video" class="form-control">
</div>

<div class="form-group">
<label>Video Kegiatan </label>
<input type="text" name="video" class="form-control" placeholder="Link Embed Youtube">
</div>


<div class="form-group">
<label>Tanggal</label>
<input type="date" name="tanggal" class="form-control">
</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary">
<i class="bi bi-save"></i> Simpan
</button>

<a href="data_video.php" class="btn btn-secondary">
<i class="bi bi-arrow-left"></i> Kembali
</a>
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