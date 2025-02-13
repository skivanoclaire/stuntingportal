<?php 
    $sk =  $this->db->query("select * from pengguna where id_pengguna='$idpengguna'");
    $row=  $sk->row();
    $idpengguna = $row->id_pengguna;
?>
<div class="main-content">
        <section class="section">
          <div class="section-body">

<div class="card">
  <div class="card-header text-light latar">
    <i class="fa fa-user-plus mr-2"></i> <?php echo $title; ?> <?php echo $row->nama ?>
  </div>
  <div class="card-body">
    <form action="admin/updatepengguna/<?php echo $idpengguna ?>" method="post"  enctype="multipart/form-data">
 
        <div class="form-group ">
          <label for="a">Nama</label>
          <input type="text" name="nama" value="<?php echo $row->nama ?>"  id="a" class="form-control" autocomplete="off" aria-describedby="helpId">

       </div>
	           <div class="form-group ">
          <label for="a">Username</label>
          <input type="text" name="username" value="<?php echo $row->username ?>"  id="a" class="form-control" autocomplete="off" aria-describedby="helpId">

       </div>
	           <div class="form-group ">
          <label for="a">Password (Minimal 8 digit password, Harus mengandung 1 angka dan 1 huruf kecil dan huruf besar)</label>
          <input type="text" name="password" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="Minimal 8 digit password, Harus mengandung 1 angka dan 1 huruf kecil dan huruf besar"  id="a" class="form-control" autocomplete="off" aria-describedby="helpId">

       </div>
	           <div class="form-group ">
          <label for="a">Level</label>
          <input type="text" name="level" value="<?php echo $row->level ?>"  id="a" class="form-control" autocomplete="off" aria-describedby="helpId">

       </div>

        <div class="form-group">
          <label for="a"></label>
          <a href="admin/datapengguna" class="btn btn-warning"><i class="fas fa-sync"></i> Kembali</a>
          <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i> Simpan</button>
        </div>
    </form>
  </div>
</div>


          </div>
        </section>
</div>
