<?php 
    $get = $this->db->query("select * from stunting_data where id='$id' ");
    $row = $get->row();
    $id = $row->id;
?>
<div class="main-content">
        <section class="section">
          <div class="section-body">

<div class="card">
  <div class="card-header text-light latar">
    <i class="fa fa-user-plus mr-2"></i> <?php echo $title; ?> : 
  </div>
  <div class="card-body">
    <form action="admin/updatekemendagri/<?php echo $id; ?>" method="post"  enctype="multipart/form-data">

    <div class="form-group ">
          <label for="a">Lokasi</label>
          <input type="text" name="lokasi" value="<?php echo $row->region_name ?>" id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
        </div>
		
    <div class="form-group ">
          <label for="a">Total Balita</label>
          <input type="text" name="totalbalita" value="<?php echo $row->total_balita ?>" id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
        </div>        
   
    <div class="form-group ">
          <label for="a">Stunting Pendek</label>
          <input type="text" name="stuntingpendek" value="<?php echo $row->stunting_pendek ?>" id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
        </div>
    <div class="form-group ">
          <label for="a">Stunting Sangat Pendek</label>
          <input type="text" name="stuntingsangatpendek" value="<?php echo $row->stunting_sangat_pendek ?>" id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
        </div>
    <div class="form-group ">
          <label for="a">Prevalensi</label>
          <input type="text" name="prevalensi" value="<?php echo $row->prevalensi ?>" id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
        </div>		
        <div class="form-group">
          <label for="a"></label>
          <a href="admin/kemendagri" class="btn btn-warning"><i class="fas fa-sync"></i> Kembali</a>
          <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i> Simpan</button>
        </div>
    </form>
  </div>
</div>


          </div>
        </section>
</div>