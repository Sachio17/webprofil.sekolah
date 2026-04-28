<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){

    // =========================
    // DATA TEXT
    // =========================
    $nama_lengkap     = $_POST['nama_lengkap'];
    $nama_panggilan   = $_POST['nama_panggilan'];
    $ttl              = $_POST['ttl'];
    $jk               = $_POST['jk'];
    $agama            = $_POST['agama'];
    $kewarganegaraan  = $_POST['kewarganegaraan'];
    $ortu_nama        = $_POST['ortu_nama'];
    $ortu_status      = $_POST['ortu_status'];
    $no_hp            = $_POST['no_hp'];
    $asal_sekolah     = $_POST['asal_sekolah'];
    $nama_sekolah     = $_POST['nama_sekolah'];
    $tahun_lulus      = $_POST['tahun_lulus'];
    $sumber_info      = $_POST['sumber_info'];

    // =========================
    // UPLOAD FILE
    // =========================
    $uploadDir = "upload/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    function uploadFile($file, $uploadDir){
        $namaFile = time() . "_" . basename($file['name']);
        $targetPath = $uploadDir . $namaFile;
        move_uploaded_file($file['tmp_name'], $targetPath);
        return $namaFile;
    }

    $ktp      = uploadFile($_FILES['ktp'], $uploadDir);
    $kk       = uploadFile($_FILES['kk'], $uploadDir);
    $akta     = uploadFile($_FILES['akta'], $uploadDir);
    $ijazah   = uploadFile($_FILES['ijazah'], $uploadDir);
    $foto_2x3 = uploadFile($_FILES['foto_2x3'], $uploadDir);
    $foto_3x4 = uploadFile($_FILES['foto_3x4'], $uploadDir);

    // =========================
    // PREPARED STATEMENT
    // =========================
    $stmt = mysqli_prepare($koneksi,
        "INSERT INTO pendaftaran 
        (nama_lengkap,nama_panggilan,ttl,jk,agama,kewarganegaraan,
         ortu_nama,ortu_status,no_hp,asal_sekolah,nama_sekolah,
         tahun_lulus,ktp,kk,akta,ijazah,foto_2x3,foto_3x4,sumber_info)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
    );

    mysqli_stmt_bind_param($stmt,"sssssssssssssssssss",
        $nama_lengkap,
        $nama_panggilan,
        $ttl,
        $jk,
        $agama,
        $kewarganegaraan,
        $ortu_nama,
        $ortu_status,
        $no_hp,
        $asal_sekolah,
        $nama_sekolah,
        $tahun_lulus,
        $ktp,
        $kk,
        $akta,
        $ijazah,
        $foto_2x3,
        $foto_3x4,
        $sumber_info
    );

    $execute = mysqli_stmt_execute($stmt);

    if($execute){
        echo "<script>
                alert('Pendaftaran Berhasil!');
                window.location='pendaftaran.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

} else {
    header("Location: pendaftaran.php");
}
?>