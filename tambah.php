<?php

require_once 'function.php';

if (isset($_POST['tbl_tambah'])) {
  if (tambah($_POST) > 0) {
      echo "<script>
          alert('data berhasil ditambah');
          document.location.href='index.php';
          </script>";
  } else {
      echo "<script>
          alert('data gagal ditambah');
          </script>";
  }
}
?>
<!doctype html>
<html>
  <head>
    <title>form tambah</title>
  </head>
  <body style="font-family: 'comic sans ms'">
    <h1>tambah data</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <ul>
         <li>
             <label>judul</label>
             <input type="text" name="judul" autocomplete="off">
         </li>
         <li>
             <label>genre</label>
             <input type="text" name="genre" autocomplete="off">
         </li>
         <li>
             <label>poster</label>
             <input type="file" name="poster">
         </li>
         <li>
             <button type="submit" name="tbl_tambah">simpan</button>
         </li>
      </ul>
    </form>
    <a href="index.php">kembali ke halaman utama</a>
  </body>
</html>
