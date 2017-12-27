<?php
  include_once 'koneksi.php';
  session_start();

  $namadpn = $_POST['namadepan'];
  $namablkg = $_POST['namabelakang'];
  $nohp = $_POST['nohp'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $data = "SELECT count(*) FROM pelanggan";
  $hasildata = oci_parse($koneksi, $data);
  oci_execute($hasildata);
  $id =  oci_fetch_all($hasildata,$result)+1;
  echo $id;
  $query = "INSERT INTO pelanggan values ('$id', '$namadpn', '$namablkg', '$email', '$password', '$nohp')";
  $hasil = oci_parse($koneksi, $query);
  oci_execute($hasil);
?>
