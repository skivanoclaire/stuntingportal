<!doctype html>
<html class="no-js" lang="id">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Portal Stunting Kalimantan Utara </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="logokaltara.png">
    <link rel="icon" type="image/png" sizes="32x32" href="logokaltara.png">
    <link rel="icon" type="image/png" sizes="16x16" href="logokaltara.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="depan/css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="depan/css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="depan/css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="depan/css/animate.min.css">
    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="depan/css/font-awesome.min.css">
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="depan/vendor/OwlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="depan/vendor/OwlCarousel/owl.theme.default.min.css">
    <!-- Main Menu CSS -->
    <link rel="stylesheet" href="depan/css/meanmenu.min.css">
    <!-- nivo slider CSS -->
    <link rel="stylesheet" href="depan/vendor/slider/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="depan/vendor/slider/css/preview.css" type="text/css" media="screen" />
    <!-- Datetime Picker Style CSS -->
    <link rel="stylesheet" href="depan/css/jquery.datetimepicker.css">
    <!-- Magic popup CSS -->
    <link rel="stylesheet" href="depan/css/magnific-popup.css">
    <!-- Switch Style CSS -->
    <link rel="stylesheet" href="depan/css/hover-min.css">
    <!-- ReImageGrid CSS -->
    <link rel="stylesheet" href="depan/css/reImageGrid.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="depan/style.css">
    <!-- Register CSS -->
    <link rel="stylesheet" href="depan/css/register.css">
    <!--Datatable-->
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <!--CSS Search-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap4.min.css">
    <!-- Modernizr Js -->
    <script src="depan/js/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Add your site or application content here -->
    <!-- Preloader Start Here -->
    <!-- Preloader End Here -->
    <!-- Main Body Area Start Here -->
    <div id="wrapper">
        <!-- Header Area Start Here -->
        <header>
            <div id="header2" class="header2-area">
                <div class="header-top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
                                <div class="header-top-left">
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:-"> - </a></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a
                                                href="mailto:bidang.aptika@kaltaraprov.go.id">bidang.aptika@kaltaraprov.go.id</a>
                                        </li>
                                        <li><i class="fa fa-instagram" aria-hidden="true"></i><a
                                                href="https://www.instagram.com/diskominfokaltara/">diskominfokaltara</a>
                                        </li>
                                        <li><i class="fa fa-facebook" aria-hidden="true"></i><a
                                                href="https://www.facebook.com/diskominfokaltara">diskominfokaltara</a>
                                        </li>
                                        <li><i class="fa fa-youtube" aria-hidden="true"></i><a
                                                href="https://www.youtube.com/@KominfoKaltara">DKISP Kaltara</a></li>
                                        <li><i class="fa fa-twitter" aria-hidden="true"></i><a
                                                href="https://twitter.com/dkispkaltara">dkispkaltara</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="main-menu-area bg-textPrimary" id="sticker">
                    <div class="container" style="width: 1800px;">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-3">
                                <div class="logo-area">
                                    <a href=""><img class="img-responsive" src="logobaru.png" style="max-width:190%; "
                                            alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <nav id="desktop-nav">
                                    <ul>
                                        <li class="<?php if ($this->uri->segment(2) == 'index')
                                            echo 'active' ?>"><a
                                                    href="home/index">Home</a>
                                            </li>



                                            <li class="<?php if ($this->uri->segment(2) == 'tentang')
                                            echo '' ?>"><a>Tentang
                                                    Stunting</a>
                                                <ul>
                                                    <li
                                                        class="<?php if ($this->uri->segment(2) == 'definisi')
                                            echo 'active' ?>">
                                                        <a href="home/definisi">Apa Itu Stunting?</a></li>
                                                    <li
                                                        class="<?php if ($this->uri->segment(2) == 'penyebab')
                                            echo 'active' ?>">
                                                        <a href="home/penyebab">Penyebab Stunting</a></li>
                                                    <li
                                                        class="<?php if ($this->uri->segment(2) == 'dampak')
                                            echo 'active' ?>">
                                                        <a href="home/dampak">Dampak Jangka Panjang</a></li>
                                                    <li
                                                        class="<?php if ($this->uri->segment(2) == 'solusi')
                                            echo 'active' ?>">
                                                        <a href="home/solusi">Solusi Penanganan</a></li>
                                                </ul>
                                            </li>

                                            <li class="<?php if ($this->uri->segment(2) == 'index')
                                            echo '' ?>"><a
                                                    href="">Data & Statistik</a>
                                                <ul>
                                                    <li
                                                        class="<?php if ($this->uri->segment(2) == 'sigizi')
                                            echo 'active' ?>">
                                                        <a
                                                            href="https://sigiziterpadu.kemkes.go.id/ppgbm/index.php/Dashboard/stunting">SiGIZI
                                                            - Kemenkes</a></li>
                                                    <!-- <li class="<?php if ($this->uri->segment(2) == 'kemendagri')
                                            echo 'active' ?>"><a href="https://aksi.bangda.kemendagri.go.id/emonev/DashPrev">Sebaran Stunting - Kemendagri</a></li>					 -->
                                                    <li
                                                        class="<?php if ($this->uri->segment(2) == 'dampak')
                                            echo 'active' ?>">
                                                        <a href="https://dashboard.stunting.go.id/">Pemantauan Terpadu -
                                                            TP2S</a></li>
                                                </ul>
                                            </li>

                                            <li class="<?php if ($this->uri->segment(2) == 'pp')
                                            echo '' ?>"><a>Program
                                                    Pemerintah</a>
                                                <ul>
                                                    <li
                                                        class="<?php if ($this->uri->segment(2) == 'program')
                                            echo 'active' ?>">
                                                        <a href="home/program">Program Pemerintah Provinsi</a></li>
                                                    <li
                                                        class="<?php if ($this->uri->segment(2) == 'regulasi')
                                            echo 'active' ?>">
                                                        <a href="home/regulasi">Kebijakan dan Regulasi</a></li>
                                                </ul>
                                            </li>

                                            <li class="<?php if ($this->uri->segment(2) == 'index')
                                            echo '' ?>"><a>Panduan
                                                    dan Edukasi</a>
                                                <ul>
                                                    <li
                                                        class="<?php if ($this->uri->segment(2) == 'panduan1')
                                            echo 'active' ?>">
                                                        <a href="home/panduan_anak">Panduan Gizi untuk Anak</a></li>
                                                    <li
                                                        class="<?php if ($this->uri->segment(2) == 'panduan2')
                                            echo 'active' ?>">
                                                        <a href="home/panduan_ibu">Panduan Bagi Ibu Hamil dan Menyusui</a>
                                                    </li>
                                                    <li
                                                        class="<?php if ($this->uri->segment(2) == 'aplikasi')
                                            echo 'active' ?>">
                                                        <a
                                                            href="https://play.google.com/store/apps/details?id=com.telkom.tracencare&hl=id">Aplikasi
                                                            Satu Sehat (Pemerintah) - Android </a></li>
                                                    <li
                                                        class="<?php if ($this->uri->segment(2) == 'aplikasi')
                                            echo 'active' ?>">
                                                        <a
                                                            href="https://apps.apple.com/us/app/satusehat-mobile/id1504600374">Aplikasi
                                                            Satu Sehat (Pemerintah) - iOS </a></li>

                                                    <li
                                                        class="<?php if ($this->uri->segment(2) == 'aplikasi')
                                            echo 'active' ?>">
                                                        <a
                                                            href="https://play.google.com/store/apps/details?id=com.primaku.app&hl=id">Aplikasi
                                                            Stunting Primaku (Non Pemerintah) - Android </a></li>
                                                    <li
                                                        class="<?php if ($this->uri->segment(2) == 'aplikasi')
                                            echo 'active' ?>">
                                                        <a
                                                            href="https://apps.apple.com/id/app/primaku-cek-pertumbuhan-anak/id1339519925?l=id">Aplikasi
                                                            Stunting Primaku (Non Pemerintah) - iOS </a></li>
                                                    <li
                                                        class="<?php if ($this->uri->segment(2) == 'publikasi')
                                            echo 'active' ?>">
                                                        <a href="home/publikasi">Publikasi Stunting</a></li>
                                                </ul>
                                            </li>
                                            <li
                                                class="<?php echo ($this->uri->segment(2) == 'lainnya' or $this->uri->segment(2) == 'lainnya') ? 'active' : '' ?>">
                                            <a>Informasi Lainnya</a>
                                            <ul>

                                                <li
                                                    class="<?php if ($this->uri->segment(2) == 'kontak')
                                                        echo 'active' ?>">
                                                        <a href="home/kontak">Kontak Kami</a></li>
                                            </li>



                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!--	
    
            <!-- Mobile Menu Area Start -->
                <div class="mobile-menu-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mobile-menu">
                                    <nav id="dropdown">
                                        <ul>
                                            <li class=""><a href="home">Home</a>

                                            </li>
                                            <li class=""><a href="#">Tentang Stunting</a>
                                                <ul>
                                                    <li><a href="home/definisi">Apa Itu Stunting?</a></li>
                                                    <li><a href="home/penyebab">Penyebab Stunting</a></li>
                                                    <li><a href="home/dampak">Dampak Jangka Panjang</a></li>
                                                    <li><a href="home/solusi">Solusi Penanganan</a></li>
                                                </ul>
                                            </li>

                                            <li class=""><a href="#">Data dan Statistik</a>
                                                <ul>
                                                    <li><a
                                                            href="https://sigiziterpadu.kemkes.go.id/ppgbm/index.php/Dashboard/stunting">SiGIZI
                                                            - Kemenkes</a></li>
                                                    <!-- <li><a href="https://aksi.bangda.kemendagri.go.id/emonev/DashPrev">Sebaran Stunting - Kemendagri</a></li>					 -->
                                                    <li><a href="https://dashboard.stunting.go.id/">Pemantauan Terpadu -
                                                            TP2S</a></li>

                                                </ul>
                                            </li>

                                            <li class=""><a href="#">Progam Pemerintah</a>
                                                <ul>
                                                    <li><a href="home/program">Program Pemerintah Provinsi</a></li>
                                                    <li><a href="home/regulasi">Kebijakan & Regulasi</a></li>
                                                </ul>
                                            </li>

                                            <li class=""><a href="#">Panduan dan Edukasi</a>
                                                <ul>
                                                    <li><a href="home/panduan_anak">Panduan Gizi untuk Anak</a></li>
                                                    <li><a href="home/panduan_ibu">Panduan Gizi Ibu</a></li>
                                                    <li><a href="https://satusehat.kemkes.go.id/#products">Aplikasi Stunting
                                                            Pemerintah (Satu Sehat) </a></li>
                                                    <li><a
                                                            href="https://play.google.com/store/apps/details?id=com.primaku.app&hl=id">Aplikasi
                                                            Stunting Non Pemerintah (PrimaKU) PlayStore</a></li>
                                                    <li><a
                                                            href="https://apps.apple.com/id/app/primaku-cek-pertumbuhan-anak/id1339519925?l=id">Aplikasi
                                                            Stunting Non Pemerintah (PrimaKU) iOS</a></li>
                                                    <li><a href="home/publikasi">Publikasi Stunting</a></li>
                                                </ul>
                                            </li>
                                            <li><a>Informasi Lainnya</a>
                                                <ul>
                                                    <li><a href="home/kontak">Kontak Kami</a></li>
                                                </ul>
                                            </li>


                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Mobile Menu Area End -->
            </header>