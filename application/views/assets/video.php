
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
            <div class="card-header latar text-light">
                <?php echo $title; ?>
            </div>
            <div class="card-body table-responsive">
                <a href="admin/addvideo" class="btn btn-primary  mb-3"><i class="fa fa-tags"></i> Tambah Data</a>
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Video</th>
                            <th>Url Video</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1; 
                            $q = $this->db->query("select * from video order by id_video asc");
                            foreach($q->result() as $row){
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->judul ?></td>
                            <td><?php echo $row->link_video ?></td>
                            <td>
					            <a href="admin/editvideo/<?php echo $row->id_video ?>"  data-toggle="tooltip" data-placement="top"
                      title="Ubah Data" class="btn btn-info "><i class="fa fa-edit"></i></a>							
                                <a href="admin/hapusvideo/<?php echo $row->id_video ?>"  data-toggle="tooltip" data-placement="top"
                      title="Hapus Data" class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
            </div>
            <!-- close -->
          </div>
        </section>
</div>


