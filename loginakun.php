<?php
  include_once 'koneksi.php';
  session_start();

  $email = $_POST['email'];
  $password = $_POST['password'];

  $cek = "SELECT * FROM pelanggan WHERE email = '$email' AND password = '$password'";
  $cekData = oci_parse($koneksi, $cek);
  oci_execute($cekData);
  $hasil = oci_fetch_assoc($cekData);
  $_SESSION['pelanggan'] = $hasil['IDPELANGGAN'];
  header("location:login.php");
?>
