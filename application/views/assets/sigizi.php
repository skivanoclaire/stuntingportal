<div class="main-content">
    <section class="section">
        <div class="section-body">
            <!-- add content here -->
            <div class="card">
                <div class="card-header latar text-light">
                    <?php echo $title; ?>
                </div>
                <div class="card-body table-responsive">
                    <a href="admin/addsigizi" class="btn btn-primary mb-3"><i class="fa fa-tags"></i> Tambah Data</a>
                    <a href="admin/importsigizi" class="btn btn-primary mb-3"><i class="fa fa-file-import"></i> Import
                        Data CSV</a>
                    <a href="admin/sinkron_API_sigizi" class="btn btn-primary mb-3"><i class="fa fa-sync"></i> Sinkron
                        API SiGizi</a>
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sasaran Balita</th>
                                <th>Jumlah Balita Diukur</th>
                                <th>Jumlah Balita Ditemukan</th>
                                <th>Persentase Balita Diukur</th>
                                <th>Jumlah Balita T</th>
                                <th>Jumlah Balita BB Kurang</th>
                                <th>Jumlah Balita Gizi Buruk</th>
                                <th>Jumlah Balita Stunting</th>
                                <th>Jumlah Balita Gizi Kurang</th>
                                <th>Jumlah Balita T Mendapat MT</th>
                                <th>Jumlah Balita BB Kurang Mendapat MT</th>
                                <th>Jumlah Balita Gizi Buruk Dirujuk RS</th>
                                <th>Jumlah Balita Stunting Dirujuk</th>
                                <th>Jumlah Balita Gizi Kurang Mendapat MT</th>
                                <th>Jumlah Balita Gizi Buruk Tatalaksana</th>
                                <th>Provinsi</th>
                                <th>Kabupaten/Kota</th>
                                <th>Jumlah Posyandu EPPGBM</th>
                                <th>Persentase Antropometri Standar</th>
                                <th>Persentase Alat Antropometri Terkalibrasi</th>
                                <th>Jumlah Kader Microsite</th>
                                <th>Tanggal Input</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $q = $this->db->query("SELECT * FROM data_sigizi ORDER BY id ASC");
                            foreach ($q->result() as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->sasaran_balita; ?></td>
                                    <td><?php echo $row->jumlah_balita_diukur; ?></td>
                                    <td><?php echo $row->jumlah_balita_ditemukan; ?></td>
                                    <td><?php echo number_format($row->persentase_balita_diukur, 2); ?></td>
                                    <td><?php echo $row->jumlah_balita_t; ?></td>
                                    <td><?php echo $row->jumlah_balita_bb_kurang; ?></td>
                                    <td><?php echo $row->jumlah_balita_gizi_buruk; ?></td>
                                    <td><?php echo $row->jumlah_balita_stunting; ?></td>
                                    <td><?php echo $row->jumlah_balita_gizi_kurang; ?></td>
                                    <td><?php echo $row->jumlah_balita_t_mendapat_mt; ?></td>
                                    <td><?php echo $row->jumlah_balita_bb_kurang_mendapat_mt; ?></td>
                                    <td><?php echo $row->jumlah_balita_gizi_buruk_dirujuk_rs; ?></td>
                                    <td><?php echo $row->jumlah_balita_stunting_dirujuk; ?></td>
                                    <td><?php echo $row->jumlah_balita_gizi_kurang_mendapat_mt; ?></td>
                                    <td><?php echo $row->jumlah_balita_gizi_buruk_tatalaksana; ?></td>
                                    <td><?php echo $row->provinsi; ?></td>
                                    <td><?php echo $row->kabupaten_kota; ?></td>
                                    <td><?php echo $row->jumlah_posyandu_eppgbm; ?></td>
                                    <td><?php echo number_format($row->persentase_antropometri_standar, 2); ?></td>
                                    <td><?php echo number_format($row->persentase_alat_antropometri_terkalibrasi, 2); ?>
                                    </td>
                                    <td><?php echo $row->jumlah_kader_microsite; ?></td>
                                    <td><?php echo $row->created_at; ?></td>
                                    <td>
                                        <a href="admin/editsigizi/<?php echo $row->id; ?>" data-toggle="tooltip"
                                            data-placement="top" title="Ubah Data" class="btn btn-info"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="admin/deletesigizi/<?php echo $row->id; ?>" data-toggle="tooltip"
                                            data-placement="top" title="Hapus Data" class="btn btn-danger tombol-hapus"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- close -->
        </div>
    </section>
</div>