
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
            <div class="card-header latar text-light">
               <i class="fa fa-users mr-2"></i> <?php echo $title; ?>
            </div>
            <div class="card-body table-responsive">
			<!--
			<a href="admin/addsambutan" class="btn btn-primary  mb-3"><i class="fa fa-users"></i> Tambah Data</a>
			-->
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th>No</th>
							<th>Judul Sambutan</th>
							<th>Isi Sambutan</th>
                            <th>Foto</th>
                          <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1; 
                            $q = $this->db->query("select * from sambutan order by id_sambutan asc");
                            foreach($q->result() as $row){
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
							<td><?php echo $row->judul ?></td>
							<td><?php echo $row->deskripsi ?></td>
                            <td><img src="gambar/<?php echo $row->foto ?>" alt="" class="img rounded-circle" width="110"></td>
                            <td>
                                <a href="admin/editsambutan/<?php echo $row->id_sambutan ?>"  data-toggle="tooltip" data-placement="top"
                      title="Edit Data" class="btn btn-success"><i class="fa fa-edit"></i></a>
					  <!--
					   <a href="admin/hapussambutan/<?php echo $row->id_sambutan ?>"  data-toggle="tooltip" data-placement="top"
                     

					 title="Hapus Data" class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i> </a>
					 -->
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


