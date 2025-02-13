<?php 

    $ws = $this->db->query("select * from pengumuman where id_pengumuman='$id'");

    $row = $ws->row();

    $id = $row->id_pengumuman;

?>



<div class="main-content">

        <section class="section">

          <div class="section-body">



<div class="card">

  <div class="card-header text-light latar">

    <i class="fa fa-newspaper-alt mr-2"></i> <?php echo $title; ?> : <?php echo $row->judul ?>

  </div>

  <div class="card-body">

    <form action="admin/updatepengumuman/<?php echo $id ?>" method="post"  enctype="multipart/form-data">

        

    

    <div class="form-group ">

          <label for="a">Judul</label>

          <input type="text" name="judul" value="<?php echo $row->judul ?>" id="a" class="form-control" autocomplete="off" aria-describedby="helpId">

        </div>

    

    <div class="form-group ">

          <label for="a" class="mb-2">File</label><br>

          <input type="file" name="gambar"  id="a" class="form-control" autocomplete="off" aria-describedby="helpId">

            <br>

            <span class="badge badge-warning">Upload Hanya Bisa Bertype pdf,xls,word</span>

        </div>




    


        <div class="form-group">

          <label for="a"></label>

          <a href="admin/pengumuman" class="btn btn-warning"><i class="fas fa-sync"></i> Kembali</a>

          <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i> Simpan</button>

        </div>

    </form>

  </div>

</div>





          </div>

        </section>

</div>