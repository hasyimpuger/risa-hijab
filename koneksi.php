<?php
  $username = "hijab";
  $password = "hijab";
  $server = "localhost/XE";
  $koneksi = oci_connect($username, $password, $server);
  if (!$koneksi) {
    $err = oci_error();
    echo "Gagal tersambung ke ORACLE". $err['text'];
  }
  oci_close($koneksi);
?>
