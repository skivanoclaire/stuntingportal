
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
            <div class="card-header latar text-light">
                <?php echo $title; ?>
            </div>
            <div class="card-body table-responsive">
                <a href="admin/addberita" class="btn btn-primary  mb-3"><i class="fa fa-newspaper"></i> Tambah Data</a>
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Keyword</th>
                         
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tanggal Post</th>
                            <th>Gambar</th>
                            <th>Gambar2</th>
                            <th>Gambar3</th>
                            <th>Gambar4</th>
                            <th>Gambar5</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1; 
                            $q = $this->db->query("select berita.*,user.nama,kategori.nmkat from berita 
                            inner join user on user.id_user = berita.id_user 
                            left join kategori on kategori.idkat = berita.idkat 
                            order by berita.id_berita desc");
                            foreach($q->result() as $row){
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->judul ?></td>
                            <td><?php echo $row->nama ?></td>
                            <td><?php echo $row->keyword ?></td>
                                
                            <td><?php echo $row->nmkat ?></td>
                            <td><?php echo $row->status_berita ?></td>
                            <td><?php echo $row->tanggal_post ?></td>
                            <!-- TANABAHCODINGAN -->
                            <td><img src="gambar/<?php echo $row->gambar ?>" alt="" width="130" class="img img-thumbnail"></td>
                            <td><img src="gambar/<?php echo $row->gambar2 ?>" alt="" width="130" class="img img-thumbnail"></td>
                            <td><img src="gambar/<?php echo $row->gambar3 ?>" alt="" width="130" class="img img-thumbnail"></td>
                            <td><img src="gambar/<?php echo $row->gambar4 ?>" alt="" width="130" class="img img-thumbnail"></td>
                            <td><img src="gambar/<?php echo $row->gambar5 ?>" alt="" width="130" class="img img-thumbnail"></td>
                            <!-- BATASTAMBAH -->
                            <td>
                                <a href="admin/hapusberita/<?php echo $row->id_berita ?>"  data-toggle="tooltip" data-placement="top"
                      title="Hapus Data" class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
                                <a href="admin/editberita/<?php echo $row->id_berita ?>"  data-toggle="tooltip" data-placement="top"
                      title="Edit Data" class="btn btn-success "><i class="fa fa-edit"></i></a>
                      <!--          <a href="admin/editberita/<**?php echo $row->id_berita ?>/<**?php echo $row->judul ?>"  data-toggle="tooltip" data-placement="top"-->
                      <!--title="Edit Data" class="btn btn-success "><i class="fa fa-edit"></i></a>-->
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


