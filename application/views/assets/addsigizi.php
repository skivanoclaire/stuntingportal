<div class="main-content">
    <section class="section">
        <div class="section-body">

            <div class="card">
                <div class="card-header text-light latar">
                    <i class="fa fa-tags mr-2"></i> Entri Data Sigizi
                </div>
                <div class="card-body">
                    <form action="admin/savesigizi" method="post">
                        <div class="form-group">
                            <label for="sasaran_balita">Sasaran Balita</label>
                            <input type="number" name="sasaran_balita" required id="sasaran_balita" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_balita_diukur">Jumlah Balita Diukur</label>
                            <input type="number" name="jumlah_balita_diukur" required id="jumlah_balita_diukur" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_balita_ditemukan">Jumlah Balita Ditemukan</label>
                            <input type="number" name="jumlah_balita_ditemukan" required id="jumlah_balita_ditemukan" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="persentase_balita_diukur">Persentase Balita Diukur</label>
                            <input type="number" step="0.01" name="persentase_balita_diukur" required id="persentase_balita_diukur" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_balita_t">Jumlah Balita T</label>
                            <input type="number" name="jumlah_balita_t" required id="jumlah_balita_t" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_balita_bb_kurang">Jumlah Balita BB Kurang</label>
                            <input type="number" name="jumlah_balita_bb_kurang" required id="jumlah_balita_bb_kurang" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_balita_gizi_buruk">Jumlah Balita Gizi Buruk</label>
                            <input type="number" name="jumlah_balita_gizi_buruk" required id="jumlah_balita_gizi_buruk" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_balita_stunting">Jumlah Balita Stunting</label>
                            <input type="number" name="jumlah_balita_stunting" required id="jumlah_balita_stunting" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_balita_gizi_kurang">Jumlah Balita Gizi Kurang</label>
                            <input type="number" name="jumlah_balita_gizi_kurang" required id="jumlah_balita_gizi_kurang" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_balita_t_mendapat_mt">Jumlah Balita T Mendapat MT</label>
                            <input type="number" name="jumlah_balita_t_mendapat_mt" required id="jumlah_balita_t_mendapat_mt" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_balita_bb_kurang_mendapat_mt">Jumlah Balita BB Kurang Mendapat MT</label>
                            <input type="number" name="jumlah_balita_bb_kurang_mendapat_mt" required id="jumlah_balita_bb_kurang_mendapat_mt" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_balita_gizi_buruk_dirujuk_rs">Jumlah Balita Gizi Buruk Dirujuk RS</label>
                            <input type="number" name="jumlah_balita_gizi_buruk_dirujuk_rs" required id="jumlah_balita_gizi_buruk_dirujuk_rs" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_balita_stunting_dirujuk">Jumlah Balita Stunting Dirujuk</label>
                            <input type="number" name="jumlah_balita_stunting_dirujuk" required id="jumlah_balita_stunting_dirujuk" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_balita_gizi_kurang_mendapat_mt">Jumlah Balita Gizi Kurang Mendapat MT</label>
                            <input type="number" name="jumlah_balita_gizi_kurang_mendapat_mt" required id="jumlah_balita_gizi_kurang_mendapat_mt" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_balita_gizi_buruk_tatalaksana">Jumlah Balita Gizi Buruk Tatalaksana</label>
                            <input type="number" name="jumlah_balita_gizi_buruk_tatalaksana" required id="jumlah_balita_gizi_buruk_tatalaksana" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" name="provinsi" required id="provinsi" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="kabupaten_kota">Kabupaten/Kota</label>
                            <input type="text" name="kabupaten_kota" required id="kabupaten_kota" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_posyandu">Jumlah Posyandu</label>
                            <input type="number" name="jumlah_posyandu" required id="jumlah_posyandu" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="ketersediaan_alat_antropometri">Ketersediaan Alat Antropometri</label>
                            <input type="number" name="ketersediaan_alat_antropometri" required id="ketersediaan_alat_antropometri" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="alat_antropometri_terkalibrasi">Alat Antropometri Terkalibrasi</label>
                            <input type="number" name="alat_antropometri_terkalibrasi" required id="alat_antropometri_terkalibrasi" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="kader_terampil_antropometri">Kader Terampil Antropometri</label>
                            <input type="number" name="kader_terampil_antropometri" required id="kader_terampil_antropometri" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_posyandu_eppgbm">Jumlah Posyandu EPPGBM</label>
                            <input type="number" name="jumlah_posyandu_eppgbm" required id="jumlah_posyandu_eppgbm" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="persentase_antropometri_standar">Persentase Antropometri Standar</label>
                            <input type="number" step="0.01" name="persentase_antropometri_standar" required id="persentase_antropometri_standar" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="persentase_alat_antropometri_terkalibrasi">Persentase Alat Antropometri Terkalibrasi</label>
                            <input type="number" step="0.01" name="persentase_alat_antropometri_terkalibrasi" required id="persentase_alat_antropometri_terkalibrasi" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_kader_microsite">Jumlah Kader Microsite</label>
                            <input type="number" name="jumlah_kader_microsite" required id="jumlah_kader_microsite" class="form-control" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="kembali"></label>
                            <a href="admin/sigizi" class="btn btn-warning"><i class="fas fa-sync"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>
