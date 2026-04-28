<?php
include 'template/header.php';
include 'template/menu.php';
include "../koneksi.php";

$query = "SELECT * FROM pendaftaran ORDER BY id DESC";
$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

<div class="container-fluid">
<div class="card daftar-terbaru mt-4">
    <div class="card-header daftar-header">
        <i class="bi bi-person-plus-fill me-2"></i> Data Pendaftar PPDB
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Nama Lengkap</th>
                        <th>Panggilan</th>
                        <th>TTL</th>
                        <th>JK</th>
                        <th>Agama</th>
                        <th>Orang Tua</th>
                        <th>No HP</th>
                        <th>Asal Sekolah</th>
                        <th>Tahun</th>
                        <th>KTP</th>
<th>KK</th>
<th>Akta</th>
<th>Ijazah</th>
<th>Foto 2x3</th>
<th>Foto 3x4</th>

                        <th>Sumber</th>
                        <th width="90" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                if(mysqli_num_rows($hasil) > 0):
                $no = 1; 
                while($row = mysqli_fetch_assoc($hasil)): 
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><strong><?= htmlspecialchars($row['nama_lengkap']) ?></strong></td>
                        <td><?= htmlspecialchars($row['nama_panggilan']) ?></td>
                        <td><?= htmlspecialchars($row['ttl']) ?></td>
                        <td><?= htmlspecialchars($row['jk']) ?></td>
                        <td><?= htmlspecialchars($row['agama']) ?></td>
                        <td>
                            <?= htmlspecialchars($row['ortu_nama']) ?><br>
                            <small class="text-muted"><?= htmlspecialchars($row['ortu_status']) ?></small>
                        </td>
                        <td><?= htmlspecialchars($row['no_hp']) ?></td>
                        <td>
                            <span class="badge bg-soft">
                                <?= htmlspecialchars($row['nama_sekolah']) ?>
                            </span>
                        </td>
                        <td><?= htmlspecialchars($row['tahun_lulus']) ?></td>
                        <td>
  
<?php if($row['ktp']) : ?>
    <button 
        class="btn btn-sm btn-outline-primary preview-btn"
        data-img="../upload/<?= $row['ktp']; ?>"
        data-title="Preview KTP - <?= htmlspecialchars($row['nama_lengkap']); ?>">
        <i class="bi bi-eye"></i>
    </button>
<?php else: ?>
    -
<?php endif; ?>
</td>

<td>
<?php if($row['kk']) : ?>
    <button 
        class="btn btn-sm btn-outline-primary preview-btn"
        data-img="../upload/<?= $row['kk']; ?>"
        data-title="Preview kk - <?= htmlspecialchars($row['nama_lengkap']); ?>">
        <i class="bi bi-eye"></i>
    </button>
<?php else: ?>
    -
<?php endif; ?>
</td>

<td>
<?php if($row['akta']) : ?>
    <button 
        class="btn btn-sm btn-outline-primary preview-btn"
        data-img="../upload/<?= $row['akta']; ?>"
        data-title="Preview akta - <?= htmlspecialchars($row['nama_lengkap']); ?>">
        <i class="bi bi-eye"></i>
    </button>
<?php else: ?>
    -
<?php endif; ?>
</td>
<td>
<?php if($row['ijazah']) : ?>
    <button 
        class="btn btn-sm btn-outline-primary preview-btn"
        data-img="../upload/<?= $row['ijazah']; ?>"
        data-title="Preview ijazah - <?= htmlspecialchars($row['nama_lengkap']); ?>">
        <i class="bi bi-eye"></i>
    </button>
<?php else: ?>
    -
<?php endif; ?>
</td>
<td>
<?php if($row['foto_2x3']) : ?>
    <button 
        class="btn btn-sm btn-outline-primary preview-btn"
        data-img="../upload/<?= $row['foto_2x3']; ?>"
        data-title="Preview foto 2x3 - <?= htmlspecialchars($row['nama_lengkap']); ?>">
        <i class="bi bi-eye"></i>
    </button>
<?php else: ?>
    -
<?php endif; ?>
</td>
<td>
<?php if($row['foto_3x4']) : ?>
    <button 
        class="btn btn-sm btn-outline-primary preview-btn"
        data-img="../upload/<?= $row['foto_3x4']; ?>"
        data-title="Preview foto 3x4 - <?= htmlspecialchars($row['nama_lengkap']); ?>">
        <i class="bi bi-eye"></i>
    </button>
<?php else: ?>
    -
