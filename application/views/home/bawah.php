<br>
<br>

<footer>
    <div class="footer-area-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-box">
                        <a><img class="img-responsive" src="logokaltara.png" width="140" alt="logo"></a>
                        <div class="footer-about">
                            <p>Dinas Komunikasi Informatika Statistik dan Persandian Provinsi Kalimantan Utara </p>
                        </div>
                        <ul class="footer-social">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 center">
                    <div class="footer-box">
                        <h3>Menu Utama</h3>
                        <ul class="featured-links">
                            <li>
                                <ul>

                                    <li><a href="home/berita">Berita</a></li>
                                    <li><a href="home/pengumuman">Pengumuman</a></li>
                                    <li><a href="home/kontak">Kontak Kami</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 center">
                    <div class="footer-box">
                        <h3>Informasi</h3>
                        <ul class="featured-links">
                            <li>
                                <ul>


                                    <li><a href="https://ppid.kaltaraprov.go.id">Informasi Publik</a></li>
                                    <li><a href="https://lapor.go.id/">Laporan Pengaduan</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-box">
                        <h3>Info dan Kontak</h3>
                        <ul class="corporate-address">
                            <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:-"> - </a></li>
                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a
                                    href="mailto:bidang.aptika@kaltaraprov.go.id">bidang.aptika@kaltaraprov.go.id</a>
                            </li>
                            <li><i class="fa fa-instagram" aria-hidden="true"></i><a
                                    href="https://www.instagram.com/diskominfokaltara/">diskominfokaltara</a></li>
                            <li><i class="fa fa-map-marker"></i> Jalan Rambutan Gedung Gadis Lantai 5, Bulungan,
                                Provinsi Kalimantan Utara</li>
                            <li><i class="fa fa-eye"></i> Total Pengunjung:
                                <?php echo isset($total_visitors) ? $total_visitors : 0; ?>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <p>&copy; <?php echo date('Y') ?> APTIKA DKISP All Rights Reserved.</p>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End Here -->
</div>

<?php if ($this->session->flashdata('msg') == 'berhasil') { ?>
    <script>
        Swal.fire(
            'Sukses',
            'Terima Kasih Telah Menghubungi Kami',
            'success'
        );
    </script>
<?php } ?>
<?php if ($this->session->flashdata('msg') == 'error') { ?>
    <script>
        Swal.fire(
            'Informasi',
            'atau password salah',
            'error'
        );
    </script>
<?php } ?>
<!-- Main Body Area End Here -->
<!-- jquery-->
<script src="depan/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<!-- Plugins js -->
<script src="depan/js/plugins.js" type="text/javascript"></script>
<!-- Bootstrap js -->
<script src="depan/js/bootstrap.min.js" type="text/javascript"></script>
<!-- WOW JS -->
<script src="depan/js/wow.min.js"></script>
<!-- Nivo slider js -->
<script src="depan/vendor/slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="depan/vendor/slider/home.js" type="text/javascript"></script>
<!-- Owl Cauosel JS -->
<script src="depan/vendor/OwlCarousel/owl.carousel.min.js" type="text/javascript"></script>
<!-- Meanmenu Js -->
<script src="depan/js/jquery.meanmenu.min.js" type="text/javascript"></script>
<!-- Srollup js -->
<script src="depan/js/jquery.scrollUp.min.js" type="text/javascript"></script>
<!-- jquery.counterup js -->
<script src="depan/js/jquery.counterup.min.js"></script>
<script src="depan/js/waypoints.min.js"></script>
<!-- Countdown js -->
<script src="depan/js/jquery.countdown.min.js" type="text/javascript"></script>
<!-- Isotope js -->
<script src="depan/js/isotope.pkgd.min.js" type="text/javascript"></script>
<!-- Magic Popup js -->
<script src="depan/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
<!-- Gridrotator js -->
<script src="depan/js/jquery.gridrotator.js" type="text/javascript"></script>
<!-- Custom Js -->
<script src="depan/js/main.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    }); </script>
<!--Batas Js Search-->

<script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>