<?php
  include_once 'koneksi.php';
  session_start();

  $idproduk = $_POST['idproduk'];
  $ukuran = $_POST['ukuran'];
  $jumlah = $_POST['jumlah'];

  $produk = "SELECT * FROM produk WHERE idproduk = '$idproduk'";
  $dataProduk = oci_parse($koneksi, $produk);
  oci_execute($dataProduk);
  $hasilProduk = oci_fetch_assoc($dataProduk);

  $cekCart = "SELECT * FROM cart WHERE idpelanggan = '$_SESSION[pelanggan]' AND cartstatus = '0'";
  $dataCart = oci_parse($koneksi, $cekCart);
  oci_execute($dataCart);
  $hasilCart = oci_fetch_assoc($dataCart);

  if($hasilCart == NULL){
    $buatCart = "INSERT INTO cart values (seq_idCart.nextval, '$_SESSION[pelanggan]', 0,0)";
    $hasil = oci_parse($koneksi, $buatCart);
    oci_execute($hasil);
  }

  $cekCart1 = "SELECT * FROM cart WHERE idpelanggan = '$_SESSION[pelanggan]'  AND cartstatus = '0'";
  $dataCart1 = oci_parse($koneksi, $cekCart1);
  oci_execute($dataCart1);
  $hasilCart1 = oci_fetch_assoc($dataCart1);

  if($hasilProduk['DISKONPRODUK'] > 0) {
    $harga = ($hasilProduk['HARGAPRODUK'] - ($hasilProduk['HARGAPRODUK'] * $hasilProduk['DISKONPRODUK']/100)) * $jumlah;
  }else{
    $harga = $hasilProduk['HARGAPRODUK'] * $jumlah;
  }

  $cartItem = "INSERT INTO cartitem values (seq_idCartItem.nextval,'$hasilCart1[IDCART]','$hasilProduk[IDPRODUK]','$harga','$ukuran','$jumlah')";
  $hasil = oci_parse($koneksi, $cartItem);
  oci_execute($hasil);

  $totalharga = $hasilCart1['TOTALHARGA'] + $harga;
  $tambahHarga = "UPDATE cart SET totalharga = '$totalharga' WHERE idCart = '$hasilCart1[IDCART]'";
  $hasil = oci_parse($koneksi, $tambahHarga);
  oci_execute($hasil);

  header("location:cart.php");
?>
