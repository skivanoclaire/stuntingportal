
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                <div class="card">
                  <div class="latar card-header">
                    <h4 class="text-light">Galleri</h4>
                  </div>
                  <div class="card-body">
                    <a href="admin/addgaleri" class="btn btn-primary mb-3"><i class="fa fa images"></i> Tambah Galeri</a>
                      <div class="row">
                        <?php $q = $this->db->query("select * from galeri order by id_galeri desc");
                            foreach($q->result() as $row){
                        ?>
                            <div class="card mr-3" style="width: 18rem;">
                        <img src="gambar/<?php echo $row->gambar ?>" width="120" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text"><?php echo $row->judul ?></p>
                            <p class="card-text">Status : <?php echo $row->status ?></p>
                            <a href="admin/hapusgaleri/<?php echo $row->id_galeri ?>" class="tombol-hapus btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                            <a href="admin/editgaleri/<?php echo $row->id_galeri ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                        </div>
                        </div>
                     <?php  } ?>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      
      </div>
