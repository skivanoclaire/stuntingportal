<?php 
$berita = $this->db->query("select berita.*,user.nama,kategori.nmkat from berita inner join user on user.id_user = berita.id_user left join kategori on kategori.idkat=berita.idkat where id_berita='$id' order by id_berita desc");
$row = $berita->row();
$id = $row->id_berita;
?>
<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Layanan Aplikasi Informatika Dinas Komunikasi Informatika Statistik dan Persandian Provinsi Kalimantan Utara </title>
    <meta name="title" content="<?php echo $row->judul ?>">
    <meta name="description" content="<?php echo $row->isi ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:image" content="gambar/<?php echo $row->gambar ?>" />
	<meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@adpimkaltara" />
    <meta name="twitter:title" content="<?php echo $row->judul ?>" />
    <meta name="twitter:description" content="<?php echo $row->isi ?>" />
    <meta name="twitter:image" property="og:image" content="gambar/<?php echo $row->gambar ?>" />

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
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:bidang.aptika@kaltaraprov.go.id">bidang.aptika@kaltaraprov.go.id</a></li>
										<li><i class="fa fa-instagram" aria-hidden="true"></i><a href="https://www.instagram.com/diskominfokaltara/">diskominfokaltara</a></li>
										<li><i class="fa fa-facebook" aria-hidden="true"></i><a href="https://www.facebook.com/diskominfokaltara">diskominfokaltara</a></li>
										<li><i class="fa fa-youtube" aria-hidden="true"></i><a href="https://www.youtube.com/@KominfoKaltara">DKISP Kaltara</a></li>
										<li><i class="fa fa-twitter" aria-hidden="true"></i><a href="https://twitter.com/dkispkaltara">dkispkaltara</a></li>
										<li><i class="fa fa-phone" aria-hidden="true"></i><a href="wa.me/6282253731353">082253731353</a></li>
                                    </ul>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="main-menu-area bg-textPrimary" id="sticker">
                    <div class="container" style="width: 1800px;">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-3" >
								<div class="logo-area" >
                                    <a href=""><img class="img-responsive" src="logobaru.png" style="max-width:190%; " alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-7">
                                <nav id="desktop-nav">
                                    <ul>
                                        <li class="<?php if($this->uri->segment(2) == 'index') echo 'active' ?>"><a href="home/index" >Home</a>
                                        </li>

                                        

                                        <li class="<?php if($this->uri->segment(2) == 'layananpublik') echo 'active' ?>"><a>Layanan</a>
                                              <ul>			    
												<li class="<?php if($this->uri->segment(2) == 'hostingsubdomain') echo 'active' ?>"><a href="home/subdomainhosting">Subdomain/Hosting/Pusat Data</a></li>
												<li class="<?php if($this->uri->segment(2) == 'internet') echo 'active' ?>"><a href="home/internet">Internet (Vsat, Wifi, Fiber)</a></li>					
												<li class="<?php if($this->uri->segment(2) == 'repeater') echo 'active' ?>"><a href="home/jaringan">Jaringan Telekomunikasi</a></li>
												<li class="<?php if($this->uri->segment(2) == 'email') echo 'active' ?>"><a href="home/email">Email Resmi</a></li>
												<li class="<?php if($this->uri->segment(2) == 'pembangunan') echo 'active' ?>"><a href="home/pembangunanaplikasi">Pembangunan/ Pengembangan Aplikasi</a></li>
												<li class="<?php if($this->uri->segment(2) == 'penyediaan') echo 'active' ?>"><a href="home/penyediaanaplikasi">Penyediaan Aplikasi Berlisensi</a></li>
												
												<li class="<?php if($this->uri->segment(2) == 'spbe') echo 'active' ?>"><a href="home/spbe">SPBE 101</a></li>
												<li class="<?php if($this->uri->segment(2) == 'splp') echo 'active' ?>"><a href="home/splp">SPLP</a></li>
												<li class="<?php if($this->uri->segment(2) == 'vidcon') echo 'active' ?>"><a href="home/vidcon">Video Conference</a></li>
											</ul>
                                              </li>

                                        <li class="<?php if($this->uri->segment(2) == 'berita') echo 'active' ?>"><a href="home/berita">Berita</a>
                                           
                                        </li>
										
										<li class="<?php if($this->uri->segment(2) == 'pengumuman') echo 'active' ?>"><a href="home/pengumuman">Pengumuman</a>
                                           
                                        </li>
										
										<li class="<?php if($this->uri->segment(2) == 'a') echo 'active' ?>"><a href="">Galeri</a>
										<ul>
									
                                                <li class="<?php if($this->uri->segment(2) == 'galeri') echo 'active' ?>"><a href="home/galeri">Foto</a></li>
												<li class="<?php if($this->uri->segment(2) == 'video') echo 'active' ?>"><a href="home/video">Video</a></li>
												
                                            </ul>
										
										</li>
                                       
                                        <li class="<?php echo ($this->uri->segment(2) == 'sipinter' OR $this->uri->segment(2) == 'lainnya') ? 'active' : '' ?>"><a >SiPINTERKU</a>
                                            <ul>
                                                <li class="<?php if($this->uri->segment(2) == 'loginadmin') echo 'active' ?>"><a href="welcome">Login Admin SiPINTERKU</a></li>
                                                <li class="<?php if($this->uri->segment(2) == 'loginuser') echo 'active' ?>"><a href="welcomeuser">Login User SiPINTERKU</a></li>
                                                <li class="<?php if($this->uri->segment(2) == 'pendaftaran') echo 'active' ?>"><a href="home/pendaftaran">Register SiPINTERKU</a></li>
                                            </ul>
                                        </li>                                       
                                        <li class="<?php echo ($this->uri->segment(2) == 'lainnya' OR $this->uri->segment(2) == 'lainnya') ? 'active' : '' ?>"><a >Informasi Lainnya</a>
                                            <ul>
                                                <li class="<?php if($this->uri->segment(2) == 'kontak') echo 'active' ?>"><a href="home/kontak">Kontak, Alamat & Peta Lokasi</a></li>
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
                                           <li class=""><a href="#">Tentang Kami</a>
                                                                                          <ul>
                                                <li><a href="home/sejarah">Sejarah</a></li>
                                                <li><a href="home/visimisi">Visi Misi</a></li>
                                                <li><a href="home/tugasfungsi">Tugas Fungsi</a></li>
												<li><a href="home/struktur">Struktur Organisasi</a></li>
                                            </ul>
                                           </li>
                                           
                                           <li class=""><a href="#">Layanan Publik</a>
										   <ul>
												 
												<li><a href="home/subdomainhosting">Subdomain/Hosting/Virtual Private Server/Pusat Data</a></li>
												<li><a href="home/internet">Internet (Vsat, Wifi, Fiber)</a></li>					
												<li><a href="home/repeater">Jaringan Telekomunikasi</a></li>
												<li><a href="home/email">Email Resmi</a></li>
												<li><a href="home/pembangunanaplikasi">Pembangunan/ Pengembangan Aplikasi</a></li>
												<li><a href="home/penyediaanaplikasi">Penyediaan Aplikasi Berlisensi</a></li>
												
												<li><a href="home/spbe">SPBE 101</a></li>
												<li><a href="home/splp">SPLP</a></li>>
												<li><a href="home/vidcon">Video Conference</a></li>>
											</ul>
											
                                           </li>

                                           <li class=""><a href="home/berita">Berita</a>   </li>
										   <li class=""><a href="home/pengumuman">Pengumuman</a> </li>
										   
										   <li><a href="home/galeri">Galeri</a></li>
                                          
                                            <li><a >SiPINTERKU</a>
                                            <ul>
												<li><a href="welcome">Login Admin</a></li>
												<li><a href="welcomeuser">Login User</a></li>
												<li><a href="home/pendaftaran">Register</a></li>
                                            </ul>
                                        </li>                                         
                                           <li><a >Informasi Lainnya</a>
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