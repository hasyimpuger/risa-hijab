<?php
  include_once 'koneksi.php';
  session_start();

  $idlist = $_GET['id'];

  $cekCart1 = "SELECT * FROM cartitem WHERE idcartitem = '$idlist'";
  $dataCart1 = oci_parse($koneksi, $cekCart1);
  oci_execute($dataCart1);
  $hasilCart1 = oci_fetch_assoc($dataCart1);

  $query = "DELETE from cartitem WHERE idcartitem = '$idlist'";
  $hasil = oci_parse($koneksi, $query);
  oci_execute($hasil);

  $cekCart2 = "SELECT * FROM cart WHERE idcart = '$hasilCart1[IDCART]'  AND cartstatus = '0'";
  $dataCart2 = oci_parse($koneksi, $cekCart2);
  oci_execute($dataCart2);
  $hasilCart2 = oci_fetch_assoc($dataCart2);


  $totalharga = $hasilCart2['TOTALHARGA'] - ($hasilCart1['HARGA'] * $hasilCart1['JUMLAHPRODUK']);
  $tambahHarga = "UPDATE cart SET totalharga = '$totalharga'";
  $hasil = oci_parse($koneksi, $tambahHarga);
  oci_execute($hasil);

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
