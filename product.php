<?php
  include_once 'koneksi.php';
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>Risa Hijab | Product</title>
<meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css" />
<link rel="stylesheet" type="text/css" href="js/swipebox/src/css/swipebox.min.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet-skin4.css" />
<link rel='stylesheet' href='//fonts.googleapis.com/css?family=Raleway' type='text/css'>
<!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide">
  <div id="header" class="style2">
    <!-- Top Bar Start-->
    <nav id="top" class="htop">
      <div class="container">
        <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
          <div class="pull-left flip left-top">
            <div class="links">
              <ul>
                <li class="mobile"><i class="fa fa-phone"></i>(022) 85440033</li>
                <li class="email"><a href="mailto:info@risa.com"><i class="fa fa-envelope"></i>info@risa.com</a></li>
              </ul>
            </div>
          </div>
          <div id="top-links" class="nav pull-right flip">
            <?php
              if(isset($_SESSION['pelanggan'])){
                $pelanggan = "SELECT * FROM pelanggan WHERE IDPELANGGAN = $_SESSION[pelanggan]";
                $data = oci_parse($koneksi, $pelanggan);
                oci_execute($data);
                $hasil = oci_fetch_assoc($data);
                echo "<ul>
                  <li><a>Halo, $hasil[NAMADEPAN]</a></li>
                  <li><a href='logout.php'>KELUAR</a></li>
                </ul>";

              }else{
                echo "<ul>
                  <li><a href='login.php'>Masuk</a></li>
                  <li><a href='register.php'>Daftar</a></li>
                </ul>";
              }
            ?>

          </div>
        </div>
      </div>
    </nav>
    <!-- Top Bar End-->
    <!-- Header Start-->
    <header class="header-row">
      <div class="container">
        <div class="table-container">
          <!-- Mini Cart Start-->
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-12 col-xs-12 inner">
            <?php
            if(isset($_SESSION['pelanggan'])){
              $cart = "SELECT * FROM cart where idpelanggan = '$_SESSION[pelanggan]' AND cartstatus = '0'";
              $hasil = oci_parse($koneksi, $cart);
              oci_execute($hasil);
              $baris3 = oci_fetch_assoc($hasil);

              $count = "SELECT COUNT(*) AS COUNT FROM cartitem where idcart = '$baris3[IDCART]'";
              $hasilCount = oci_parse($koneksi, $count);
              oci_execute($hasilCount);
              $baris4 = oci_fetch_assoc($hasilCount);

            ?>
            <div id="cart">

              <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle"> <span class="cart-icon pull-left flip"></span> <span id="cart-total"><?php echo $baris4['COUNT']; ?> produk - Rp<?php echo $baris3['TOTALHARGA'] ?></span></button>
              <ul class="dropdown-menu">
                <li>
                  <table class="table">
                    <thead>
                      <tr>
                        <td class="text-center"><b>Gambar</b></td>
                        <td class="text-left"><b>Nama Produk</b></td>
                        <td class="text-left"><b>Jumlah</b></td>
                        <td class="text-right"><b>Harga Satuan</b></td>
                        <td class="text-right"><b>Total Harga</b></td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $cartItem = "SELECT * FROM cartitem where idcart = '$baris3[IDCART]'";
                      $hasilItem = oci_parse($koneksi, $cartItem);
                      oci_execute($hasilItem);
                      while($baris = oci_fetch_assoc($hasilItem)){
                        $produk = "SELECT * FROM produk where idproduk = '$baris[IDPRODUK]'";
                        $hasilProduk = oci_parse($koneksi, $produk);
                        oci_execute($hasilProduk);
                        $barisProduk = oci_fetch_assoc($hasilProduk);

                        $query1 = "SELECT * FROM fotoproduk where idproduk = $barisProduk[IDPRODUK]";
                        $hasil1 = oci_parse($koneksi, $query1);
                        oci_execute($hasil1);
                        $baris1 = oci_fetch_assoc($hasil1);
                        $satuan = $baris['HARGA'] / $baris['JUMLAHPRODUK'];
                        echo "<tr>
                              <td class='text-center'><a href='product.php?kategori=$barisProduk[IDKATEGORI]&id=$barisProduk[IDPRODUK]'><img src='http://localhost/risa/image/gambar-produk/$baris1[LOKASIFOTO]' width='70px' class='img-thumbnail' /></a></td>
                              <td class='text-left'><a href='product.php?kategori=$barisProduk[IDKATEGORI]&id=$barisProduk[IDPRODUK]'>$barisProduk[NAMAPRODUK]</a></td>
                              <td class='text-left'>$baris[JUMLAHPRODUK]</td>
                              <td class='text-right'>$satuan</td>
                              <td class='text-right'>$baris[HARGA]</td>
                              <td class='text-center'><a href='deletelist.php?id=$baris[IDCARTITEM]' class='btn btn-danger btn-xs remove' title='Remove' onClick='' type='button'><i class='fa fa-times'></i></a></td>
                            </tr>";
                      }

                      ?>
                      <!-- <tr>
                        <td class="text-center"><a href="product.php"><img class="img-thumbnail" title="Xitefun Causal Wear Fancy Shoes" alt="Xitefun Causal Wear Fancy Shoes" src="image/product/sony_vaio_1-50x75.jpg"></a></td>
                        <td class="text-left"><a href="product.html">Xitefun Causal Wear Fancy Shoes</a></td>
                        <td class="text-right">x 1</td>
                        <td class="text-right">$902.00</td>
                        <td class="text-center"><button class="btn btn-danger btn-xs remove" title="Remove" onClick="" type="button"><i class="fa fa-times"></i></button></td>
                      </tr>
                      <tr>
                        <td class="text-center"><a href="product.html"><img class="img-thumbnail" title="Aspire Ultrabook Laptop" alt="Aspire Ultrabook Laptop" src="image/product/samsung_tab_1-50x75.jpg"></a></td>
                        <td class="text-left"><a href="product.html">Aspire Ultrabook Laptop</a></td>
                        <td class="text-right">x 1</td>
                        <td class="text-right">$230.00</td>
                        <td class="text-center"><button class="btn btn-danger btn-xs remove" title="Remove" onClick="" type="button"><i class="fa fa-times"></i></button></td>
                      </tr> -->
                    </tbody>
                  </table>
                </li>
                <li>
                  <div>
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td class="text-right"><strong>Total</strong></td>
                          <td class="text-right">Rp<?php echo $baris3['TOTALHARGA']; ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <p class="checkout"><a href="cart.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> View Cart</a>&nbsp;&nbsp;&nbsp;<a href="checkout.php" class="btn btn-primary"><i class="fa fa-share"></i> Checkout</a></p>
                  </div>
                </li>
              </ul>
            </div>

        <?php } ?>
        </div>
          <!-- Mini Cart End-->
          <!-- Logo Start -->
          <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div id="logo"><a href="index.html"><img class="img-responsive" src="image/logo.png" title="MarketShop" alt="MarketShop" /></a></div>
          </div>
          <!-- Logo End -->
          <!-- Search Start-->
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-12 col-xs-12 inner">
            <div id="search" class="input-group">
              <input id="filter_name" type="text" name="search" value="" placeholder="Pencarian" class="form-control input-lg" />
              <button type="button" class="button-search"><i class="fa fa-search"></i></button>
            </div>
          </div>
          <!-- Search End-->
        </div>
      </div>
    </header>
    <!-- Header End-->
    <!-- Main Menu Start-->
    <nav id="menu" class="navbar center">
      <div class="navbar-header"> <span class="visible-xs visible-sm"> Menu <b></b></span></div>
      <div class="container">
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a class="home_link" title="Home" href="index.php">Beranda</a></li>
            <li class="mega-menu dropdown"><a href="#">Belanja</a></li>
            <li class="mega-menu dropdown"> <a href="#">Kategori</a>
              <div class="dropdown-menu">
                <div class="column col-lg-2 col-md-3"><a href="#">Pashmina</a>
                  <div>
                    <ul>
                      <li> <a href="#">Fatma </a> </li>
                      <li> <a href="#">Ghania </a> </li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            <li class="mega-menu dropdown"><a href="#">Cara Belanja</a></li>
            <li class="mega-menu dropdown"><a href="#">Tutorial Hijab</a></li>
            <li class="mega-menu dropdown"><a href="#">About Us</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Main Menu End-->
  </div>
  <div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <?php
        $qkategori = "SELECT * FROM kategori where idkategori = '$_GET[kategori]'";
        $hasilkategori = oci_parse($koneksi, $qkategori);
        oci_execute($hasilkategori);
        $datakategori = oci_fetch_assoc($hasilkategori);

        $qproduk = "SELECT * FROM produk where idproduk = '$_GET[id]'";
        $hasilproduk = oci_parse($koneksi, $qproduk);
        oci_execute($hasilproduk);
        $dataproduk = oci_fetch_assoc($hasilproduk);
        ?>
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="index.php" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a></li>
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo "product.php?kategori=$datakategori[IDKATEGORI]"?>" itemprop="url"><span itemprop="title"><?php echo $datakategori['NAMAKATEGORI']?></span></a></li>
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo "product.php?kategori=$datakategori[IDKATEGORI]&id=$dataproduk[IDPRODUK]"?>" itemprop="url"><span itemprop="title"><?php echo $dataproduk['NAMAPRODUK'] ?></span></a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <div itemscope itemtype="http://schema.org/Product">
            <h1 class="title" itemprop="name"><?php echo $dataproduk['NAMAPRODUK'] ?></h1>
            <div class="row product-info">
              <div class="col-sm-6">
                <?php
                $qfoto = "SELECT * FROM fotoproduk where idproduk = $dataproduk[IDPRODUK]";
                $hasilfoto = oci_parse($koneksi, $qfoto);
                oci_execute($hasilfoto);
                $datafoto = oci_fetch_assoc($hasilfoto);
                ?>
                <div class="image"><img class="img-responsive" itemprop="image" id="zoom_01" src="<?php echo "http://localhost/risa/image/gambar-produk/$datafoto[LOKASIFOTO]"?>" title="Laptop Silver black" alt="Laptop Silver black" data-zoom-image="<?php echo "http://localhost/risa/image/gambar-produk/$datafoto[LOKASIFOTO]"?>" /> </div>
                <div class="center-block text-center"><span class="zoom-gallery"><i class="fa fa-search"></i> Click image for Gallery</span></div>
                <div class="image-additional" id="gallery_01">
                  <?php
                  $qfoto2 = "SELECT * FROM fotoproduk where idproduk = $dataproduk[IDPRODUK]";
                  $hasilfoto2 = oci_parse($koneksi, $qfoto2);
                  oci_execute($hasilfoto2);
                  while($datafoto2 = oci_fetch_assoc($hasilfoto2)) {
                    echo "<a class='thumbnail' href='#' data-zoom-image='http://localhost/risa/image/gambar-produk/$datafoto2[LOKASIFOTO]' data-image='http://localhost/risa/image/gambar-produk/$datafoto2[LOKASIFOTO]' title='$dataproduk[NAMAPRODUK]'> <img src='http://localhost/risa/image/gambar-produk/$datafoto2[LOKASIFOTO]' title='$dataproduk[NAMAPRODUK]' alt = '$dataproduk[NAMAPRODUK]'/></a> ";
                  }
                  ?>
                </div>
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled description">
                  <form action="addtocart.php" method="post">
                    <input type="hidden" name="idproduk" value="<?php echo $dataproduk['IDPRODUK']; ?>">
                  <li><b>Kode Produk :</b> <span itemprop="mpn"><?php echo $dataproduk['IDPRODUK']; ?></span></li>
                  <?php
                  $qStok = "SELECT * FROM stok where idProduk = $dataproduk[IDPRODUK]";
                  $hasilStok = oci_parse($koneksi, $qStok);
                  oci_execute($hasilStok);
                  while($dataStok = oci_fetch_assoc($hasilStok)) {
                    if($dataStok['STOK'] > 0){
                      echo "<li id='stok$dataStok[UKURAN]'><b>Ketersediaan :</b> <span class='instock' >Tersedia</span></li>";
                    }else{
                      echo "<li id='stok$dataStok[UKURAN]'><b>Ketersediaan :</b> <span class='nostock' >Tidak Tersedia</span></li>";
                    }
                  }
                  ?>

                </ul>
                <?php
                if($dataproduk['DISKONPRODUK'] > 0) {
                  $diskon = $dataproduk['HARGAPRODUK'] - ($dataproduk['DISKONPRODUK'] * $dataproduk['HARGAPRODUK']/100);
                  echo "<ul class='price-box'>
                        <li class='price' itemprop='offers' itemscope itemtype='http://schema.org/Offer'><span class='price-old'>Rp$dataproduk[HARGAPRODUK]</span> <span itemprop='price'>Rp$diskon<span itemprop='availability' content='In Stock'></span></span></li>
                      </ul>";
                }else{
                  echo "<ul class='price-box'>
                        <li class='price' itemprop='offers' itemscope itemtype='http://schema.org/Offer'><span itemprop='price'>Rp$dataproduk[HARGAPRODUK]<span itemprop='availability' content='In Stock'></span></span></li>
                      </ul>";
                }
                ?>

                <div id="product">
                  <h3 class="subtitle">Opsi yang tersedia</h3>
                  <div class="form-group required">
                    <label class="control-label">Ukuran</label>
                    <select class="form-control" id="input-option" name="ukuran">
                      <option value="1" selected>S </option>
                      <option value="2">M </option>
                      <option value="3">L </option>
                    </select>
                  </div>
                  <div class="cart">
                    <div>
                      <div class="qty">
                        <label class="control-label" for="input-quantity">Jumlah</label>
                        <input type="text" name="jumlah" value="1" size="2" id="input-quantity" class="form-control" />
                        <a class="qtyBtn plus" href="javascript:void(0);">+</a><br />
                        <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                        <div class="clear"></div>
                      </div>
                      <?php
                        if(isset($_SESSION['pelanggan'])){
                          echo "<input type='submit' id='button-cart' class='btn btn-primary btn-lg' value='Beli'>";
                        }else{
                          echo "<input type='submit' id='button-cart' class='btn btn-primary btn-lg' value='Beli' disabled>";
                        }
                      ?>
                    </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab-description" data-toggle="tab">Deskripsi</a></li>
            </ul>
            <div class="tab-content">
              <div itemprop="description" id="tab-description" class="tab-pane active">
                <div>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <td colspan="2"><strong>Informasi Produk</strong></td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Bahan</td>
                        <td><?php echo $dataproduk['DESKRIPSIPRODUK']; ?></td>
                      </tr>
                      <tr>
                        <td>Ukuran</td>
                        <td>S, M, L</td>
                      </tr>
                      <tr>
                        <td>Berat size S</td>
                        <td>160 gram</td>
                      </tr>
                      <tr>
                        <td>Panjang Depan /belakang size S</td>
                        <td>38/73 cm</td>
                      </tr>
                      <tr>
                        <td>Berat size M</td>
                        <td>250 gram</td>
                      </tr>
                      <tr>
                        <td>Panjang Depan/belakang size M	</td>
                        <td>52/86 cm</td>
                      </tr>
                      <tr>
                        <td>Berat size L</td>
                        <td>300 gram</td>
                      </tr>
                      <tr>
                        <td>Panjang Depan/belakang size L</td>
                        <td>64/98 cm</td>
                      </tr>
                    </tbody>
                    </table>
                </div>
              </div>
            </div>
            <h3 class="subtitle">Related Products</h3>
            <div class="owl-carousel related_pro">
              <?php
                $nama = $dataproduk['NAMAPRODUK'];
                $arr = explode(' ',trim($nama));
                $hasil = $arr[0];
                $query = "SELECT * FROM produk where namaproduk like '%$hasil%'";
                $hasil = oci_parse($koneksi, $query);
                oci_execute($hasil);
                while ($baris = oci_fetch_assoc($hasil)) {
                  if($baris['DISKONPRODUK'] > 0) {
                    $query1 = "SELECT * FROM fotoproduk where idproduk = $baris[IDPRODUK]";
                    $hasil1 = oci_parse($koneksi, $query1);
                    oci_execute($hasil1);
                    $baris1 = oci_fetch_assoc($hasil1);
                    $diskon = $baris['HARGAPRODUK'] - ($baris['DISKONPRODUK'] * $baris['HARGAPRODUK']/100);
                    echo "<div class='product-thumb clearfix'>
                      <div class='image'><a href='product.php?kategori=$baris[IDKATEGORI]&id=$baris[IDPRODUK]'><img src='http://localhost/risa/image/gambar-produk/$baris1[LOKASIFOTO]' class='img-responsive' /></a></div>
                      <div class='caption'>
                        <h4><a href='product.php?kategori=$baris[IDKATEGORI]'>$baris[NAMAPRODUK]</a></h4>

                        <p class='price'><span class='price-new'>Rp$diskon</span> <span class='price-old'>Rp$baris[HARGAPRODUK]</span><span class='saving'>-$baris[DISKONPRODUK]%</span></p>
                      </div>
                      <div class='button-group'>
                        <button class='btn-primary' type='button' onClick='cart.add('42');'><span>Add to Cart</span></button>
                      </div>
                    </div>";
                  }else{
                    $query1 = "SELECT * FROM fotoproduk where idproduk = $baris[IDPRODUK]";
                    $hasil1 = oci_parse($koneksi, $query1);
                    oci_execute($hasil1);
                    $baris1 = oci_fetch_assoc($hasil1);
                    echo "<div class='product-thumb clearfix'>
                      <div class='image'><a href='product.php?kategori=$baris[IDKATEGORI]&id=$baris[IDPRODUK]'><img src='http://localhost/risa/image/gambar-produk/$baris1[LOKASIFOTO]' class='img-responsive' /></a></div>
                      <div class='caption'>
                        <h4><a href='product.php?kategori=$baris[IDKATEGORI]'>$baris[NAMAPRODUK]</a></h4>
                        <p class='price'> Rp$baris[HARGAPRODUK] </p>
                      </div>
                      <div class='button-group'>
                        <button class='btn-primary' type='button' onClick='cart.add('42');'><span>Add to Cart</span></button>
                      </div>
                    </div>";
                  }
                }
              ?>
            </div>
          </div>
        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->
        <aside id="column-right" class="col-sm-3 hidden-xs">
          <h3 class="subtitle">Rekomendasi</h3>
          <div class="side-item">
            <?php
              $query = "SELECT * FROM produk order by diskonProduk desc";
              $hasil = oci_parse($koneksi, $query);
              oci_execute($hasil);
              while ($baris = oci_fetch_assoc($hasil)) {
                if($baris['DISKONPRODUK'] > 0) {
                  $query1 = "SELECT * FROM fotoproduk where idproduk = $baris[IDPRODUK]";
                  $hasil1 = oci_parse($koneksi, $query1);
                  oci_execute($hasil1);
                  $baris1 = oci_fetch_assoc($hasil1);
                  $diskon = $baris['HARGAPRODUK'] - ($baris['DISKONPRODUK'] * $baris['HARGAPRODUK']/100);
                  echo "<div class='product-thumb clearfix'>
                    <div class='image'><a href='product.php?kategori=$baris[IDKATEGORI]&id=$baris[IDPRODUK]'><img src='http://localhost/risa/image/gambar-produk/$baris1[LOKASIFOTO]' class='img-responsive' /></a></div>
                    <div class='caption'>
                      <h4><a href='product.php?kategori=$baris[IDKATEGORI]&id=$baris[IDPRODUK]'>$baris[NAMAPRODUK]</a></h4>
                      <p class='price'><span class='price-new'>Rp$diskon</span> <span class='price-old'>Rp$baris[HARGAPRODUK]</span> <span class='saving'>-$baris[DISKONPRODUK]%</span></p>
                    </div>
                  </div>";
                }
              }
            ?>
          </div>
        </aside>
        <!--Right Part End -->
      </div>
    </div>
  </div>
  <!--Footer Start-->
  <footer id="footer">
    <div class="fpart-first">
      <div class="container">
        <div class="row">
          <div class="contact col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h5>Tentang Risa Hijab</h5>
            <p>RisaHijab adalah produk lokal yang menjual berbagai macam jenis kerudung, untuk kebutuhan muslimah yang ingin tampil modis.</p>
            <img alt="" src="image/logo.png"> </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>Informasi</h5>
            <ul>
              <li><a href="#">Tentang Kami</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>Customer Service</h5>
            <ul>
              <li><a href="#">Hubungi Kami</a></li>
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>Akun</h5>
            <ul>
              <li><a href="login.php">Masuk</a></li>
              <li><a href="regiter.php">Daftar</a></li>
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>Kontak</h5>
            <p>
              Alamat: Jl. Negla Gg. Al Ikhlas No.21, Isola, Sukasari, Kota Bandung<br><br>
              (022) 85440033
              info@risa.com
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="fpart-second">
      <div class="container">
        <div id="powered" class="clearfix">
          <div class="powered_text pull-left flip">
            <p>Copyright © 2017 Risa Hijab. All rights reserved.</p>
          </div>
          <div class="social pull-right flip"> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/socialicons/facebook.png" alt="Facebook" title="Facebook"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/socialicons/twitter.png" alt="Twitter" title="Twitter"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/socialicons/google_plus.png" alt="Google+" title="Google+"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/socialicons/pinterest.png" alt="Pinterest" title="Pinterest"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/socialicons/rss.png" alt="RSS" title="RSS"> </a> </div>
        </div>
      </div>
    </div>
    <div id="back-top"><a data-toggle="tooltip" title="Back to Top" href="javascript:void(0)" class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
  </footer>
  <!--Footer End-->
