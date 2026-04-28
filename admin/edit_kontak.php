<?php
include "../koneksi.php";
include "template/header.php";
include "template/menu.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM kontak WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<main class="app-main">
<div class="app-content">
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data Kontak</h3>
    </div>

    <form method="post" action="update_kontak.php">
    <div class="card-body">

        <input type="hidden" name="id" value="<?= $d['id']; ?>">

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" 
                   value="<?= $d['nama']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" 
                   value="<?= $d['email']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pesan</label>
            <textarea name="pesan" rows="4" class="form-control" required><?= $d['pesan']; ?></textarea>
        </div>
          <div class="mb-3">
    <label class="form-label">Tanggal Kirim</label>
    <input type="date" name="tanggal_kirim"
           class="form-control"
           value="<?= $d['tanggal_kirim']; ?>" required>
</div>


    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan
        </button>
        <a href="data_kontak.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    </form>

</div>

</div>
</div>
</main>

<?php include "template/footer.php"; ?>