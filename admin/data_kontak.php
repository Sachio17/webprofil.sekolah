<?php
include 'template/header.php';
include 'template/menu.php';
?>

<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <!--begin::Conteiner-->
    <div class="container-fluid">
          <!--begin::Row-->
          <div class="row">
          <div class="col-sm-6"><h3 class="mb-0">Data Kontak</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Kontak</li>
          </ol>
        </div>
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content Header-->

  <!--begin::App Content-->
  <div class="app-content">
    <!--begin::Conteiner-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-12">
<!-- Default box-->
          <div class="card ">
            <div class="card-header">
              <h3 class="card-title">Title</h3>
              <div class="card-tools">
                <button
                type="button"
                class="btn btn-tool"
                data-lte-toggle="card-collapse"
                title="Collapse"
                >
                  <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                  <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                </button>
                <button
                type="button"
                class="btn btn-tool"
                data-lte-toggle="card-remove"
                title="Remove"
                >
                <i class="bi bi-x-lg"></i>
                  

                </button>
              </div>
            </div>

            <div class="card-body">
              <!--end::App Content Header-->
            <!--begin::App Content-->
            <div class="app-content">
              <!--begin::Container-->
              <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                   <div class="col-md-12">
                    <div class="card-mb-10">
                      <div class="card-header"><h3 class="card-title">Data Kontak</h3></div>

                    <!-- /.card-header -->
                    <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width:10px">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Tanggal Kirim</th>
                    <th>Balas
                    <th style="width:40px">Aksi</th>
                  </tr>
                </thead>
               <tbody>
                              <?php
                                include '../koneksi.php';
                                $no = 1;
                                $data = mysqli_query($koneksi, "SELECT * FROM pesan ORDER BY id DESC");

                                while ($d = mysqli_fetch_assoc($data)) {
                                ?>
                                <tr class="align-middle">
                                    <td><?= $no++; ?></td>
                                    <td><?= $d['nama']; ?></td>
                                    <td><?= $d['email']; ?></td>
                                    <td><?= $d['isi']; ?></td>
                                    <td><?= $d['dibuat_pada']; ?></td>

                                    <!-- STATUS -->
                                    <td class="text-center">
                                        <?php if($d['status'] == 'baru') { ?>
                                            <span class="badge bg-danger">Baru</span>
                                        <?php } elseif ($d['status'] == 'dibalas') { ?>
                                          <span class="badge bg-success">Sudah Dibalas</span>
                                      <?php } ?>
                                    </td>

                                    <!-- AKSI -->
                                    <td class="text-center">
                                        <a href="balas.php?id=<?= $d['id']; ?>" class="btn btn-sm btn-primary">
                                            <i class="bi bi-reply"></i>
                                        </a>

                                        <a href="hapus_kontak.php?id=<?= $d['id']; ?>" 
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                              <?php } 
                            ?>
                            </tbody>
              </table>
            </div>
             <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-end">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.card-body -->
 <div class="card-footer">Footer</div>
 <!-- /.card-footer-->
</div>
 <!-- /.card -->
</div>
</div>
 <!--end::Row-->
</div>
</div>
  <!--end::App Content-->
</main>
<?php
include 'template/footer.php';
?>`