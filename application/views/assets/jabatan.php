
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
            <div class="card-header latar text-light">
                <?php echo $title; ?>
            </div>
            <div class="card-body table-responsive">
                <a href="admin/addjabatan" class="btn btn-primary  mb-3"><i class="fa fa-tags"></i> Tambah Data</a>
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th>Nama Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1; 
                            $q = $this->db->query("select * from jabatan order by id_jabatan asc");
                            foreach($q->result() as $row){
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td></td>
                            <td><?php echo $row->namajabatan ?></td>
                            <td>
					            <a href="admin/editjabatan/<?php echo $row->id_jabatan ?>"  data-toggle="tooltip" data-placement="top"
                      title="Ubah Data" class="btn btn-info "><i class="fa fa-edit"></i></a>							
                                <a href="admin/hapusjabatan/<?php echo $row->id_jabatan ?>"  data-toggle="tooltip" data-placement="top"
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


