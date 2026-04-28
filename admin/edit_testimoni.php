<?php
include "../koneksi.php";
include "template/header.php";
include "template/menu.php";


$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM testimoni WHERE id='$id'
");
$d = mysqli_fetch_array($data);
?>

<main class="app-main">
<div class="app-content">
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data Testimoni</h3>
    </div>

    <form method="post" action="update_testimoni.php" enctype="multipart/form-data">
    <div class="card-body">

        <input type="hidden" name="id" value="<?= $d['id']; ?>">

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" 
                   value="<?= $d['nama']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Angkatan</label>
            <input type="text" name="angkatan" class="form-control" 
                   value="<?= $d['angkatan']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Pesan</label>
            <input type="text" name="pesan" class="form-control" 
                   value="<?= $d['pesan']; ?>" required>
        </div>



    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan
        </button>
        <a href="data_testimoni.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    </form>

</div>

</div>
</div>
</main>

<?php include "template/footer.php"; ?>