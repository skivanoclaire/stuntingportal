<div class="news-page-area">
<div class="container">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
            <div class="card-header latar text-light">
           
            </div>
            <div class="card-body table-responsive">
            <?php if($this->session->userdata('role') == '1'){ ?>
                
                <?php } ?>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                          
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1; 
                            $q = $this->db->query('select * from pengumuman order by id_pengumuman desc');
                            foreach($q->result() as $row){
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->judul ?></td>
                          
                            <td>

                                <a href="file/<?php echo $row->file ?>"  data-toggle="tooltip" data-placement="top"
                      title="Download Pengumuman" class="btn btn-success "><i class="fa fa-download"></i></a>
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
</div>