<?php endif; ?>
</td>
                        <td><?= htmlspecialchars($row['sumber_info']) ?></td>
                        <td class="text-center">
                            <a href="hapus_pendaftaran.php?id=<?= $row['id']; ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php 
                endwhile;
                else:
                ?>
                    <tr>
                        <td colspan="18" class="text-center p-4 text-muted">
                            Belum ada data pendaftar
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
    <style>
        .daftar-terbaru{
    border-radius:20px;
    overflow:hidden;
    border:none;
    background:#ffffff;
    box-shadow:0 15px 35px rgba(15,23,42,0.07);
}

.daftar-header{
    background: linear-gradient(135deg,#0f172a,#1e293b);
    color:#fff;
    font-weight:700;
    padding:16px 25px;
    font-size:15px;
    letter-spacing:0.5px;
}

.table thead th{
    font-size:13px;
    font-weight:700;
    color:#475569;
    background:#f8fafc;
    border-bottom:1px solid #e2e8f0;
}

.table tbody td{
    font-size:14px;
    color:#334155;
    border-color:#f1f5f9;
}

.table tbody tr:hover{
    background:#f8fafc;
    transition:.2s ease;
}

.bg-soft{
    background:#eef2ff;
    color:#4338ca;
    font-weight:600;
    padding:6px 12px;
    border-radius:12px;
    font-size:12px;
}
      /* ===== PENDAFTAR TERBARU — ELEGANT VERSION ===== */

.daftar-terbaru{
    border-radius:20px;
    overflow:hidden;
    border:none;
    background:#ffffff;
    box-shadow:0 10px 30px rgba(15,23,42,0.08);
}

/* HEADER CARD */
.daftar-header{
    background: linear-gradient(135deg,#1e293b,#334155);
    color:#fff;
    font-weight:700;
    padding:15px 22px;
    font-size:15px;
    letter-spacing:0.3px;
}

/* TABLE */
.table thead th{
    font-size:13px;
    font-weight:700;
    color:#475569;
    border-bottom:1px solid #e2e8f0;
    background:#f8fafc;
}

.table tbody td{
    vertical-align:middle;
    font-size:14px;
    color:#334155;
    border-color:#f1f5f9;
}

.table tbody tr:hover{
    background:#f8fafc;
    transition:.2s;
}

/* BADGE ASAL SEKOLAH */
.bg-soft{
    background:#eef2ff;
    color:#4338ca;
    font-weight:600;
    padding:6px 11px;
    border-radius:10px;
    font-size:12px;
}

/* BUTTON KELOLA */
.btn-kelola{
    background:#334155;
    color:white;
    border:none;
    border-radius:10px;
    padding:5px 12px;
    font-size:12px;
    transition:.25s ease;
}

.btn-kelola:hover{
    background:#1e293b;
    transform: translateY(-1px);
    box-shadow:0 6px 12px rgba(30,41,59,0.25);
    color:white;
}

/* FOOTER LINK */
.card-footer{
    background:#f8fafc;
    border-top:1px solid #e2e8f0;
}

.lihat-semua{
    color:#334155;
    font-weight:600;
    text-decoration:none;
    font-size:14px;
}

.lihat-semua:hover{
    color:#1e293b;
    text-decoration:underline;
}
.btn-outline-primary{
    border-radius:8px;
    font-size:12px;
    padding:4px 10px;
}

.btn-outline-primary:hover{
    background:#1e293b;
    color:white;
    border-color:#1e293b;
}
.preview-btn{
    border-radius:8px;
    padding:4px 10px;
    font-size:12px;
}

.preview-btn:hover{
    background:#1e293b;
    color:white;
    border-color:#1e293b;
    transform:scale(1.05);
    transition:0.2s ease;
}

</style>
    <!-- Modal Preview -->
<div class="modal fade" id="previewModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 border-0 shadow">
      
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="previewTitle">Preview</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-center">
        <img id="previewImage" src="" class="img-fluid rounded shadow-sm">
      </div>

    </div>
  </div>
</div>
<script>
document.querySelectorAll('.preview-btn').forEach(button => {
    button.addEventListener('click', function() {
        const imgSrc = this.getAttribute('data-img');
        const title = this.getAttribute('data-title');

        document.getElementById('previewImage').src = imgSrc;
        document.getElementById('previewTitle').innerText = title;

        let modal = new bootstrap.Modal(document.getElementById('previewModal'));
        modal.show();
    });
});
</script>
<?php
include 'template/footer.php';
?>