<?php
  include_once 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>Marketshop - eCommerce HTML Template</title>
<meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css" />
<link rel="stylesheet" type="text/css" href="css/responsive.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet-skin4.css" />
<link rel="stylesheet" type="text/css" href="revolution/css/settings.css">
<link rel="stylesheet" type="text/css" href="revolution/css/layers.css">
<link rel="stylesheet" type="text/css" href="revolution/css/navigation.css">
<link rel='stylesheet' href='//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900' type='text/css'>
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
            <ul>
              <li><a href="login.php">Masuk</a></li>
              <li><a href="register.php">Daftar</a></li>
            </ul>
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
            <div id="cart">
              <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle"> <span class="cart-icon pull-left flip"></span> <span id="cart-total">2 produk - Rp180.000</span></button>
              <ul class="dropdown-menu">
                <li>
                  <table class="table">
                    <tbody>
                      <tr>
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
                      </tr>
                    </tbody>
                  </table>
                </li>
                <li>
                  <div>
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td class="text-right"><strong>Sub-Total</strong></td>
                          <td class="text-right">$940.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
                          <td class="text-right">$4.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>VAT (20%)</strong></td>
                          <td class="text-right">$188.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>Total</strong></td>
                          <td class="text-right">$1,132.00</td>
                        </tr>
                      </tbody>
                    </table>
                    <p class="checkout"><a href="cart.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> View Cart</a>&nbsp;&nbsp;&nbsp;<a href="checkout.html" class="btn btn-primary"><i class="fa fa-share"></i> Checkout</a></p>
                  </div>
                </li>
              </ul>
            </div>
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
            <li class="mega-menu dropdown"><a href="belanja.php">Belanja</a></li>
            <li class="mega-menu dropdown"> <a href="#">Kategori</a>
              <div class="dropdown-menu">
                <div class="column col-lg-2 col-md-3"><a href="belanja.php?kategori=phasmina">Pashmina</a>
                  <div>
                    <ul>
                      <li> <a href="belanja.php?kategori=phasmina&cari=fatma">Fatma </a> </li>
                      <li> <a href="belanja.php?kategori=phasmina&cari=ghania">Ghania </a> </li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            <li class="mega-menu dropdown"><a href="#">Cara Belanja</a></li>
            <li class="mega-menu dropdown"><a href="#">Tutorial Hijab</a></li>
            <li class="mega-menu dropdown"><a href="about-us.php">About Us</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Main Menu End-->
  </div>
  <!-- START REVOLUTION SLIDER 5.0 -->
  <div class="rev_slider_wrapper">
    <div id="slider1" class="rev_slider"  data-version="5.0">
      <ul>
        <li data-transition="fade">
          <!-- MAIN IMAGE -->
          <img src="images/dummy.png" style='background-color:#eeeeee' alt="">
          <!-- LAYER NR. 1 -->
          <div class="tp-caption tp-resizeme rs-parallaxlevel-2"
									 id="slide-1-layer-1"
									 data-x="['right','left','center','center']" data-hoffset="['0','633','-110','-60']"
									 data-y="['top','top','top','bottom']" data-voffset="['0','0','0','0']"
												data-width="none"
									data-height="none"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"

									 data-transform_in="x:right;s:800;e:Power3.easeOut;"
									 data-transform_out="opacity:0;s:1500;e:Power4.easeIn;s:1500;e:Power4.easeIn;"
									data-start="300"
									data-responsive_offset="on"


									style="z-index: 7;"><img data-lazyload="image/slider/revslider/06man.png" data-hh="490" data-ww="617" alt="man" src="image/slider/revslider/06man.png" style="width: 617px; height: 490px;"> </div>
          <!-- LAYER NR. 2 -->
          <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"

	 id="slide-1-layer-2"
	 data-x="left" data-hoffset="30"
	 data-y="middle" data-voffset="-110"
	 data-width="160"
	 data-height="10"
	 data-whitespace="nowrap"
	 data-transform_idle="o:1;"
	 data-style_hover="cursor:pointer;"
	 data-transform_in="opacity:0;s:300;e:Power2.easeInOut;"
	 data-transform_out="opacity:0;s:300;s:300;"
	 data-start="1400"
	 data-responsive_offset="on"

	 style="z-index: 9;
	 	background-color:#e5e5e5;"> </div>
          <!-- LAYER NR. 3 -->
          <div class="tp-caption NotGeneric-Title tp-resizeme"
									 id="slide-1-layer-3"
									 data-x="left" data-hoffset="210"
									 data-y="middle" data-voffset="-110"
												data-width="['auto','auto','auto','auto']"
									data-height="['auto','auto','auto','auto']"
                                    data-fontsize="['22','70','70','45']"
									data-lineheight="['22','70','70','50']"
                                    data-color="#000"
                                    data-fontweight="1400"
									data-transform_idle="o:1;"

									 data-transform_in="y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;"
									 data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
									 data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
									data-start="650"
									data-splitin="chars"
									data-splitout="none"
									data-responsive_offset="on"

									data-elementdelay="0.05"

									style="z-index: 6; white-space: nowrap; ">END OF </div>
          <!-- LAYER NR. 4 -->
          <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"

	 id="slide-1-layer-4"
	 data-x="left" data-hoffset="310"
	 data-y="middle" data-voffset="-110"
	 data-width="160"
	 data-height="10"
	 data-whitespace="nowrap"
	 data-transform_idle="o:1;"
	 data-style_hover="cursor:pointer;"
	 data-transform_in="opacity:0;s:300;e:Power2.easeInOut;"
	 data-transform_out="opacity:0;s:300;s:300;"
	 data-start="1400"
	 data-responsive_offset="on"

	 style="z-index: 9;
	 	background-color:#e5e5e5;"> </div>
          <!-- LAYER NR. 5 -->
          <div class="tp-caption NotGeneric-Title tp-resizeme"
									 id="slide-1-layer-5"
									 data-x="left" data-hoffset="30"
									 data-y="middle" data-voffset="-55"
									data-width="['auto','auto','auto','auto']"
									data-height="['auto','auto','auto','auto']"
                                    data-fontsize="['65','60','60','45']"
									data-lineheight="['65','60','60','50']"
                                    data-color="#000"
                                    data-fontweight="700"
									data-transform_idle="o:1;"
									 data-transform_in="x:[-105%];z:0;rX:0deg;rY:0deg;rZ:-90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;"
									 data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
									 data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
									data-start="800"
									data-splitin="chars"
									data-splitout="none"
									data-responsive_offset="on"
									data-elementdelay="0.05"
									style="z-index: 6; white-space: nowrap; ">SEASON SALE </div>
          <!-- LAYER NR. 6 -->
          <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"

	 id="slide-1-layer-6"
	 data-x="left" data-hoffset="30"
	 data-y="middle" data-voffset="0"
	 data-width="440"
	 data-height="10"
	 data-whitespace="nowrap"
	 data-transform_idle="o:1;"
	 data-style_hover="cursor:pointer;"
	 data-transform_in="opacity:0;s:300;e:Power2.easeInOut;"
	 data-transform_out="opacity:0;s:300;s:300;"
	 data-start="1600"
	 data-responsive_offset="on"

	 style="z-index: 9;
	 	background-color:#e5e5e5;"> </div>
          <!-- LAYER NR. 7 -->
          <div class="tp-caption NotGeneric-Title tp-resizeme"
									 id="slide-1-layer-7"
									 data-x="left" data-hoffset="140"
									 data-y="middle" data-voffset="50"
									data-width="['auto','auto','auto','auto']"
									data-height="['auto','auto','auto','auto']"
                                    data-fontsize="['28','28','28','22']"
									data-lineheight="['30','30','30','22']"
                                    data-color="#000"
                                    data-fontweight="700"
									data-transform_idle="o:1;"

									 data-transform_in="x:{-50,50};y:{-5,50};rX:{-90,90};rY:{-90,90};rZ:{-360,360};sX:0;sY:0;opacity:0;s:2000;e:Power4.easeInOut;"
									 data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
									data-start="1700"
									data-splitin="chars"
									data-splitout="none"
									data-responsive_offset="on"

									data-elementdelay="0.05"

									style="z-index: 6; white-space: nowrap; ">FLATE 20% OFF </div>
          <!-- LAYER NR. 8 -->
          <div class="tp-caption WebProduct-Button rev-btn rs-parallaxlevel-0"
									 id="slide-1-layer-8"
									 data-x="['left','left','left','left']" data-hoffset="['150','0','0','0']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['120','110','110','31']"
									data-width="['auto']"
									data-height="['auto']"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"

									data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Linear.easeNone;"
									data-style_hover="c:rgba(51, 51, 51, 1.00);bg:rgba(255, 255, 255, 1.00);"

									data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
									 data-transform_out="s:1000;s:1000;"
									data-start="2000"
									data-splitin="none"
									data-splitout="none"
									data-actions='[{"event":"click","action":"scrollbelow","offset":"px"}]'
									data-responsive_offset="on"
									data-responsive="off"

									style="z-index: 14; white-space: nowrap;">SHOP NOW </div>
        </li>
        <li data-transition="fade">
          <!-- MAIN IMAGE -->
          <img src="image/slider/revslider/01minimalist-banner.jpg"  alt=""  width="1349" height="480">
          <!-- LAYER NR. 1 -->
          <div class="tp-caption tp-resizeme rs-parallaxlevel-2"
									 id="slide-2-layer-1"
									 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
									 data-y="['top','top','top','top']" data-voffset="['40','40','40','10']"
									data-width="none"
									data-height="490"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"
									data-transform_in="x:-50px;y:-200px;rX:-10deg;rY:-15deg;rZ:-5deg;sX:0;sY:0;opacity:0;s:500;e:Power2.easeInOut;"
									data-transform_out="opacity:0;s:1500;e:Power4.easeIn;s:1500;e:Power4.easeInOut;"
									data-start="1200"
									data-responsive_offset="on"
									style="z-index: 7;"><img data-lazyload="image/slider/revslider/04sale.png" data-hh="268" data-ww="694" alt="sale" src="image/slider/revslider/04sale.png"> </div>
          <!-- LAYER NR. 2 -->
          <div class="tp-caption NotGeneric-SubTitle tp-resizeme rs-parallaxlevel-0"
									 id="slide-2-layer-2"
									 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
									 data-y="['bottom','middle','middle','middle']" data-voffset="['80','-70','-70','-31']"
									data-width="none"
									data-height="none"
									data-transform_idle="o:1;"

									 data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1000;e:Power4.easeInOut;"
									 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
									 data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
									 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
									data-start="1100"
									data-splitin="none"
									data-splitout="none"
									data-responsive_offset="on"

									style="z-index: 7;"><img data-lazyload="image/slider/revslider/05bg-line.png" data-hh="55" data-ww="338" alt="sale" src="image/slider/revslider/04sale.png"> </div>
          <!-- LAYER NR. 3 -->
          <div class="tp-caption NotGeneric-SubTitle tp-resizeme rs-parallaxlevel-0"
									 id="slide-2-layer-3"
									 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
									 data-y="['bottom','middle','middle','middle']" data-voffset="['90','70','70','31']"
                                     data-fontsize="['34','34','34','20']"
                                     data-lineheight="['38','34','34','22']"
                                     data-fontweight="700"
                                     data-color="#000"
									data-width="none"
									data-height="none"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"

									 data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1200;e:Power4.easeInOut;"
									 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
									 data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
									 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
									data-start="1100"
									data-splitin="none"
									data-splitout="none"
									data-responsive_offset="on"

									style="z-index: 8; letter-spacing:0px;">Up to 40% off </div>
        </li>
        <li data-index="rs-18" data-transition="fade" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-delay="10000" data-masterspeed="2000"  data-thumb="image/slider/revslider/03minimalist-banner.jpg"  data-saveperformance="off"  data-title="Ken Burns" data-description="">
          <!-- MAIN IMAGE -->
          <img src="image/slider/revslider/03minimalist-banner.jpg"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
          <!-- LAYER NR. 1 -->
          <div class="tp-caption NotGeneric-SubTitle tp-resizeme rs-parallaxlevel-0"
									 id="slide-3-layer-1"
									 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
									 data-y="['middle','middle','middle','middle']" data-voffset="['-100','-70','-70','-31']"
                                     data-fontsize="['20','20','20','16']"
                                     data-lineheight="['20','20','20','18']"
                                     data-fontweight="700"
									data-width="none"
									data-height="none"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"

									 data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
									 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
									 data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
									 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
									data-start="1500"
									data-splitin="none"
									data-splitout="none"
									data-responsive_offset="on"


									style="z-index: 7; white-space:nowrap; letter-spacing:0px;">FREE SHIPPING ON ALL ORDERS </div>
          <!-- LAYER NR. 2 -->
          <div class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0"
									 id="slide-3-layer-2"
									 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
									 data-y="['middle','middle','middle','middle']" data-voffset="['-30','0','0','0']"
									data-fontsize="['70','70','70','45']"
									data-lineheight="['70','70','70','50']"
									data-width="none"
									data-height="none"
                                    data-fontweight="700"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"

									 data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;"
									 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
									 data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
									 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
									data-start="1000"
									data-splitin="chars"
									data-splitout="none"
									data-responsive_offset="on"

									data-elementdelay="0.05"

									style="z-index: 6; text-transform:uppercase;"><strong>WEEKEND SPECIAL</strong> </div>
          <!-- LAYER NR. 3 -->
          <div class="tp-caption NotGeneric-SubTitle tp-resizeme rs-parallaxlevel-0"
									 id="slide-3-layer-3"
									 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
									 data-y="['middle','middle','middle','middle']" data-voffset="['40','70','70','31']"
                                     data-fontsize="['28','28','28','20']"
                                     data-lineheight="['28','28','28','22']"
                                     data-fontweight="700"
									data-width="none"
									data-height="none"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"

									 data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
									 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
									 data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
									 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
									data-start="1500"
									data-splitin="none"
									data-splitout="none"
									data-responsive_offset="on"


									style="z-index: 7; text-transform:uppercase;">UP TO 60% OFF </div>
          <!-- LAYER NR. 4 -->
          <div class="tp-caption WebProduct-Button rev-btn rs-parallaxlevel-0"
									 id="slide-3-layer-4"
									 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['110','110','110','31']"
									data-width="['auto']"
									data-height="['auto']"
									data-whitespace="nowrap"
									data-transform_idle="o:1;"

									data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Linear.easeNone;"
									data-style_hover="c:rgba(51, 51, 51, 1.00);bg:rgba(255, 255, 255, 1.00);"

									data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
									 data-transform_out="s:1000;s:1000;"
									data-start="1750"
									data-splitin="none"
									data-splitout="none"
									data-actions='[{"event":"click","action":"scrollbelow","offset":"px"}]'
									data-responsive_offset="on"
									data-responsive="off"

									style="z-index: 14; white-space: nowrap;">SHOP NOW </div>
        </li>
      </ul>
    </div>
    <!-- END REVOLUTION SLIDER -->
  </div>
  <!-- END OF SLIDER WRAPPER -->
  <div id="container">
    <div class="container">
      <div class="row">
        <!-- Feature Box Start
        <div class="container">
          <div class="custom-feature-box row">
            <div class="col-sm-6 col-xs-12">
              <div class="feature-box fbox_1">
                <div class="title">Gratis Ongkir</div>
                <p>Dengan minimal pembelian diatas Rp500.000</p>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12">
              <div class="feature-box fbox_2">
                <div class="title">Easy Return</div>
                <p>Easy return in 24 days after purchasing</p>
              </div>
            </div>
          </div>
        </div>
        Feature Box End-->
      </div>
    </div>
    <div class="container">
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-xs-12">
          <!-- Banner Start -->
          <div class="marketshop-banner">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="#"><img src="image/banner/minimalist-small-banner.jpg" alt="2 Block Banner" title="2 Block Banner" /></a></div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="#"><img src="image/banner/minimalist-small-banner1.jpg" alt="2 Block Banner 1" title="2 Block Banner 1" /></a></div>
            </div>
          </div>
          <!-- Banner End -->
          <!-- Product Tab Start -->
          <div id="product-tab" class="product-tab">
            <ul id="tabs" class="tabs">
              <li><a href="#tab-rekomendasi">Rekomendasi</a></li>
              <li><a href="#tab-terbaru">Terbaru</a></li>
            </ul>
            <div id="tab-rekomendasi" class="tab_content">
              <div class="owl-carousel product_carousel_tab">
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
                          <h4><a href='product.php?kategori=$baris[IDKATEGORI]'>$baris[NAMAPRODUK]</a></h4>

                          <p class='price'><span class='price-new'>Rp$diskon</span> <span class='price-old'>Rp$baris[HARGAPRODUK]</span><span class='saving'>-$baris[DISKONPRODUK]%</span></p>
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
            <div id="tab-terbaru" class="tab_content">
              <div class="owl-carousel product_carousel_tab">
                <?php
                  $query = "SELECT * FROM produk";
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
          <!-- Product Tab Start -->
        </div>
        <!--Middle Part End-->
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
            <p>Tentang Risa Hijab.</p>
            <img alt="" src="image/logo-small.png"> </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>Informasi</h5>
            <ul>
              <li><a href="about-us.html">Tentang Kami</a></li>
              <li><a href="about-us.html">Privacy Policy</a></li>
              <li><a href="about-us.html">Terms &amp; Conditions</a></li>
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>Customer Service</h5>
            <ul>
              <li><a href="contact-us.html">Hubungi Kami</a></li>
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
              Alamat: Jl. Sukamaju 15 No B-17 RT09 RW06 Kel. Padasuka Cimahi Tengah, Cimahi, Indonesia<br><br>
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
<script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
<script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
<script type="text/javascript" src="js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!-- JS Part End-->
<script>
jQuery(document).ready(function() {
   jQuery("#slider1").revolution({
      sliderType:"standard",
      sliderLayout:"fullwidth",
      delay:9000,
      navigation: {
		  onHoverStop: "off",
          arrows:{enable:true},
		  touch: {
                                    touchenabled: "on",
                                    swipe_threshold: 75,
                                    swipe_min_touches: 1,
                                    swipe_direction: "horizontal",
                                    drag_block_vertical: false
                                },
		  bullets: {
                                    enable: true,
                                    hide_onmobile: true,
                                    style: "hermes",
                                    hide_onleave: false,
                                    direction: "horizontal",
                                    h_align: "center",
                                    v_align: "bottom",
                                    h_offset: 20,
                                    v_offset: 20,
                                    space: 5,
                                    tmp: ''
                                },
      },


	   gridwidth:1230,
      gridheight:480
    });
});
</script>
</body>
</html>
