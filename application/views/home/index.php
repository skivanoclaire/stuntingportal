<div class="slider1-area overlay-default">
    <div class="bend niceties preview-1">
        <div id="ensign-nivoslider-3" class="slides">
            <?php
            $no = 1;
            $q = $this->db->query("select * from slider order by id_slider asc");
            foreach ($q->result() as $row) {
                ?>
                <img src="gambar/<?php echo $row->foto ?>" alt="slider" title="#slider-direction-1" />

                <?php $no++;
            } ?>
        </div>

        <div id="slider-direction-1" class="t-cn slider-direction" ; ">
                    <div class=" slider-content s-tb slide-1">
            <div class="title-container s-tb-c">
                <div class="title1"></div>
                <p></p>
            </div>
        </div>
    </div>

    <div id="slider-direction-2" class="t-cn slider-direction">
        <div class="slider-content s-tb slide-2">
            <div class="title-container s-tb-c">
                <div class="title1"></div>
                <p></p>
                <div class="slider-btn-area">
                    <!-- <a href="home/guru" class="default-big-btn">Guru</a> -->
                </div>
            </div>
        </div>
    </div>

    <div id="slider-direction-3" class="t-cn slider-direction">
        <div class="slider-content s-tb slide-3">
            <div class="title-container s-tb-c">
                <div class="title1"></div>
                <p></p>
                <div class="slider-btn-area">
                    <!--     <a href="home/berita" class="default-big-btn">Berita</a>-->
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<?php
$no = 1;
$q = $this->db->query("select * from sambutan order by id_sambutan asc");
foreach ($q->result() as $row) {
    ?>


    <div class="about-page1-area">

        <div class="container">
            <h2 class="about-title"><?php echo $row->judul ?> </h2>
            <div class="row about-page1-inner">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="about-page-content-holder">
                        <div class="content-box">
                            <h2></h2>
                            <p align="justify"><?php echo $row->deskripsi ?> </p>

                        </div>
                        <div class="content-box">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="about-page-img-holder">
                        <img src="gambar/<?php echo $row->foto ?>" width="100%" class="img-responsive" alt="about">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $no++;
} ?>



<?php foreach ($latest_sigizi as $sigizi): ?>
    <div class="counter-area bg-primary-deep" style="background-image: url('sekolah.jpg');">
        <div class="container">
            <div class="row">
                <h2 style="color:white;">Data Pengukuran dan Intervensi Serentak Pencegahan Stunting Provinsi Kalimantan
                    Utara Berdasarkan SiGizi - Kemenkes</h2>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                    data-wow-delay=".20s" style="display: flex; flex-direction: column; align-items: center;">
                    <p>Sasaran Balita</p>
                    <h2 class="about-counter title-bar-counter" data-num="<?php echo $sigizi->sasaran_balita; ?>"></h2>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                    data-wow-delay=".40s" style="display: flex; flex-direction: column; align-items: center;">
                    <p>Jumlah Balita Diukur</p>
                    <h2 class="about-counter title-bar-counter" data-num="<?php echo $sigizi->jumlah_balita_diukur; ?>">
                    </h2>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                    data-wow-delay=".60s" style="display: flex; flex-direction: column; align-items: center;">
                    <p>Jumlah Balita Ditemukan</p>
                    <h2 class="about-counter title-bar-counter" data-num="<?php echo $sigizi->jumlah_balita_ditemukan; ?>">
                    </h2>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                    data-wow-delay=".80s" style="display: flex; flex-direction: column; align-items: center;">
                    <p>Persentase Balita Diukur</p>
                    <h2 class="about-counter title-bar-counter"
                        data-num="<?php echo round($sigizi->persentase_balita_diukur); ?>"></h2>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                    data-wow-delay=".80s" style="display: flex; flex-direction: column; align-items: center;">
                    <p>Jumlah Balita T</p>
                    <h2 class="about-counter title-bar-counter" data-num="<?php echo $sigizi->jumlah_balita_t; ?>"></h2>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                    data-wow-delay=".80s" style="display: flex; flex-direction: column; align-items: center;">
                    <p>Jumlah Balita BB Kurang</p>
                    <h2 class="about-counter title-bar-counter" data-num="<?php echo $sigizi->jumlah_balita_bb_kurang; ?>">
                    </h2>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                    data-wow-delay=".80s" style="display: flex; flex-direction: column; align-items: center;">
                    <p>Jumlah Balita Gizi Buruk</p>
                    <h2 class="about-counter title-bar-counter" data-num="<?php echo $sigizi->jumlah_balita_gizi_buruk; ?>">
                    </h2>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                    data-wow-delay=".80s" style="display: flex; flex-direction: column; align-items: center;">
                    <p>Jumlah Balita Stunting</p>
                    <h2 class="about-counter title-bar-counter" data-num="<?php echo $sigizi->jumlah_balita_stunting; ?>">
                    </h2>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                    data-wow-delay=".80s" style="display: flex; flex-direction: column; align-items: center;">
                    <p>Jumlah Balita Gizi Kurang</p>
                    <h2 class="about-counter title-bar-counter"
                        data-num="<?php echo $sigizi->jumlah_balita_gizi_kurang; ?>"></h2>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                    data-wow-delay=".80s" style="display: flex; flex-direction: column; align-items: center;">
                    <p>Jumlah Balita T Mendapat MT</p>
                    <h2 class="about-counter title-bar-counter"
                        data-num="<?php echo $sigizi->jumlah_balita_t_mendapat_mt; ?>"></h2>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                    data-wow-delay=".80s" style="display: flex; flex-direction: column; align-items: center;">
                    <p>Jumlah Balita BB Kurang Mendapat MT</p>
                    <h2 class="about-counter title-bar-counter"
                        data-num="<?php echo $sigizi->jumlah_balita_bb_kurang_mendapat_mt; ?>"></h2>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                    data-wow-delay=".80s" style="display: flex; flex-direction: column; align-items: center;">
                    <p>Jumlah Balita Gizi Buruk Dirujuk ke RS</p>
                    <h2 class="about-counter title-bar-counter"
                        data-num="<?php echo $sigizi->jumlah_balita_gizi_buruk_dirujuk_rs; ?>"></h2>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                    data-wow-delay=".80s" style="display: flex; flex-direction: column; align-items: center;">
                    <p>Jumlah Balita Stunting Dirujuk</p>
                    <h2 class="about-counter title-bar-counter"
                        data-num="<?php echo $sigizi->jumlah_balita_stunting_dirujuk; ?>"></h2>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                    data-wow-delay=".80s" style="display: flex; flex-direction: column; align-items: center;">
                    <p>Jumlah Balita Gizi Kurang Mendapat MT</p>
                    <h2 class="about-counter title-bar-counter"
                        data-num="<?php echo $sigizi->jumlah_balita_gizi_kurang_mendapat_mt; ?>"></h2>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s"
                    data-wow-delay=".80s" style="display: flex; flex-direction: column; align-items: center;">
                    <p>Jumlah Balita Gizi Buruk Tatalaksana di Puskesmas</p>
                    <h2 class="about-counter title-bar-counter"
                        data-num="<?php echo $sigizi->jumlah_balita_gizi_buruk_tatalaksana; ?>"></h2>
                </div>
            </div>
        </div>

    </div>
