<?php $struktural = $this->db->query("select * from struktural")->num_rows(); ?>
        <?php $berita = $this->db->query("select * from berita")->num_rows(); ?>
        <?php $pengumuman = $this->db->query("select * from pengumuman")->num_rows(); ?>
        <?php $galeri = $this->db->query("select * from galeri")->num_rows(); ?>

<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
          
    
</div>
  <div class="row">
    <div class="card col-lg-5 mr-3 ">
  <div class="card-header latar text-light">
 
  </div>
  <div class="card-body table-responsive">
    
  </div>
</div>

    <!--BATAS PERMOHONAN TERAKHIR-->
    
    <!--LAPORAN GANGGUAN
    
    <div class="card col-lg-6  ">
  <div class="card-header latar text-light">
    Laporan Gangguan Terakhir
  </div>
  <div class="card-body table-responsive">
  <table class="table table-bordered table-hover" style="width:100%;">    
    <thead class="table-warning">
        <tr>
                            <th>No</th>
                            <th>Pelapor</th>
                            <th>Jenis Layanan</th>
                            <th>File</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
        $q = $this->db->query("select pengaduan.*,pengguna.nama,kategori.nmkat from pengaduan inner join pengguna on pengguna.id_pengguna = pengaduan.id_pengguna left join kategori on kategori.idkat=pengaduan.idkat
                            order by id_pengaduan desc limit 5");
        foreach($q->result() as $row){
        ?>
          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->nama ?></td>
                            <td><?php echo $row->nmkat ?></td>
                            <td><a href="file/<?php echo $row->file ?>"><?php echo $row->file ?></a></td>
                            <td><?php
                            if ($row->status == '0') {
                                echo"<a href='admin/setuju2/$row->id_pengaduan' class='btn btn-success btn-sm' data-popup='tooltip' data-placement='top' title='Disetujui'><i class='fa fa-check' aria-hidden='true'></i></a>";
                                echo "<a href='admin/tidaksetuju2/$row->id_pengaduan' class='btn btn-danger btn-sm' data-popup='tooltip' data-placement='top' title='Ditolak Data'><i class='fa fa-times' aria-hidden='true'></i></i></a>";
                            }
                            else if ($row->status != '0'){
                                if ($row->status == '1') {echo '<b><font color="#00FF00">Disetujui</font></b>';}
                                else if ($row->status == '2') {echo '<b><font color="#ff0000">Ditolak</font></b>';}
                                echo "<a href='admin/cancel2/$row->id_pengaduan' class='btn btn-danger btn-sm' data-popup='tooltip' data-placement='top' title='Cancel'><i class='fa fa-trash' aria-hidden='true'></i></i></a>";
                                
                            }
                            
                            ?>
                            
                            </td>
                            <td><?php echo $row->keterangan ?></td>
                            
          </tr>
        <?php $no++; } ?>
      </tbody>
    </table>
  </div>
</div>

	-->
    <!--LAPORAN GANGGUAN
    
  <div class="row">
    <div class="card col-lg-5 mr-3 ">
  <div class="card-header latar text-light">
 Berita Baru Diposting
  </div>
  <div class="card-body table-responsive">
    <table class="table table-bordered table-hover">
      <thead class='table-warning'>
        <tr>
          <th>No</th>
          <th></th>
          <th>Judul</th>
          <th>Penulis</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
        $q = $this->db->query("select berita.* ,user.nama from berita inner join user on user.id_user = berita.id_user order by id_berita desc limit 5");
        foreach($q->result() as $row){
        ?>
          <tr>
            <td><?php echo $no ?></td>
            <td></td>
            <td><?php echo $row->judul ?></td>
            <td><?php echo $row->nama ?></td>
          </tr>
        <?php $no++; } ?>
      </tbody>
    </table>
  </div>
</div>
    <div class="card col-lg-6  ">
  <div class="card-header latar text-light">
    Galleri Baru Diposting
  </div>
  <div class="card-body table-responsive">
  <table class="table table-bordered table-hover" style="width:100%;">    
    <thead class="table-warning">
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Status</th>
          <th>Tanggal Post</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
        $q = $this->db->query("select * from galeri order by id_galeri desc limit 5");
        foreach($q->result() as $row){
        ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $row->judul ?></td>
            <td><?php echo $row->status ?></td>
            <td><?php echo date('d F Y',strtotime($row->tanggal)) ?></td>
          </tr>
        <?php $no++; } ?>
      </tbody>
    </table>
  </div>
</div>
</div>

  </div>
  
  -->
<!-- closeing -->
          </div>
        </section>
</div>



