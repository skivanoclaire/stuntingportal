
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
            <div class="card-header latar text-light">
            File Upload
            </div>
            <div class="card-body table-responsive">
            <?php if($this->session->userdata('role') == '1'){ ?>
                <a href="admin/adddownload" class="btn btn-primary  mb-3"><i class="fa fa-file"></i> Tambah Data</a>
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
                            $q = $this->db->get('download');
                            foreach($q->result() as $row){
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->judul ?></td>
                            <td><a href="file/<?php echo $row->file ?>"><?php echo $row->file ?></a></td>
                            <td>

                                <a href="file/<?php echo $row->file ?>"  data-toggle="tooltip" data-placement="top"
                      title="Download" class="btn btn-success "><i class="fa fa-download"></i></a>
					   <a href="admin/hapusdownload/<?php echo $row->id_download ?>"  data-toggle="tooltip" data-placement="top"
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


