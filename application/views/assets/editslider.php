<?php 
    $sk =  $this->db->query("select * from slider where id_slider='$id_slider'");
    $row=  $sk->row();
    $id_slider = $row->id_slider;
?>
<div class="main-content">
        <section class="section">
          <div class="section-body">

<div class="card">
  <div class="card-header text-light latar">
    <i class="fa fa-user-plus mr-2"></i> <?php echo $title; ?> : 
  </div>
  <div class="card-body">
    <form action="admin/updateslider/<?php echo $id_slider; ?>" method="post"  enctype="multipart/form-data">
        
   
    <div class="form-group ">
          <label for="a">Foto</label><br>
          <img src="gambar/<?php echo $row->foto ?>" alt="" class="img rounded-circle" width="120">
          <br>
          <input type="file" name="gambar"  id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
            <br>
            <span class="badge badge-warning">Upload Hanya Bisa Bertype JPG</span>
        </div>


        <div class="form-group">
          <label for="a"></label>
          <a href="admin/slider" class="btn btn-warning"><i class="fas fa-sync"></i> Kembali</a>
          <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i> Simpan</button>
        </div>
    </form>
  </div>
</div>


          </div>
        </section>
</div>