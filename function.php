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
