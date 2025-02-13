<?php 
$berita = $this->db->query("select berita.*,user.nama,kategori.nmkat from berita inner join user on user.id_user = berita.id_user left join kategori on kategori.idkat=berita.idkat where id_berita='$id' order by id_berita desc");
$row = $berita->row();
$id = $row->id_berita;
?>

        <div class="news-details-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="row news-details-page-inner">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:justify">
                                <div class="news-img-holder">
                                    <!-- <img src="gambar/" width="1000" class="img-responsive img-thumbnail" alt="research"> -->
                                    <!-- TAMBAHKODINGAN -->
                                    <!-- Slider -->
                                    <div class="slider1-area overlay-default">
                                        <div class="bend niceties preview-1">
                                            <div id="ensign-nivoslider-3" class="slides">
             <?php
                $images = ['gambar', 'gambar2', 'gambar3', 'gambar4', 'gambar5'];
                foreach ($images as $image) {
                    if (!empty($row->$image)) {
                        echo '<img src="gambar/' . $row->$image . '" alt="slider" title="#slider-direction-1" />';
                    }
                }
            ?>
                                            </div>
                                            <div id="slider-direction-1" class="t-cn slider-direction">
                                                <div class="slider-content s-tb slide-1">
                                                    <div class="title-container s-tb-c">
                                                        <div class="title1"></div>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
         
                                        </div>
                                    </div>
                                    <!-- Batas Slider -->
                                    <!-- BATASKODINGAN -->
                                <!--     <ul class="news-date1">
                                        <li style="font-size:18px;top:5px;background-color:navy;"><*?php echo date('d F Y',strtotime($row->tanggal_post)) ?></li>
                                        <li style="background-color:navy;"></li>
                                    </ul>-->
                                    
                                </div>
                                <h2 class="title-default-left-bold-lowhight"><a ><?php echo $row->judul ?></a></h2>
                                <ul class="title-bar-high news-comments">
                                    <li><a ><i class="fa fa-user" aria-hidden="true"></i><span>By</span> <?php echo $row->nama ?></a></li>
                                    <li><a ><i class="fa fa-tags" aria-hidden="true"></i><?php echo $row->nmkat ?></a></li>
									<li><a ><i class="fa fa-tags" aria-hidden="true"></i><?php echo date('d F Y',strtotime($row->tanggal_post)) ?></a></li>
                                </ul>
                                
                                <p><?php $temp=html_entity_decode($row->isi); echo $temp;?></p>
                                <ul class="news-social">
                                    <li><a href="http://www.facebook.com/sharer.php?u=<?php echo current_url() ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="http://twitter.com/intent/tweet?url=<?php echo current_url() ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="sidebar">
                           
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Kategori</h3>
                                    <ul class="sidebar-categories">
                                    <?php 
                                    $kategori = $this->db->query("select * from kategori");
                                    foreach($kategori->result() as $k){ ?>
                                        <li><a href="<?php echo base_url('home/kategori_berita/'.$k->idkat) ?>"><?php echo $k->nmkat ?></a></li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Berita Terakhir</h3>
                                    <div class="sidebar-latest-research-area">
                                        <ul>
                                        <?php 
                                            $xo = $this->db->query("select * from berita order by id_berita desc limit 4");
                                            foreach($xo->result() as $x){
                                        ?>
                                            <li>
                                                <div class="latest-research-img">
                                                    <a href="<?php echo base_url('home/detail/'.$x->id_berita) ?>"><img src="<?php echo base_url('gambar/'.$x->gambar) ?>" class="img-responsive" alt="skilled"></a>
                                                </div>
                                                <div class="latest-research-content">
                                                    <h4><?php echo date('d F Y',strtotime($x->tanggal_post)) ?></h4>
                                                   <a href="<?php echo base_url('home/detail/'.$x->id_berita) ?>"> <p><?php echo substr($x->judul,0,70) ?>..</p>
                                                </div>
                                            </li>
                                          <?php }  ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>