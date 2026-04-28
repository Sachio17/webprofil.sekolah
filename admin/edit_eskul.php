<?php
include "../koneksi.php";
include "template/header.php";
include "template/menu.php";


$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM eskul WHERE id='$id'
");
$d = mysqli_fetch_array($data);
?>

<main class="app-main">
<div class="app-content">
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data Eskul</h3>
    </div>

    <form method="post" action="update_eskul.php" enctype="multipart/form-data">
    <div class="card-body">

        <input type="hidden" name="id" value="<?= $d['id']; ?>">

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" 
                   value="<?= $d['nama']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" 
                   value="<?= $d['deskripsi']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Icon</label>
            <input type="text" name="icon" class="form-control" 
                   value="<?= $d['icon']; ?>" required>
        </div>



    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan
        </button>
        <a href="data_eskul.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    </form>

</div>

</div>
</div>
</main>

<?php include "template/footer.php"; ?>