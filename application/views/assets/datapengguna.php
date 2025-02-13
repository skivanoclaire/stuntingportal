
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
            <div class="card-header latar text-light">
               <i class="fa fa-users mr-2"></i> <?php echo $title; ?>
            </div>
            <div class="card-body table-responsive">
                <a href="admin/addpengguna" class="btn btn-primary  mb-3"><i class="fa fa-users"></i> Tambah Data</a>
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
							<th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Gambar</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1; 
                            $q = $this->db->query("select * FROM pengguna order by id_pengguna asc");
                            foreach($q->result() as $row){
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->nama ?></td>
                            <td><?php echo $row->username ?></td>
                            <td><?php echo $row->password ?></td>
                            <td><?php echo $row->email ?></td>
                            <td><?php echo $row->nohp ?></td>
                            <td>
                                <a href='gambar/<?php echo $row->gambar ?>'>
                                <img src="gambar/<?php echo $row->gambar ?>" alt="" class="img rounded-circle" width="110">
                                </a>
                            </td>
                            
                            <td><?php echo $row->level ?></td>
                            <td><?php
                            if ($row->status == '0') {
                                 echo"<a href='admin/setuju3/$row->id_pengguna' class='btn btn-success btn-sm' data-popup='tooltip' data-placement='top' title='Disetujui'><i class='fa fa-check' aria-hidden='true'></i></a> &nbsp";
                                 echo "<a href='admin/tidaksetuju3/$row->id_pengguna' class='btn btn-danger btn-sm' data-popup='tooltip' data-placement='top' title='Ditolak Data'><i class='fa fa-times' aria-hidden='true'></i></i></a>";
                             }
                             else if ($row->status != '0'){
                                 if ($row->status == '1') {echo '<b><font color="#00FF00">Disetujui</font></b>';}
                                 else if ($row->status == '2') {echo '<b><font color="#ff0000">Ditolak</font></b> &nbsp ';}
                                 echo "<a href='admin/cancel3/$row->id_pengguna' class='btn btn-danger btn-sm' data-popup='tooltip' data-placement='top' title='Cancel'><i class='fa fa-trash' aria-hidden='true'></i></i></a>";
                                
                             }
                            
                             ?>
                            <td>
							<a href="admin/editpengguna/<?php echo $row->id_pengguna ?>"  data-toggle="tooltip" data-placement="top"
                      title="Edit Data" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="admin/hapuspengguna/<?php echo $row->id_pengguna ?>"  data-toggle="tooltip" data-placement="top"
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


