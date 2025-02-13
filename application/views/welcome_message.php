<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<base href="<?php echo base_url(); ?>">
    <title>Login Admin</title>
    <!-- Meta tag Keywords -->
    <link rel="apple-touch-icon" sizes="180x180" href="logokaltara.png">
	<link rel="icon" type="image/png" sizes="32x32" href="logokaltara.png">
	<link rel="icon" type="image/png" sizes="16x16" href="logokaltara.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Hotair Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!-- //Meta tag Keywords -->
    <link href="//fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;600;700;900&display=swap" rel="stylesheet">
    <!--/Style-CSS -->
    <link rel="stylesheet" href="login/css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->
	<link rel="stylesheet" href="sweetalert2.min.css">
	<script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="login/css/font-awesome.min.css" type="text/css" media="all">
    <script src="login/js/jquery.min.js"></script>
	
		<script src="https://www.google.com/recaptcha/api.js"></script>
	<script>
    function enableBtn(){
        document.getElementById("submit_details").disabled = false;
    }
</script>
	
	<style>
		
.w3l_form {
    padding: 0px;
    flex-basis: 40%;
    -webkit-flex-basis: 90%;
    background: url(logokaltara.png) no-repeat center;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    padding:20px 20px;
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
}
.btn:hover,
button:hover {
	background-color: #0cbaba;
	background-image: linear-gradient(315deg, #0cbaba 0%, #380036 74%);

    transition: 0.5s ease;
    -webkit-transition: 0.5s ease;
    -o-transition: 0.5s ease;
    -ms-transition: 0.5s ease;
    -moz-transition: 0.5s ease;
}
.w3l-hotair-form {
    position: relative;
    min-height: 100vh;
    z-index: 0;
	background-color: #0cbaba;
background-image: linear-gradient(315deg, #0cbaba 0%, #380036 74%);

    padding: 40px 40px;
    justify-content: center;
    display: grid;
    grid-template-rows: 1fr auto 1fr;
    align-items: center;
}
p.copy-footer-29  {
    color: #F7DD03;
}

.w3l-hotair-form button:hover {
	background-color: #0cbaba;
	background-image: linear-gradient(315deg, #0cbaba 0%, #380036 74%);

}

.w3l-hotair-form button {
    font-size: 18px;
    color: #fff;
    width: 100%;
    background: #0cbaba ;
    border: none;
    padding: 14px 15px;
    font-weight: 700;
    transition: 0.3s ease;
    -webkit-transition: 0.3s ease;
    -moz-transition: 0.3s ease;
    -ms-transition: 0.3s ease;
    -o-transition: 0.3s ease;
}
.w3l-hotair-form input {
    outline: none;
    margin-bottom: 15px;
    font-size: 16px;
    color: #999;
    text-align: left;
    padding: 14px 20px;
    width: 100%;
    display: inline-block;
    box-sizing: border-box;
    border: none;
    outline: none;
    background: #f7fafc;
    border: 1px solid #e5e5e5;
    transition: 0.3s ease;
    -webkit-transition: 0.3s ease;
    -moz-transition: 0.3s ease;
    -ms-transition: 0.3s ease;
    -o-transition: 0.3s ease;
}

.w3l-hotair-form input:focus {
    background: transparent;
    border: 1px solid  #0cbaba;
}

	</style>

</head>

<body>

    <!-- form section start -->
    <section class="w3l-hotair-form">
        <h1></h1>
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-hotair">
                    <div class="alert-close">
                        <span class="fa fa-close"></span>
                    </div>
                 
                    <div class="content-wthree">
                        <h2 class="bg">Login Admin <br> </h2>
                        <p></p>
                        <form action="welcome/cekuser" id="masuk" method="post">
                            <input type="text" class="text" name="username" autocomplete="off" placeholder="User Name" required="">
                            <input type="password" class="password" name="password" autocomplete="off" placeholder="User Password" required="">
							<div class="g-recaptcha" data-sitekey="6LfffwsfAAAAAKg-wWMBWTuHE5nkqHwySgsxTvTP" data-callback="enableBtn"></div>
                            <button style="margin-top:15px;" class="btn" type="submit" id="submit_details" disabled="disabled" >Log In</button>
                        </form>
                        <p>Social Media</p>
                        <div class="social-icons w3layouts">
                            <ul>
                                <li>
                                    <a href="#url" class="facebook"><span class="fa fa-facebook"></span> </a>
                                </li>
                                <li>
                                    <a href="#url" class="twitter"><span class="fa fa-instagram"></span> </a>
                                </li>
                                <li>
                                    <a href="#url" class="pinterest"><span class="fa fa-youtube"></span> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
        <!-- copyright-->
        <div class="copyright text-center">
            <p class="copy-footer-29">&copy; APTIKA DKISP <?php echo date('Y') ?></p>
        </div>
        <!-- //copyright-->
    </section>
    <!-- //form section start -->

    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-hotair').fadeOut('slow', function (c) {
                    $('.main-hotair').remove();
                });
            });
        });
    </script>

</body>

</html>


<?php if($this->session->flashdata('msg') == 'gagal'){ ?>
    <script>
        Swal.fire(
            'Informasi',
            'Username atau password salah!',
            'warning'
        );
    </script>
<?php } ?>

<?php if($this->session->flashdata('msg') == 'error'){ ?>
    <script>
        Swal.fire(
            'Informasi',
            'Maaf anda belum login,silahkan login terlebih dahulu!',
            'error'
        );
    </script>
<?php } ?>