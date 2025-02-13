<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="card">
        <div class="card-header text-light latar">
          <i class="fa fa-newspaper-alt mr-2"></i> Entri Berita
        </div>
        <div class="card-body">
          <form action="admin/saveberita" method="post" enctype="multipart/form-data">
            <div class="form-group ">
              <label for="a">Judul</label>
              <input type="text" name="judul" required id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
            </div>
            <div class="form-group ">
              <label for="a">Gambar</label>
              <input type="file" name="gambar" required id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
              <br>
              <span class="badge badge-warning">Upload Hanya Bisa Bertype JPG GIF PNG JPEG BMP</span>
              <br>

            </div>

            <!-- TAMBAHCODINGAN -->
            <!-- HIDE -->
            <a class="btn btn-primary" role="button" data-toggle="collapse" href="#tambahgambar2" aria-expanded="false" aria-controls="tambahgambar2">Tambah Gambar 2</a>
            <div class="collapse" id="tambahgambar2">
              <div class="form-group ">
                <label for="a">Gambar2</label>
                <input type="file" name="gambar2" id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
                <br>
                <span class="badge badge-warning">Upload Hanya Bisa Bertype JPG GIF PNG JPEG BMP </span>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#tambahgambar2" aria-expanded="false" aria-controls="tambahgambar2">Batal</button>
                <!-- BATAS TOMBOL TAMBAH 2-->
                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#tambahgambar3" aria-expanded="false" aria-controls="tambahgambar3">Tambah Gambar 3</a>
                <div class="collapse" id="tambahgambar3">
                  <div class="form-group ">
                    <label for="a">Gambar3</label>
                    <input type="file" name="gambar3" id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
                    <br>
                    <span class="badge badge-warning">Upload Hanya Bisa Bertype JPG GIF PNG JPEG BMP </span>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#tambahgambar3" aria-expanded="false" aria-controls="tambahgambar3">Batal</button>
                    <!-- BATAS TOMBOL TAMBAH 3-->
                    <a class="btn btn-primary" role="button" data-toggle="collapse" href="#tambahgambar4" aria-expanded="false" aria-controls="tambahgambar4">Tambah Gambar 4</a>
                    <div class="collapse" id="tambahgambar4">
                      <div class="form-group ">
                        <label for="a">Gambar4</label>
                        <input type="file" name="gambar4" id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
                        <br>
                        <span class="badge badge-warning">Upload Hanya Bisa Bertype JPG GIF PNG JPEG BMP </span>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#tambahgambar4" aria-expanded="false" aria-controls="tambahgambar4">Batal</button>
                        <!-- BATAS TOMBOL TAMBAH 4-->
                        <a class="btn btn-primary" role="button" data-toggle="collapse" href="#tambahgambar5" aria-expanded="false" aria-controls="tambahgambar5">Tambah Gambar 5</a>
                        <div class="collapse" id="tambahgambar5">
                          <div class="form-group ">
                            <label for="a">Gambar5</label>
                            <input type="file" name="gambar5" id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
                            <br>
                            <span class="badge badge-warning">Upload Hanya Bisa Bertype JPG GIF PNG JPEG BMP </span>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#tambahgambar5" aria-expanded="false" aria-controls="tambahgambar5">Batal</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- BATASKODINGAN -->
            
            <!-- Batas Hide -->
            <div class="form-group ">
              <label for="a">Keyword</label>
              <input type="text" name="keyword" id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
            </div>
            <div class="form-group ">
              <label for="a">Isi</label>
              <textarea name="isi" id="ckeditor"  style="width:100%; height:250px;" ></textarea>
            </div>
            <div style="margin-bottom: 1rem; width: fit-content; display: inline-block;">
                  <label for="a">Tanggal</label>
                    <input type="date" name="tanggal" value="<?php echo date('d-m-Y') ?>" required id="a" style="width: auto; padding: .375rem .75rem; border: 1px solid #ced4da; border-radius: .25rem;" autocomplete="off" aria-describedby="helpId">
            </div>

            <div class="form-group ">
              <label for="a">Status Berita</label>
              <select name="status" id="" class="custom-select">
                <option value="">Pilih</option>
                <option value="Publish">Publish</option>
                <option value="Draft">Draft</option>
              </select>
            </div>
            
            <div class="form-group ">
            <label for="a">Kategori</label>
            <select name="kat" id="" class="custom-select">
                <?php
                    $q =  $this->db->query("select * from kategori");
                    foreach($q->result() as $row){
                ?>
                <option value="<?php echo $row->idkat?>"><?php echo $row->nmkat?></option>
                <?php } ?>
            </select>
            </div>
            
            <div class="form-group">
              <label for="a"></label>
              <a href="admin/berita" class="btn btn-warning">
                <i class="fas fa-sync"></i> Kembali </a>
              <button type="submit" class="btn btn-primary ">
                <i class="fa fa-paper-plane"></i> Simpan </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

<script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
<!-- Page script -->

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.

    CKEDITOR.replace('ckeditor');


  });
</script>