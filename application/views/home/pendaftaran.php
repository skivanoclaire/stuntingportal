
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">
<style>

    .csspendaftaran {margin: 40px auto;width: 500px;padding: 50px;border: 2px solid #ccc;background: lightblue;}
    
</style>

<!--<div class="container mt-5">-->
<!--<div class="row">-->
<!--<div class="col-md-5">-->
<div class="csspendaftaran">
    
    
            
        <p>Sudah punya akun? <a href="welcomeuser">Login di sini</a></p>

        <form action="home/savepengguna" method="post" enctype="multipart/form-data">
        <div class="form-group ">
          <label for="a">Nama Lengkap</label>
          <input type="text" name="nama" required id="a" class="form-control" placeholder="Nama Lengkap" aria-describedby="helpId">
        </div>
        <div class="form-group ">
          <label for="a">Username</label>
          <input type="text" name="username" required id="a" class="form-control" placeholder="Username" aria-describedby="helpId">
        </div>
        <div class="form-group ">
          <label for="a">Password (Minimal 8 digit password, Harus mengandung 1 angka dan 1 huruf kecil dan huruf besar)</label>
          <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Minimal 8 digit password, Harus mengandung 1 angka dan 1 huruf kecil dan huruf besar" required id="a" class="form-control" placeholder="Password" aria-describedby="helpId">
        </div>
        <div class="form-group ">
          <label for="a">Email</label>
          <input type="text" name="email" required id="a" class="form-control" placeholder="Email" aria-describedby="helpId">
        </div>
        <div class="form-group ">
          <label for="a">No. HP</label>
          <input type="text" name="nohp" required id="a" class="form-control" placeholder="No. HP" aria-describedby="helpId">
        </div>
       
        <div class="form-group ">
          <label for="a">Swafoto (Dengan Kartu Tanda Pengenal NIK / ID Card ASN / Lainnya)</label>
          <a>
              <img src="swafoto.png" width="185">
          </a>
          <input type="file" name="gambar" required id="a" class="form-control" autocomplete="off" aria-describedby="helpId">
            <br>
            <span class="badge badge-warning">Upload Hanya Bisa Bertype jpg jpeg png pdf. Disarankan jpeg</span>
        </div>
       <div class="g-recaptcha" data-sitekey="6LfffwsfAAAAAKg-wWMBWTuHE5nkqHwySgsxTvTP" data-callback="enableBtn"></div>
<br>
        <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i> Daftar </button>
 
            <!--<input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />-->

        </form>
       
            
        </div>
        </div>

    <!--</div>-->
</div>

</body>
</html>

<?php if($this->session->flashdata('msg') == 'gagal'){ ?>
    <script>
        Swal.fire(
            'Informasi',
            'Email dan Nomor Hp Sudah Digunakan',
            'warning'
        );
    </script>
<?php } ?>
<script src='https://www.google.com/recaptcha/api.js'></script>