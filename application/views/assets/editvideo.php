<link rel="stylesheet" href="assets/bootstrapdatepicker/bootstrap-datepicker.css">
<script src="assets/bootstrapdatepicker/bootstrap-datepicker.js"></script>
<?php 
    $get = $this->db->query("select * from video where id_video='$id' ");
    $row = $get->row();
    $id = $row->id_video;
?>
<div class="main-content">
        <section class="section">
          <div class="section-body">

<div class="card">
  <div class="card-header text-light latar">
    <i class="fa fa-user-plus mr-2"></i> <?php echo $title; ?> 
  </div>
  <div class="card-body">
    <form action="admin/updatevideo/<?php echo $id ?>" method="post"  enctype="multipart/form-data">
 
        <div class="form-group ">
          <label for="a">Judul</label>
          <input type="text" name="judul" value="<?php echo $row->judul ?>"  id="a" class="form-control" autocomplete="off" aria-describedby="helpId">

       </div>
        <div class="form-group ">
          <label for="a">Link/Url Video (Contoh : https://www.youtube.com/embed/i0uuNx2ftjw)</label>
          <input type="text" name="link_video" value="<?php echo $row->link_video ?>"  id="a" class="form-control" autocomplete="off" aria-describedby="helpId">

       </div>

        <div class="form-group">
          <label for="a"></label>
          <a href="admin/video" class="btn btn-warning"><i class="fas fa-sync"></i> Kembali</a>
          <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i> Simpan</button>
        </div>
    </form>
  </div>
</div>


          </div>
        </section>
</div>

<script>
     $(".tahun").datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years",
    autoclose: true,
    todayHighlight: true
  });
  $('.tgl').datepicker({
				format: 'yyyy-mm-dd',
				autoclose: true,
				//startView: 2,
				todayBtn: true,
				todayHighlight: true,
				clearBtn: true,
				language: 'id',
			});
</script>