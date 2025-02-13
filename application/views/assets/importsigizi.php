<div class="main-content">
    <section class="section">
        <div class="section-body">

            <div class="card">
                <div class="card-header text-light latar">
                    <i class="fa fa-tags mr-2"></i> Import CSV Sigizi
                </div>
                <div class="card-body">
                    <form action="<?= site_url('admin/saveimportsigizi') ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="csv_file">Pilih File CSV</label>
                            <input type="file" name="csv_file" required id="csv_file" class="form-control" accept=".csv">
                        </div>

                        <div class="form-group">
                            <label for="kembali"></label>
                            <a href="<?= site_url('admin/sigizi') ?>" class="btn btn-warning">
                                <i class="fas fa-sync"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-paper-plane"></i> Simpan
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </section>
</div>
