<div class="main-content">
        <section class="section">
          <div class="section-body">

<div class="card">
  <div class="card-header text-light latar">
    <i class="fa fa-user-plus mr-2"></i> <?php echo $title; ?>
  </div>
  <div class="card-body">
    <form action="admin/savegaleri" method="post"  enctype="multipart/form-data">
        
    <div class="form-group ">
          <label for="a">Judul</label>
          <input type="text" name="judul" required id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
        </div>
        <div class="form-group ">
          <label for="a">Gambar</label>
          <input type="file" name="gambar" required id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
            <br>
            <span class="badge badge-warning">Upload Hanya Bisa Bertype jpg jpeg gif bmp. Disarankan jpeg</span>
        </div>

    <div class="form-group ">
          <label for="a">Tanggal </label>
          <input type="date" value="<?php echo date('Y-m-d') ?>" name="tanggal" required  id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
        </div>
    
    
        <div class="form-group ">
          <label for="a">Status</label>
            <select name="status" id="" class="custom-select">
                <option value="">Pilih</option>
                <option value="Publish">Publish</option>
                <option value="Draft">Draft</option>
            </select>
        </div>
    

        <div class="form-group">
          <label for="a"></label>
          <a href="admin/galeri" class="btn btn-warning"><i class="fas fa-sync"></i> Kembali</a>
          <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i> Simpan</button>
        </div>
    </form>
  </div>
</div>


          </div>
        </section>
</div>