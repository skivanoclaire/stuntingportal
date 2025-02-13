<div class="inner-page-banner-area" style="background-image: url('sekolah.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1><?php echo $title; ?> </h1>
                    <ul>
                        <li><a href="home/">Home</a> -</li>
                        <li><?php echo $title; ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="news-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="row">
						                <?php 

                

                    foreach($databerita->result()  as $b){

                ?>
                       
                            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                <div class="news-box">
                                    <div class="news-img-holder">
                                        <img src="<?php echo base_url('gambar/'.$b->gambar) ?>" class="img-responsive" alt="research">

                                    </div>
                                    <h3 class="title-news-left-bold"><a href="home/detail/<?php echo $b->id_berita ?>"><?php echo $b->judul ?></a></h3>
                                    <ul class="title-bar-high news-comments">
                                        <li><a href="home/detail/<?php echo $b->id_berita ?>"><i class="fa fa-user" aria-hidden="true"></i><span>By</span> <?php echo $b->nama ?></a></li>
                                        <li><a href="home/detail/<?php echo $b->id_berita ?>"><i class="fa fa-tags" aria-hidden="true"></i><?php echo $b->nmkat ?></a></li>
										<li><a ><i class="fa fa-tags" aria-hidden="true"></i><?php echo date('d F Y',strtotime($b->tanggal_post)) ?></a></li>
                                    </ul>
                                    <p><?php echo substr($b->isi,0,150) ?>...</p>
                                </div>
                            </div> 
                         
							
						 <?php  } ?>
						 <?php error_reporting(0); echo $page;?>
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
                                        <li><a href="home/kategori_berita/<?php echo $k->idkat ?>"><?php echo $k->nmkat ?></a></li>
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
                                                    <p><?php echo substr($x->judul,0,70) ?>..</p>
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