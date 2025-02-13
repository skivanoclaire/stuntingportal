<!DOCTYPE html>
<html lang="en">
<head>
<base href="<?php echo base_url(); ?>">
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Halaman Admin</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel="apple-touch-icon" sizes="180x180" href="logokaltara.png">
  <link rel="icon" type="image/png" sizes="32x32" href="logokaltara.png">
  <link rel="icon" type="image/png" sizes="16x16" href="logokaltara.png">
  <link rel="stylesheet" href="sweetalert2.min.css">

  <!-- General JS Scripts -->
  <script src="sweetalert2.all.min.js"></script>
  <script src="login/js/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
  <script src="assets/bundles/izitoast/js/iziToast.min.js"></script>

  <style>
    .latar {
      background-color: #0cbaba;
      background-image: linear-gradient(315deg, #0cbaba 0%, #380036 74%);
    }
  </style>
</head>
<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar latar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"><i data-feather="align-justify" class="text-light"></i></a></li>
            <li><a class="nav-link nav-link-lg fullscreen-btn"><i data-feather="maximize" class="text-light"></i></a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <?php if($this->session->userdata('role') == '1'){ ?>
          <?php $unreadCount = $this->db->query("SELECT * FROM komentar WHERE is_read = 0")->num_rows(); ?>
          <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle">
              <i data-feather="mail" class="text-light"></i>
              <span class="badge headerBadge1"><?php echo $unreadCount; ?></span>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">Pesan Masuk</div>
              <div class="dropdown-list-content dropdown-list-message">
                <?php 
                $unreadMessages = $this->db->query("SELECT * FROM komentar WHERE is_read = 0")->result();
                foreach($unreadMessages as $row){
                ?>
                  <a class="dropdown-item">
                    <span class="dropdown-item-avatar text-white">
                      <img alt="image" src="bg.svg" class="rounded-circle">
                    </span>
                    <span class="dropdown-item-desc">
                      <span class="message-user"><?php echo $row->nama ?> : <?php echo $row->email ?></span>
                      <span class="time messege-text"><?php echo $row->subjek ?></span>
                      <span class="time"><?php echo date('d F Y', strtotime($row->tanggal_post)) ?></span>
                    </span>
                  </a>
                <?php } ?>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#" id="viewAllLink">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <?php } ?>
          <li class="dropdown">
            <a href="home/index" target="_blank" class="nav-link nav-link-lg"><i data-feather="aperture" class="bell text-light"></i></a>
          </li>
          <?php if($this->session->userdata('id')){ ?>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="pria.png" class="user-img-radious-style">
              <span class="d-sm-none d-lg-inline-block"><?php echo $this->session->userdata('nama') ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?php echo $this->session->userdata('nama') ?></div>
              <div class="dropdown-divider"></div>
              <a href="welcome/logout" onclick="return confirm('Yakin Logout ?')" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
          <?php } ?>
          <?php if($this->session->userdata('idx')) { ?>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?php echo base_url('gambar/').$this->session->userdata('foto') ?>" class="user-img-radious-style">
              <span class="d-sm-none d-lg-inline-block"><?php echo $this->session->userdata('nama') ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?php echo $this->session->userdata('nama') ?></div>
              <div class="dropdown-divider"></div>
            </div>
          </li>
          <?php } ?>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href=""><img src="logokaltara.png" width="60" alt=""><span class="logo-name">ADMIN</span></a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Submenu</li>
            <?php if($this->session->userdata('role') == '1'){ ?>
            <li class="dropdown <?php if($this->uri->segment(2) == 'index') echo 'active'; ?>">
              <a href="admin/index" class="nav-link"><i data-feather="monitor"></i><span>Home</span></a>
            </li>
            <li class="dropdown <?php if($this->uri->segment(2) == 'sigizi') echo 'active'; ?>">
              <a href="admin/sigizi" class="nav-link"><i data-feather="book"></i><span>Data SiGizi</span></a>
            </li>
            <li class="dropdown <?php if($this->uri->segment(2) == 'kemendagri') echo 'active'; ?>">
              <a href="admin/kemendagri" class="nav-link"><i data-feather="book"></i><span>Data Stunting Kemendagri</span></a>
            </li>
            <li class="dropdown <?php if($this->uri->segment(2) == 'slider') echo 'active'; ?>">
              <a href="admin/slider" class="nav-link"><i data-feather="image"></i><span>Foto Slider</span></a>
            </li>
            <li class="dropdown <?php if($this->uri->segment(2) == 'sambutan') echo 'active'; ?>">
              <a href="admin/sambutan" class="nav-link"><i data-feather="book"></i><span>Sambutan</span></a>
            </li>
            <li class="dropdown <?php if($this->uri->segment(2) == 'kategori') echo 'active'; ?>">
              <a href="admin/kategori" class="nav-link"><i data-feather="tag"></i><span>Kategori</span></a>
            </li>
            <li class="dropdown <?php if($this->uri->segment(2) == 'berita') echo 'active'; ?>">
              <a href="admin/berita" class="nav-link"><i data-feather="book"></i><span>Berita</span></a>
            </li>
            <li class="dropdown <?php if($this->uri->segment(2) == 'pengumuman') echo 'active'; ?>">
              <a href="admin/pengumuman" class="nav-link"><i data-feather="file"></i><span>Publikasi</span></a>
            </li>
            <li class="dropdown <?php if($this->uri->segment(2) == 'api_dashboard') echo 'active'; ?>">
              <a href="admin/apidashboard" class="nav-link"><i data-feather="book"></i><span>API Dashboard</span></a>
            </li>
            <li class="dropdown <?php if($this->uri->segment(2) == 'galeri') echo 'active'; ?>">
              <a href="admin/galeri" class="nav-link"><i data-feather="image"></i><span>Galeri</span></a>
            </li>
            <li class="dropdown <?php if($this->uri->segment(2) == 'video') echo 'active'; ?>">
              <a href="admin/video" class="nav-link"><i data-feather="video"></i><span>Video</span></a>
            </li>
            <li class="dropdown <?php if($this->uri->segment(2) == 'datauser') echo 'active'; ?>">
              <a href="admin/datauser" class="nav-link"><i data-feather="users"></i><span>Data User</span></a>
            </li>
            <li class="dropdown <?php if($this->uri->segment(2) == 'datapengguna') echo 'active'; ?>">
              <a href="admin/datapengguna" class="nav-link"><i data-feather="users"></i><span>Data Pengguna</span></a>
            </li>
            <li class="dropdown <?php if($this->uri->segment(2) == 'pesan') echo 'active'; ?>">
              <a href="#" id="pesanMasukLink"><i data-feather="message-circle"></i><span>Pesan Masuk</span></a>
            </li>
            <li class="dropdown">
              <a href="welcome/logout" onclick="return confirm('Yakin Logout ?')" class="nav-link"><i data-feather="log-out"></i><span>Logout</span></a>
            </li>
            <?php } ?>
          </ul>
        </aside>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('viewAllLink').addEventListener('click', function(event) {
      event.preventDefault(); // Prevent the default link behavior
      // Make an AJAX request to reset the notification count
      fetch('<?php echo base_url('admin/resetNotificationCount'); ?>', {
        method: 'GET',
        headers: { 'Content-Type': 'application/json' }
      })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          // Reset the notification count on the frontend
          document.querySelector('.headerBadge1').textContent = '0';
          // Redirect to the "View All" page
          window.location.href = '<?php echo base_url('admin/pesan'); ?>';
        }
      })
      .catch(error => console.error('Error:', error));
    });

    document.getElementById('pesanMasukLink').addEventListener('click', function(event) {
      event.preventDefault(); // Prevent the default link behavior
      // Make an AJAX request to mark all messages as read
      fetch('<?php echo base_url('admin/markAllAsReadAndRedirect'); ?>', {
        method: 'GET',
        headers: { 'Content-Type': 'application/json' }
      })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          // Redirect to the "Pesan Masuk" page
          window.location.href = '<?php echo base_url('admin/pesan'); ?>';
        }
      })
      .catch(error => console.error('Error:', error));
    });
  </script>
</body>
</html>
