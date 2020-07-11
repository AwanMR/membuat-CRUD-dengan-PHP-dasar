<?php

require_once 'function.php';

$movies = query("SELECT * FROM movie");
?>
<!doctype html>
<html>
  <head>
    <title>Halaman Utama</title>
  </head>
  <body style="font-family: 'comic sans ms'">
    <h1>Judul judul film</h1>
    <a href="tambah.php">tambah data</a>
    <table border="1" cellspacing="0" cellpadding="10">
      <tr>
        <th>#</th>
        <th>judul</th>
        <th>genre</th>
        <th>poster</th>
      </tr>
      <?php
      $no = 1;
      foreach($movies as $movie) : ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $movie['judul']; ?></td>
        <td><?= $movie['genre']; ?></td>
        <td><img src="img/<?= $movie['judul']; ?>" width="50px"></td>
        <td></td>
          <a href="update.php?id=<?= $movie['id']; ?>">update</a>
          <a href="hapus.php?id=<?= $movie['id']; ?>" onclick="return confirm('anda yakin?');">hapus</a>
        </td>
      </tr>
    </table>
  </body>
</html>
