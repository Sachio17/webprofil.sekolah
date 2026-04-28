<?php
include "../koneksi.php";
include "template/header.php";
include "template/menu.php";

$data = mysqli_query($koneksi, "SELECT * FROM jurusan ORDER BY id DESC");
?>

<div class="container mt-4">
  <div class="card">
    <div class="card-header bg-success text-white">
      Data Jurusan
      <a href="input_jurusan.php" class="btn btn-light btn-sm float-end">
        + Tambah Jurusan
      </a>
    </div>


     <div class="card-body">

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Kode</th>
            <th>Nama Jurusan</th>
            <th>Keahlian</th>
            <th>Prospek Karir</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

        <?php $no=1; while($row = mysqli_fetch_assoc($data)): ?>
          <tr>
            <td><?= $no++; ?></td>

            <td>
              <img src="../gambar/<?= $row['gambar']; ?>" 
              width="80" class="img-thumbnail">
            </td>

            <td><?= $row['kode_jurusan']; ?></td>

            <td>
              <strong><?= $row['nama_jurusan']; ?></strong><br>
              <small><?= substr($row['deskripsi'],0,60); ?>...</small>
            </td>

            <td>
              <?php
              $keahlian = explode("|",$row['keahlian']);
              foreach($keahlian as $k){
                echo "<span class='badge bg-primary me-1'>$k</span>";
              }
              ?>
            </td>

            <td>
              <?php
              $karir = explode("|",$row['prospek_karir']);
              foreach($karir as $k){
                echo "<span class='badge bg-success me-1'>$k</span>";
              }
              ?>
            </td>

            <td>
              <a href="edit_jurusan.php?id=<?= $row['id']; ?>" 
                 class="btn btn-warning btn-sm">Edit</a>

              <a href="hapus_jurusan.php?id=<?= $row['id']; ?>" 
                 onclick="return confirm('Yakin hapus data?')" 
                 class="btn btn-danger btn-sm">Hapus</a>
            </td>

          </tr>
        <?php endwhile; ?>

        </tbody>
      </table>
    </div>
    </div>
  </div>
</div>

<?php include "template/footer.php"; ?>