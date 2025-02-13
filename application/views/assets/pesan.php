
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
            <div class="card-header latar text-light">
                <?php echo $title; ?>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
							<th>Nomor HP</th>
                            <th>Subjek</th>
                            <th>Tanggal Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1; 
                            $q = $this->db->query("select * from komentar ");
                            foreach($q->result() as $row){
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->nama ?></td>
                            <td><?php echo $row->email ?></td>
							 <td><?php echo $row->nomorkontak ?></td>
                            <td><?php echo $row->subjek ?></td>
                            <td><?php echo $row->tanggal_post ?></td>
                            <td>
                                <a href="admin/hapuskomentar/<?php echo $row->id_komentar ?>"  data-toggle="tooltip" data-placement="top"
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


