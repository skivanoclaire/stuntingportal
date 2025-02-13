
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
            <div class="card-header latar text-light">
            Pengumuman
            </div>
            <div class="card-body table-responsive">
            <?php if($this->session->userdata('role') == '1'){ ?>
                <a href="admin/addpengumuman" class="btn btn-primary  mb-3"><i class="fa fa-file"></i> Tambah Data</a>
                <?php } ?>
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1; 
                            $q = $this->db->get('pengumuman');
                            foreach($q->result() as $row){
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->judul ?></td>
                            <td><a href="file/<?php echo $row->file ?>"><?php echo $row->file ?></a></td>
                            <td>

                                <a href="file/<?php echo $row->file ?>"  data-toggle="tooltip" data-placement="top"
                      title="Pengumuman" class="btn btn-success "><i class="fa fa-download"></i></a>
					                                  <a href="admin/hapuspengumuman/<?php echo $row->id_pengumuman ?>"  data-toggle="tooltip" data-placement="top"

                      title="Hapus Data" class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>

                                <a href="admin/editpengumuman/<?php echo $row->id_pengumuman ?>"  data-toggle="tooltip" data-placement="top"

                      title="Edit Data" class="btn btn-success "><i class="fa fa-edit"></i></a>
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


