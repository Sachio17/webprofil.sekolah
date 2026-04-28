


<form action="update_foto.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">

  <label>Ganti Foto Profil</label><br>
  <input type="file" name="foto" required><br><br>

  <button type="submit" name="update">Update Foto</button>
</form>