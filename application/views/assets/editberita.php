<?php 
    $ws = $this->db->query("select * from berita where id_berita='$id'");
    $row = $ws->row();
    $id = $row->id_berita;
?>

<div class="main-content">
        <section class="section">
          <div class="section-body">

<div class="card">
  <div class="card-header text-light latar">
    <i class="fa fa-newspaper-alt mr-2"></i> <?php echo $title; ?> : <?php echo $row->judul ?>
  </div>
  <div class="card-body">
    <form action="admin/updateberita/<?php echo $id ?>" method="post"  enctype="multipart/form-data">
        
    
    <div class="form-group ">
          <label for="a">Judul</label>
          <input type="text" name="judul" value="<?php echo $row->judul ?>" id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
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
          <label for="a" class="mb-2">Gambar</label><br>
          <img src="gambar/<?php echo $row->gambar2 ?>" alt="" class="img img-thumbnail mb-2" width="180">
          <br>
          <input type="file" name="gambar2"  id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
            <br>
            <span class="badge badge-warning">Upload Hanya Bisa Bertype JPG</span>
        </div>
		
		    <div class="form-group ">
          <label for="a" class="mb-2">Gambar</label><br>
          <img src="gambar/<?php echo $row->gambar3 ?>" alt="" class="img img-thumbnail mb-2" width="180">
          <br>
          <input type="file" name="gambar3"  id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
            <br>
            <span class="badge badge-warning">Upload Hanya Bisa Bertype JPG</span>
        </div>
		
		    <div class="form-group ">
          <label for="a" class="mb-2">Gambar</label><br>
          <img src="gambar/<?php echo $row->gambar4 ?>" alt="" class="img img-thumbnail mb-2" width="180">
          <br>
          <input type="file" name="gambar4"  id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
            <br>
            <span class="badge badge-warning">Upload Hanya Bisa Bertype JPG</span>
        </div>
		
		    <div class="form-group ">
          <label for="a" class="mb-2">Gambar</label><br>
          <img src="gambar/<?php echo $row->gambar5 ?>" alt="" class="img img-thumbnail mb-2" width="180">
          <br>
          <input type="file" name="gambar5"  id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
            <br>
            <span class="badge badge-warning">Upload Hanya Bisa Bertype JPG</span>
        </div>
        
    <div class="form-group ">
          <label for="a">Keyword</label>
          <input type="text" value="<?php echo $row->keyword ?>" name="keyword"  id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
        </div>
    
        
    <div class="form-group ">
          <label for="a">Isi</label>
              <textarea name="isi" id="ckeditor" style="width:100%; height:250px;" ><?php echo $row->isi ?></textarea>
        </div>
    
            
<div class="form-group">
  <label for="a" style="display: block; margin-bottom: 5px;">Tanggal</label>
  <input type="date" name="tanggal" value="<?php echo $row->tanggal_post ?>" required id="a" style="display: block; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);" autocomplete="off" aria-describedby="helpId">
</div>



    <div class="form-group ">
          <label for="a">Status Berita</label>
            <select name="status" id="" class="custom-select">
                <option value="">Pilih</option>
                <option value="Publish" <?php if($row->status_berita == 'Publish') echo "selected"; ?>>Publish</option>
                <option value="Draft" <?php if($row->status_berita == 'Draft') echo "selected"; ?>>Draft</option>
            </select>
        </div>
    
<div class="form-group">
    <label for="kat">Kategori</label>
    <select name="kat" id="kat" class="custom-select">
        <?php foreach ($categories as $row) {
            $selected = ($row->idkat == $selected_kat) ? 'selected' : '';
        ?>
            <option value="<?php echo $row->idkat; ?>" <?php echo $selected; ?>>
                <?php echo $row->nmkat; ?>
            </option>
        <?php } ?>
    </select>
</div>

        <div class="form-group">
          <label for="a"></label>
          <a href="admin/berita" class="btn btn-warning"><i class="fas fa-sync"></i> Kembali</a>
          <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i> Simpan</button>
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