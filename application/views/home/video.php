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

               

                
				
				<div class="col-lg-12 col-md-12 col-sm-3 col-xs-16">
				
				<div class="about-page-content-holder">
                            <div class="content-box"  align="center">
				


                <?php 

                

                    foreach($datavideo->result()  as $g){

                ?>

				<iframe height="345" style="width: 80%;margin: 1px;display:block;" src="<?php echo $g->link_video ?>"></iframe>

                  <?php  } ?>

 
		</div></div>
				</div>

            

           

            </div>


<?php error_reporting(0); echo $page;?>

        </div>
		
