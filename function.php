<?php

$link = mysqli_connect('localhost', 'root', '', 'phpdasar');

function query($query) {
  global $link;
  $hasil = [];
  $result = mysqli_query($link, $result);
  while($row = mysqli_fetch_assoc($result)) {
    $hasil [] = $row;
  }
  return $hasil;
}
function tambah($data) {
  global $link;
  $judul = htmlspecialchars($data['judul']);
  $genre = htmlspecialchars($data['genre']);
  $poster = upload();
  //bila fungsi upload mengembalikan nilai salah
  //query tidak akan dijalankan 
  if (!$poster) {
    return false;
  }
  
  mysqli_query($link, "INSERT INTO movie VALUES('', '$judul', $genre', '$poster')");
  
  return mysqli_affected_rows($link);
}
function upload() {
  //tangkap data 
  $name = $_FILES['poster']['name'];
  $size = $_FILES['poster']['size'];
  $error = $_FILES['poster']['error'];
  $tmp_name = $_FILES['poster']['tmp_name'];
  // cek apakah ada poster yang diupload
  if ($error === 4) {
    echo "<script>
          alert('poster tidak boleh kosong');
          </script>";
          return false;
  }
  //buat aturan eksistensi gambar yang diperbolehkan 
  $eksis_file_valid = ['jpg', 'jpeg', 'png'];
  $eksis_file = explode('.', $name);
  $eksis_file = strtolower(end($eksis_file));
  //cek apakah sudah sesuai 
  if (!in_array($eksis_file, $eksis_file_valid)) {
    echo "<script>
          alert('poster harus gambar');
          </script>";
          return false ;
  }
  //size gambar tidak boleh lebih dari 2mb 
  if ($size > 2000000) {
    echo "<script>
          alert('ukuran poster terlalu besar');
          </script>";
          return false;
  }
  //mwmbuat nama baru untuk poster
  $nama_baru = uniqid();
  $nama_baru .= '.'.$eksis_file;
  
  move_uploaded_file($tmp_name, 'img/'.$nama_baru);
  //kembalikan nama barunya 
  return $nama_baru;
}
