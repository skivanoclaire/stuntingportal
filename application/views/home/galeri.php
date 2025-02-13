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


        <div class="gallery-area2">
            <div class="container" id="inner-isotope">
           
                <div class="row featuredContainer gallery-wrapper">
				<div class="single-item">
                <?php 

                    foreach($datavideo->result()  as $g){

                ?>
				                      
                <div class="lecturers1-item-wrapper">  
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 mr-3 mb-3 ">
                        <div class="gallery-box" style="height:360px">
                            <img src="<?php echo base_url('gambar/'.$g->gambar) ?>" class="img-responsive" style="width:1280px ; height:180px" alt="gallery"> <?php echo substr($g->judul,0,180) ?>
                            <div class="gallery-content">
                                <a href="<?php echo base_url('gambar/'.$g->gambar) ?>" class="zoom"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
				</div>
           
			
                  <?php  } ?>
			</div>
			</div>
		   
            </div>
			<?php error_reporting(0); echo $page;?>
        </div>