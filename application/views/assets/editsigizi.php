<?php 
    // Fetch data from the database based on the provided ID
    $get = $this->db->query("SELECT * FROM data_sigizi WHERE id='$id'");
    $row = $get->row();
    $id = $row->id; // Store the ID for form submission
?>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-header text-light latar">
                    <i class="fa fa-user-plus mr-2"></i> <?php echo $title; ?>: 
                </div>
                <div class="card-body">
                    <form action="admin/updatesigizi/<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="sasaran">Sasaran Balita</label>
                            <input type="number" name="sasaran_balita" value="<?php echo isset($row->sasaran_balita) ? $row->sasaran_balita : ''; ?>" id="sasaran" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_diukur">Jumlah Balita Diukur</label>
                            <input type="number" name="jumlah_balita_diukur" value="<?php echo isset($row->jumlah_balita_diukur) ? $row->jumlah_balita_diukur : ''; ?>" id="jumlah_diukur" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>
                        
                        <div class="form-group">
                            <label for="jumlah_ditemukan">Jumlah Balita Ditemukan</label>
                            <input type="number" name="jumlah_balita_ditemukan" value="<?php echo isset($row->jumlah_balita_ditemukan) ? $row->jumlah_balita_ditemukan : ''; ?>" id="jumlah_ditemukan" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>
                        
                        <div class="form-group">
                            <label for="persentase">Persentase Balita Diukur</label>
                            <input type="number" step="0.01" name="persentase_balita_diukur" value="<?php echo isset($row->persentase_balita_diukur) ? $row->persentase_balita_diukur : ''; ?>" id="persentase" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_t">Jumlah Balita T</label>
                            <input type="number" name="jumlah_balita_t" value="<?php echo isset($row->jumlah_balita_t) ? $row->jumlah_balita_t : ''; ?>" id="jumlah_t" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_bb_kurang">Jumlah Balita BB Kurang</label>
                            <input type="number" name="jumlah_balita_bb_kurang" value="<?php echo isset($row->jumlah_balita_bb_kurang) ? $row->jumlah_balita_bb_kurang : ''; ?>" id="jumlah_bb_kurang" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_gizi_buruk">Jumlah Balita Gizi Buruk</label>
                            <input type="number" name="jumlah_balita_gizi_buruk" value="<?php echo isset($row->jumlah_balita_gizi_buruk) ? $row->jumlah_balita_gizi_buruk : ''; ?>" id="jumlah_gizi_buruk" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_stunting">Jumlah Balita Stunting</label>
                            <input type="number" name="jumlah_balita_stunting" value="<?php echo isset($row->jumlah_balita_stunting) ? $row->jumlah_balita_stunting : ''; ?>" id="jumlah_stunting" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_gizi_kurang">Jumlah Balita Gizi Kurang</label>
                            <input type="number" name="jumlah_balita_gizi_kurang" value="<?php echo isset($row->jumlah_balita_gizi_kurang) ? $row->jumlah_balita_gizi_kurang : ''; ?>" id="jumlah_gizi_kurang" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_t_mendapat_mt">Jumlah Balita T Mendapat MT</label>
                            <input type="number" name="jumlah_balita_t_mendapat_mt" value="<?php echo isset($row->jumlah_balita_t_mendapat_mt) ? $row->jumlah_balita_t_mendapat_mt : ''; ?>" id="jumlah_t_mendapat_mt" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_bb_kurang_mendapat_mt">Jumlah Balita BB Kurang Mendapat MT</label>
                            <input type="number" name="jumlah_balita_bb_kurang_mendapat_mt" value="<?php echo isset($row->jumlah_balita_bb_kurang_mendapat_mt) ? $row->jumlah_balita_bb_kurang_mendapat_mt : ''; ?>" id="jumlah_bb_kurang_mendapat_mt" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_gizi_buruk_dirujuk">Jumlah Balita Gizi Buruk Dirujuk RS</label>
                            <input type="number" name="jumlah_balita_gizi_buruk_dirujuk_rs" value="<?php echo isset($row->jumlah_balita_gizi_buruk_dirujuk_rs) ? $row->jumlah_balita_gizi_buruk_dirujuk_rs : ''; ?>" id="jumlah_gizi_buruk_dirujuk" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_stunting_dirujuk">Jumlah Balita Stunting Dirujuk</label>
                            <input type="number" name="jumlah_balita_stunting_dirujuk" value="<?php echo isset($row->jumlah_balita_stunting_dirujuk) ? $row->jumlah_balita_stunting_dirujuk : ''; ?>" id="jumlah_stunting_dirujuk" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_gizi_kurang_mendapat_mt">Jumlah Balita Gizi Kurang Mendapat MT</label>
                            <input type="number" name="jumlah_balita_gizi_kurang_mendapat_mt" value="<?php echo isset($row->jumlah_balita_gizi_kurang_mendapat_mt) ? $row->jumlah_balita_gizi_kurang_mendapat_mt : ''; ?>" id="jumlah_gizi_kurang_mendapat_mt" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_gizi_buruk_tatalaksana">Jumlah Balita Gizi Buruk Tatalaksana</label>
                            <input type="number" name="jumlah_balita_gizi_buruk_tatalaksana" value="<?php echo isset($row->jumlah_balita_gizi_buruk_tatalaksana) ? $row->jumlah_balita_gizi_buruk_tatalaksana : ''; ?>" id="jumlah_gizi_buruk_tatalaksana" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" name="provinsi" value="<?php echo isset($row->provinsi) ? $row->provinsi : ''; ?>" id="provinsi" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="kabupaten_kota">Kabupaten/Kota</label>
                            <input type="text" name="kabupaten_kota" value="<?php echo isset($row->kabupaten_kota) ? $row->kabupaten_kota : ''; ?>" id="kabupaten_kota" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_posyandu">Jumlah Posyandu</label>
                            <input type="number" name="jumlah_posyandu" value="<?php echo isset($row->jumlah_posyandu) ? $row->jumlah_posyandu : ''; ?>" id="jumlah_posyandu" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="ketersediaan_alat_antropometri">Ketersediaan Alat Antropometri</label>
                            <input type="number" name="ketersediaan_alat_antropometri" value="<?php echo isset($row->ketersediaan_alat_antropometri) ? $row->ketersediaan_alat_antropometri : ''; ?>" id="ketersediaan_alat_antropometri" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="alat_antropometri_terkalibrasi">Alat Antropometri Terkalibrasi</label>
                            <input type="number" name="alat_antropometri_terkalibrasi" value="<?php echo isset($row->alat_antropometri_terkalibrasi) ? $row->alat_antropometri_terkalibrasi : ''; ?>" id="alat_antropometri_terkalibrasi" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="kader_terampil_antropometri">Kader Terampil Antropometri</label>
                            <input type="number" name="kader_terampil_antropometri" value="<?php echo isset($row->kader_terampil_antropometri) ? $row->kader_terampil_antropometri : ''; ?>" id="kader_terampil_antropometri" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_posyandu_eppgbm">Jumlah Posyandu EPPGBM</label>
                            <input type="number" name="jumlah_posyandu_eppgbm" value="<?php echo isset($row->jumlah_posyandu_eppgbm) ? $row->jumlah_posyandu_eppgbm : ''; ?>" id="jumlah_posyandu_eppgbm" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="persentase_antropometri_standar">Persentase Antropometri Standar</label>
                            <input type="number" step="0.01" name="persentase_antropometri_standar" value="<?php echo isset($row->persentase_antropometri_standar) ? $row->persentase_antropometri_standar : ''; ?>" id="persentase_antropometri_standar" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="persentase_alat_antropometri_terkalibrasi">Persentase Alat Antropometri Terkalibrasi</label>
                            <input type="number" step="0.01" name="persentase_alat_antropometri_terkalibrasi" value="<?php echo isset($row->persentase_alat_antropometri_terkalibrasi) ? $row->persentase_alat_antropometri_terkalibrasi : ''; ?>" id="persentase_alat_antropometri_terkalibrasi" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_kader_microsite">Jumlah Kader Microsite</label>
                            <input type="number" name="jumlah_kader_microsite" value="<?php echo isset($row->jumlah_kader_microsite) ? $row->jumlah_kader_microsite : ''; ?>" id="jumlah_kader_microsite" class="form-control" autocomplete="off" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="a"></label>
                            <a href="admin/sigizi" class="btn btn-warning"><i class="fas fa-sync"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