</div>
<!-- JS Part Start-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/jquery.elevateZoom-3.0.8.min.js"></script>
<script type="text/javascript" src="js/swipebox/lib/ios-orientationchange-fix.js"></script>
<script type="text/javascript" src="js/swipebox/src/js/jquery.swipebox.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript">
// Elevate Zoom for Product Page image
$("#zoom_01").elevateZoom({
	gallery:'gallery_01',
	cursor: 'pointer',
	galleryActiveClass: 'active',
	imageCrossfade: true,
	zoomWindowFadeIn: 500,
	zoomWindowFadeOut: 500,
	lensFadeIn: 500,
	lensFadeOut: 500,
	loadingIcon: 'image/progress.gif'
	});
//////pass the images to swipebox
$("#zoom_01").bind("click", function(e) {
  var ez =   $('#zoom_01').data('elevateZoom');
	$.swipebox(ez.getGalleryList());
  return false;
});
$(document).ready(function(){
  $("#stokS").show();
  $("#stokM").hide();
  $("#stokL").hide();
    $('#input-option').on('change', function() {
      if ( this.value == '1'){
        $("#stokS").show();
        $("#stokM").hide();
        $("#stokL").hide();
      }else if ( this.value == '2'){
        $("#stokS").hide();
        $("#stokM").show();
        $("#stokL").hide();
      }else{
        $("#stokS").hide();
        $("#stokM").hide();
        $("#stokL").show();
      }
    });
});
</script>
<!-- JS Part End-->
</body>
</html>
