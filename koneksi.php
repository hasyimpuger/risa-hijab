<?php
  $username = "risa";
  $password = "risa";
  $server = "localhost/XE";
  $koneksi = oci_connect($username, $password, $server);
  if (!$koneksi) {
    $err = oci_error();
    echo "Gagal tersambung ke ORACLE". $err['text'];
  }
?>
