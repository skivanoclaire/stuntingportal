<?php 
    $asd = $this->db->query("select * from galeri where id_galeri='$id'");
    $row = $asd->row();
    $id = $row->id_galeri;
?>
<div class="main-content">
        <section class="section">
          <div class="section-body">

<div class="card">
  <div class="card-header text-light latar">
    <i class="fa fa-images mr-2"></i> <?php echo $title; ?> : <?php echo $row->judul ?>
  </div>
  <div class="card-body">
    <form action="admin/updategaleri/<?php echo $id; ?>" method="post"  enctype="multipart/form-data">
        
    <div class="form-group ">
          <label for="a">Judul</label>
          <input type="text" name="judul" value="<?php echo $row->judul ?>" required id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
        </div>
        <div class="form-group ">
          <label for="a" class="mb-2">Gambar</label><br>
          <img src="gambar/<?php echo $row->gambar ?>" alt="" class="img img-thumbnail mb-2" width="180">
          <br>
          <input type="file" name="gambar"  id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
            <br>
            <span class="badge badge-warning">Upload Hanya Bisa Bertype JPG</span>
        </div>

    <div class="form-group ">
          <label for="a">Tanggal </label>
          <input type="date" value="<?php echo $row->tanggal ?>" name="tanggal" required  id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
        </div>
    
    
        <div class="form-group ">
          <label for="a">Status</label>
            <select name="status" id="" class="custom-select">
                <option value="">Pilih</option>
                <option value="Publish"<?php if($row->status == 'Publish') echo 'selected'; ?>>Publish</option>
                <option value="Draft"<?php if($row->status == 'Draft') echo 'selected'; ?>>Draft</option>
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