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

  $cartItem = "SELECT * FROM cartItem WHERE idCart = '$idcart'";
  $dataCartItem = oci_parse($koneksi, $cartItem);
  oci_execute($dataCartItem);
  while ($hasilCartItem = oci_fetch_assoc($dataCartItem)) {
    if($hasilCartItem['UKURAN'] == 1){
      $ukuran = "S";
    }else if($hasilCartItem['UKURAN'] == 2){
      $ukuran = "M";
    }else{
      $ukuran = "L";
    }

    $dataStok = "SELECT * FROM stok WHERE idProduk = '$hasilCartItem[IDPRODUK]' AND ukuran = '$ukuran'";
    $outStok = oci_parse($koneksi, $dataStok);
    oci_execute($outStok);
    $hasilOutStok = oci_fetch_assoc($outStok);
    $stoksekarang = $hasilOutStok['STOK'] - $hasilCartItem['JUMLAHPRODUK'];

    $updateStok = "UPDATE stok SET stok = '$stoksekarang' WHERE idProduk = '$hasilCartItem[IDPRODUK]' AND ukuran = '$ukuran'";
    $hasilStok = oci_parse($koneksi, $updateStok);
    oci_execute($hasilStok);
  }

  $updateCart = "UPDATE cart SET cartStatus = 1 WHERE idCart = '$idcart'";
  $hasilCart = oci_parse($koneksi, $updateCart);
  oci_execute($hasilCart);

  header("location:index.php");

?>
