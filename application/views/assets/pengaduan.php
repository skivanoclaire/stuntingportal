<div class="main-content">
    <section class="section">
        <div class="section-body">
            <!-- add content here -->
            <div class="card">
                <div class="card-header latar text-light">
                    <i class="fa fa-users mr-2"></i> <?php echo $title; ?>
                </div>
                <div class="card-body table-responsive">

                    <table class="table table-striped" id="table-Sendiri">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pelapor</th>
                                <th>Jenis Layanan</th>
                                <th>File</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Tanggal Upload User</th>
                                <th>Tanggal Aprove</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $q = $this->db->query("select pengaduan.*,pengguna.nama,kategori.nmkat from pengaduan inner join pengguna on pengguna.id_pengguna = pengaduan.id_pengguna left join kategori on kategori.idkat=pengaduan.idkat
                            order by id_pengaduan desc");
                            foreach ($q->result() as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->nama ?></td>
                                    <td><?php echo $row->nmkat ?></td>
                                    <td><a href="file/<?php echo $row->file ?>"><?php echo $row->file ?></a></td>
                                    <td><?php
                                        if ($row->status == '0') {
                                            echo "<a href='admin/setuju2/$row->id_pengaduan' class='btn btn-success btn-sm' data-popup='tooltip' data-placement='top' title='Disetujui'><i class='fa fa-check' aria-hidden='true'></i></a> &nbsp";
                                            echo "<a href='admin/proses2/$row->id_pengaduan' class='btn btn-success btn-sm' data-popup='tooltip' data-placement='top' title='Diproses'><i class='fa fa-check' aria-hidden='true'></i></a> &nbsp";
                                            echo "<a href='admin/selesai2/$row->id_pengaduan' class='btn btn-success btn-sm' data-popup='tooltip' data-placement='top' title='Selesai'><i class='fa fa-check' aria-hidden='true'></i></a> &nbsp";
                                            echo "<a href='admin/tidaksetuju2/$row->id_pengaduan' class='btn btn-danger btn-sm' data-popup='tooltip' data-placement='top' title='Ditolak'><i class='fa fa-times' aria-hidden='true'></i></i></a>";
                                        } else if ($row->status != '0') {
                                            if ($row->status == '1') {
                                                echo '<b><font color="#DAA520">Disetujui</font></b>';
                                            } else if ($row->status == '2') {
                                                echo '<b><font color="grey">Diproses</font></b> &nbsp ';
                                            } else if ($row->status == '3') {
                                                echo '<b><font color="darkgreen">Selesai</font></b> &nbsp ';
                                            } else if ($row->status == '4') {
                                                echo '<b><font color="red">Dibatalkan</font></b> &nbsp ';
                                            }
                                            echo "<a href='admin/cancel2/$row->id_pengaduan' class='btn btn-danger btn-sm' data-popup='tooltip' data-placement='top' title='Cancel'><i class='fa fa-trash' aria-hidden='true'></i></i></a>";
                                        }

                                        ?>
                                    <td><?php echo $row->keterangan ?></td>
                                    <td><?php echo $row->tanggal ?></td>
                                    <td><?php echo $row->tanggal_admin ?></td>

                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- close -->
        </div>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table-Sendiri').DataTable({
            language: {
                paginate: {
                    next: ' &#8594; ', // or '→'
                    previous: ' &#8592; ' // or '←' 

                }
            },
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>