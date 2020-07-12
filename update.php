<?php

require_once 'function.php';

if (isset($_POST['tbl_ubah'])) {
  if (update($_POST) > 0) {
      echo "<script>
          alert('data berhasil diubah');
          document.location.href='index.php';
          </script>";
  } else {
      echo "<script>
          alert('data gagal diubah');
          </script>";
  }
}
$movie = getId($_GET['id'])[0];
?>
<!doctype html>
<html>
  <head>
    <title>form ubah</title>
  </head>
  <body style="font-family: 'comic sans ms'">
    <h1>tambah data</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <ul>
         <input type="hidden" name="id" value="<?=$movie['id']; ?>">
         <input type="hidden" name="poster_lama" value="<?=$movie['poster']; ?>">
         <li>
             <label>judul</label>
             <input type="text" name="judul" autocomplete="off" value="<?=$movie['judul']; ?>">
         </li>
         <li>
             <label>genre</label>
             <input type="text" name="genre" autocomplete="off" value="<?=$movie['genre']; ?>">
         </li>
         <li>
             <img src="img/<?=$movie['poster']; ?>">
         </li>
         </li>
         <li>
             <label>poster</label>
             <input type="file" name="poster">
         </li>
         <li>
             <button type="submit" name="tbl_ubah">simpan</button>
         </li>
      </ul>
    </form>
    <a href="index.php">kembali ke halaman utama</a>
  </body>
</html>
