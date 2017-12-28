<?php
  include_once 'koneksi.php';
  session_start();

  $alamat = $_POST['alamat'];
  $provinsi = $_POST['provinsi'];
  $kota = $_POST['kota'];
  $kecamatan = $_POST['kecamatan'];
  $hp = $_POST['hp'];
  $catatan = $_POST['catatan'];
  $idcart = $_POST['idcart'];
  $totalorder = $_POST['totalorder'];

  $alamatAkhir = $alamat.", ".$kecamatan.", ".$kota.", ".$provinsi;
  $query = "INSERT INTO orderProduk values (seq_idOrder.nextval, 2, 1, '$alamatAkhir', '$_SESSION[pelanggan]', '$idcart', CURRENT_TIMESTAMP, '$totalorder')";
  $hasil = oci_parse($koneksi, $query);
  oci_execute($hasil);
  header("location:index.php");
?>
