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
<title>Risa Hijab | Checkout</title>
<meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css" />
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
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="cart.php">Shopping Cart</a></li>
        <li><a href="checkout.php">Checkout</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">Checkout</h1>
          <div class="row">
            <div class="col-sm-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><i class="fa fa-book"></i> Alamat Pengiriman Anda</h4>
                </div>
                  <div class="panel-body">
                    <form class="" action="checkoutproses.php" method="post">
                        <fieldset id="address" class="required">
                          <div class="form-group required" >
                            <label for="input-payment-address-2" class="control-label">Alamat</label>
                            <textarea rows="4" class="form-control" id="confirm_comment" name="alamat" required></textarea>
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-city" class="control-label">Provinsi</label>
                            <input type="text" name="provinsi" class="form-control" id="input-payment-city" placeholder="Provinsi" value="" name="Provinsi" required>
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-postcode" class="control-label">Kota</label>
                            <input type="text" name="kota" class="form-control" id="input-payment-postcode" placeholder="Kota" value="" name="Kota" required>
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-country" class="control-label">Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" id="input-payment-country" placeholder="Kecamatan" value="" name="Kecamatan" required>
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-zone" class="control-label">No Handphone</label>
                            <input type="text" name="hp" class="form-control" id="input-payment-zone" placeholder="No Handphone" value="" name="noHP" required>
                          </div>
                        </fieldset>
                      </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="row">
                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Keranjang Belanja</h4>
                    </div>
                      <div class="panel-body">
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <td class="text-center">Gambar</td>
                                <td class="text-left">Nama Produk</td>
                                <td class="text-left">Jumlah</td>
                                <td class="text-left">Ukuran</td>
                                <td class="text-right">Harga Satuan</td>
                                <td class="text-right">Total Harga</td>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $cart = "SELECT * FROM cart where idpelanggan = '$_SESSION[pelanggan]' AND cartstatus = '0'";
                              $hasil = oci_parse($koneksi, $cart);
                              oci_execute($hasil);
                              $baris3 = oci_fetch_assoc($hasil);

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
                                      <td class='text-left'>";
                                      if ($baris['UKURAN'] == 1) {
                                        echo "S";
                                      }else if ($baris['UKURAN'] == 2) {
                                        echo "M";
                                      }else{
                                        echo "L";
                                      }
                                      echo"</td>
                                      <td class='text-right'>$satuan</td>
                                      <td class='text-right'>$baris[HARGA]</td>
                                    </tr>";
                              }
                              ?>
                              <input type="hidden" name="idcart" value="<?php echo $baris3['IDCART']?>">
                              <input type="hidden" name="totalorder" value="<?php echo $baris3['TOTALHARGA']?>">
                            </tbody>                            <tfoot>
                              <tr>
                                <td colspan="5" class="text-right"><strong>Total:</strong></td>
                                <td class="text-right">Rp<?php echo $baris3['TOTALHARGA']; ?></td>

                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-pencil"></i> Tambahkan Catatan</h4>
                    </div>
                      <div class="panel-body">
                        <textarea rows="4" class="form-control" id="confirm_comment" name="catatan"></textarea>
                        <br>
                        <label class="control-label" for="confirm_agree">
                          <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
                          <span>Saya setuju dan telah membaca <a class="agree" href="#"><b>Syarat &amp; Ketentuan</b></a></span> </label>
                        <div class="buttons">
                          <div class="pull-right">
                            <input type="submit" class="btn btn-primary" id="button-confirm" value="Konfirmasi Orderan">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Middle Part End -->
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
<script type="text/javascript" src="js/custom.js"></script>
<!-- JS Part End-->
</body>
</html>
