
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
            <div class="card-header latar text-light">
                <?php echo $title; ?>
            </div>
            <div class="card-body table-responsive">
                <a href="admin/addkemendagri" class="btn btn-primary  mb-3"><i class="fa fa-tags"></i> Tambah Data</a>
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th>#</th>
                           
                            <th>Lokasi</th>
							<th>Total Balita</th>
							<th>Stunting Pendek</th>
							<th>Stunting Sangat Pendek</th>
							<th>Prevalensi</th>
							<th>Tanggal Input</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1; 
                            $q = $this->db->query("select * from stunting_data order by id asc");
                            foreach($q->result() as $row){
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                          
                            <td><?php echo $row->region_name ?></td>
							<td><?php echo $row->total_balita ?></td>
							<td><?php echo $row->stunting_pendek ?></td>
							<td><?php echo $row->stunting_sangat_pendek ?></td>
							<td><?php echo $row->prevalensi ?></td>
							<td><?php echo $row->created_at ?></td>
                            <td>
					            <a href="admin/editkemendagri/<?php echo $row->id ?>"  data-toggle="tooltip" data-placement="top"
                      title="Ubah Data" class="btn btn-info "><i class="fa fa-edit"></i></a>							
                                <a href="admin/hapuskemendagri/<?php echo $row->id ?>"  data-toggle="tooltip" data-placement="top"
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