<?php endforeach; ?>


<div class="about-page4-area" style="padding: 50px;">
    <div class="container">
        <div class="row" style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap;">
            <div class="chart-container" style="position: relative; width: 100%; height: auto;">
                <canvas id="monthlySigiziChart"></canvas>

                <!-- Chart.js Script -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <!-- Canvas for Chart -->
                <canvas id="monthlySigiziChart" width="100%" height="100%"></canvas>

                <!-- Chart Script -->
                <script>
                    var ctx = document.getElementById('monthlySigiziChart').getContext('2d');
                    var monthlySigiziChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: [<?php foreach ($monthly_sigizi as $row) {
                                echo '"' . date('F Y', strtotime($row->year . '-' . $row->month . '-01')) . '",';
                            } ?>],

                            datasets: [
                                {
                                    label: 'Sasaran Balita',
                                    data: [<?php foreach ($monthly_sigizi as $row) {
                                        echo $row->sasaran_balita . ',';
                                    } ?>],
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'Jumlah Balita Diukur',
                                    data: [<?php foreach ($monthly_sigizi as $row) {
                                        echo $row->jumlah_balita_diukur . ',';
                                    } ?>],
                                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                                    borderColor: 'rgba(255, 206, 86, 1)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'Jumlah Balita Ditemukan',
                                    data: [<?php foreach ($monthly_sigizi as $row) {
                                        echo $row->jumlah_balita_ditemukan . ',';
                                    } ?>],
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'Jumlah Balita Stunting',
                                    data: [<?php foreach ($monthly_sigizi as $row) {
                                        echo $row->jumlah_balita_stunting . ',';
                                    } ?>],
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'Jumlah Balita Gizi Kurang',
                                    data: [<?php foreach ($monthly_sigizi as $row) {
                                        echo $row->jumlah_balita_gizi_kurang . ',';
                                    } ?>],
                                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                    borderColor: 'rgba(153, 102, 255, 1)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'Jumlah Balita Gizi Buruk',
                                    data: [<?php foreach ($monthly_sigizi as $row) {
                                        echo $row->jumlah_balita_gizi_buruk . ',';
                                    } ?>],
                                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                                    borderColor: 'rgba(255, 159, 64, 1)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'Jumlah Posyandu EPPGBM',
                                    data: [<?php foreach ($monthly_sigizi as $row) {
                                        echo $row->jumlah_posyandu_eppgbm . ',';
                                    } ?>],
                                    backgroundColor: 'rgba(201, 203, 207, 0.2)',
                                    borderColor: 'rgba(201, 203, 207, 1)',
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>

            </div>
        </div>
    </div>
</div>