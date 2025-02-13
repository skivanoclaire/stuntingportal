
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
            <div class="card-header latar text-light">
               <i class="fa fa-users mr-2"></i> <?php echo $title; ?>
            </div>
            <div class="card-body table-responsive">
                <a href="admin/adduser" class="btn btn-primary  mb-3"><i class="fa fa-users"></i> Tambah Data</a>
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
							<th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1; 
                            $q = $this->db->query("select * FROM user order by id_user asc");
                            foreach($q->result() as $row){
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->nama ?></td>
                            <td><?php echo $row->username ?></td>
                            <td><?php echo $row->password ?></td>
                            <td><?php echo $row->level ?></td>
                            <td>
							<a href="admin/edituser/<?php echo $row->id_user ?>"  data-toggle="tooltip" data-placement="top"
                      title="Edit Data" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="admin/hapususer/<?php echo $row->id_user ?>"  data-toggle="tooltip" data-placement="top"
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


