<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>COVID - Administrator</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/node_modules/fortawesome/fontawesome-free/css/all.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/node_modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/node_modules/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/node_modules/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/node_modules/izitoast/dist/css/iziToast.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/jquery-ui/jquery-ui.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/assets/css/components.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/select23/dist/css/select2.min.css">

  <script src="<?= base_url()?>assets/dashboard/node_modules/jquery/dist/jquery.min.js" ></script>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <!-- <div class="search-element">
            
          </div> -->
        </form>
        <ul class="navbar-nav navbar-right">
          <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b>
                    <p>Hello, Bro!</p>
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Dedik Sugiharto</b>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-3.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Agung Ardiansyah</b>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Ardian Rahardiansyah</b>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                    <div class="time">16 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Alfa Zulkarnain</b>
                    <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li> -->
          <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li> -->
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url()?>assets/dashboard/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->nama_user?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
              <!-- <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a> -->
              <!-- <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a> -->
              <!-- <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('auth/logout')?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
          <img src="<?= base_url('img/')?>login2.png" alt="" width="43" class="img-fluid"> <br> 
            <a href="<?= base_url()?>">SICOVID</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url()?>">CVD</a>
          </div>
          <ul class="sidebar-menu">
              <!-- <li class="menu-header">Pasien</ li> -->
              <?php if($this->session->level == 'superuser'){ ?>
              <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hospital"></i><span>Pasien</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('pasien/getPasien')?>">Pasien Rawat Inap</a></li>
                  <li><a class="nav-link" href="<?= base_url('pasien/pasien_rajal')?>">Pasien Rawat Jalan</a></li>
                  <li><a class="nav-link" href="<?= base_url('pasien/renswab')?>">Rencana Swab</a></li>
                  
                </ul>
              </li>
              <li class="menu-header">Laporan</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-print"></i> <span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url('laporan')?>">Laporan</a></li>
                    <li><a class="nav-link" href="<?= base_url('laporan/hari')?>">Laporan Harian</a></li>
                </ul>
              </li>
              <li class="menu-header">Dashboard Covid</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-procedures"></i> <span>Ruangan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('dashboard/igd')?>">Isolasi IGD</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/td')?>">Isolasi Tenda Darurat</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/tbd')?>">Isolasi COVID-19 Lantai 1</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/lt4')?>">Isolasi COVID-19 Lantai 4</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/lt5')?>">Isolasi COVID-19 Lantai 5</a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="<?= base_url('dashboard/kosong')?>"><i class="fas fa-bed"></i> <span>Bed Kosong</span></a></li>
              <li><a class="nav-link" href="<?= base_url('dashboard/rekapbed')?>"><i class="fas fa-bed"></i> <span>Rekap Bed</span></a></li>
              <li class="menu-header">Master Data</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-procedures"></i> <span>Ruangan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('ruang/kamar')?>">Kamar</a></li>
                  <li><a class="nav-link" href="<?= base_url('ruang/bed')?>">Bed</a></li>
                  <li><a class="nav-link" href="<?= base_url('ruang/aksbed')?>">Akses Bed</a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="<?= base_url('rumahsakit/rsu')?>"><i class="far fa-hospital"></i> <span>Rumah Sakit</span></a></li>
              <li><a class="nav-link" href="<?= base_url('user')?>"><i class="far fa-user"></i> <span>User</span></a></li>
              <?php } elseif ($this->session->level == 'admin' OR $this->session->level == 'direksi') { ?>
                <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hospital"></i><span>Pasien</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('pasien/getPasien')?>">Pasien Rawat Inap</a></li>
                  <li><a class="nav-link" href="<?= base_url('pasien/pasien_rajal')?>">Pasien Rawat Jalan</a></li>
                  <li><a class="nav-link" href="<?= base_url('pasien/renswab')?>">Rencana Swab</a></li>
                  
                </ul>
              </li>
              <li class="menu-header">Laporan</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-print"></i> <span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url('laporan')?>">Laporan</a></li>
                    <li><a class="nav-link" href="<?= base_url('laporan/hari')?>">Laporan Harian</a></li>
                </ul>
              </li>
              <li class="menu-header">Dashboard Covid</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-procedures"></i> <span>Ruangan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('dashboard/igd')?>">Isolasi IGD</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/td')?>">Isolasi Tenda Darurat</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/tbd')?>">Isolasi COVID-19 Lantai 1</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/lt4')?>">Isolasi COVID-19 Lantai 4</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/lt5')?>">Isolasi COVID-19 Lantai 5</a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="<?= base_url('dashboard/kosong')?>"><i class="fas fa-bed"></i> <span>Bed Kosong</span></a></li>
              
              <?php }elseif ($this->session->level == 'kepala') { ?>
              <li class="menu-header">Laporan</li>
              <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-print"></i> <span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url('laporan')?>">Laporan</a></li>
                    <li><a class="nav-link" href="<?= base_url('laporan/hari')?>">Laporan Harian</a></li>
                </ul>
              </li>
              <li class="menu-header">Dashboard Covid</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-procedures"></i> <span>Ruangan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('dashboard/igd')?>">Isolasi IGD</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/td')?>">Isolasi Tenda Darurat</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/tbd')?>">Isolasi COVID-19 Lantai 1</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/lt4')?>">Isolasi COVID-19 Lantai 4</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/lt5')?>">Isolasi COVID-19 Lantai 5</a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="<?= base_url('dashboard/kosong')?>"><i class="fas fa-bed"></i> <span>Bed Kosong</span></a></li>
              <li><a class="nav-link" href="<?= base_url('dashboard/rekapbed')?>"><i class="fas fa-bed"></i> <span>Rekap Bed</span></a></li>
              
              <!-- <li class="menu-header">Master Data</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-procedures"></i> <span>Ruangan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('ruang/kamar')?>">Kamar</a></li>
                  <li><a class="nav-link" href="<?= base_url('ruang/bed')?>">Bed</a></li>
                </ul>
              </li> -->
              <?php }elseif ($this->session->level == 'direksi') { ?>
                <li class="menu-header">Laporan</li>
              <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-print"></i> <span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url('laporan')?>">Laporan</a></li>
                    <li><a class="nav-link" href="<?= base_url('laporan/hari')?>">Laporan Harian</a></li>
                </ul>
              </li>
              <li class="menu-header">Dashboard Covid</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-procedures"></i> <span>Ruangan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('dashboard/igd')?>">Isolasi IGD</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/td')?>">Isolasi Tenda Darurat</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/tbd')?>">Isolasi COVID-19 Lantai 1</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/lt4')?>">Isolasi COVID-19 Lantai 4</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/lt5')?>">Isolasi COVID-19 Lantai 5</a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="<?= base_url('dashboard/kosong')?>"><i class="fas fa-bed"></i> <span>Bed Kosong</span></a></li>
              <li><a class="nav-link" href="<?= base_url('dashboard/rekapbed')?>"><i class="fas fa-bed"></i> <span>Rekap Bed</span></a></li>
              <?php } ?>
              <!-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> -->

              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
                  <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
                  <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
                  <li><a class="nav-link" href="bootstrap-buttons.html">Buttons</a></li>
                  <li><a class="nav-link" href="bootstrap-card.html">Card</a></li>
                  <li><a class="nav-link" href="bootstrap-carousel.html">Carousel</a></li>
                  <li><a class="nav-link" href="bootstrap-collapse.html">Collapse</a></li>
                  <li><a class="nav-link" href="bootstrap-dropdown.html">Dropdown</a></li>
                  <li><a class="nav-link" href="bootstrap-form.html">Form</a></li>
                  <li><a class="nav-link" href="bootstrap-list-group.html">List Group</a></li>
                  <li><a class="nav-link" href="bootstrap-media-object.html">Media Object</a></li>
                  <li><a class="nav-link" href="bootstrap-modal.html">Modal</a></li>
                  <li><a class="nav-link" href="bootstrap-nav.html">Nav</a></li>
                  <li><a class="nav-link" href="bootstrap-navbar.html">Navbar</a></li>
                  <li><a class="nav-link" href="bootstrap-pagination.html">Pagination</a></li>
                  <li><a class="nav-link" href="bootstrap-popover.html">Popover</a></li>
                  <li><a class="nav-link" href="bootstrap-progress.html">Progress</a></li>
                  <li><a class="nav-link" href="bootstrap-table.html">Table</a></li>
                  <li><a class="nav-link" href="bootstrap-tooltip.html">Tooltip</a></li>
                  <li><a class="nav-link" href="bootstrap-typography.html">Typography</a></li>
                </ul>
              </li> -->
              <!-- <li class="menu-header">Stisla</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Components</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="components-article.html">Article</a></li>
                  <li><a class="nav-link beep beep-sidebar" href="components-avatar.html">Avatar</a></li>
                  <li><a class="nav-link" href="components-chat-box.html">Chat Box</a></li>
                  <li><a class="nav-link beep beep-sidebar" href="components-empty-state.html">Empty State</a></li>
                  <li><a class="nav-link" href="components-gallery.html">Gallery</a></li>
                  <li><a class="nav-link beep beep-sidebar" href="components-hero.html">Hero</a></li>
                  <li><a class="nav-link" href="components-multiple-upload.html">Multiple Upload</a></li>
                  <li><a class="nav-link beep beep-sidebar" href="components-pricing.html">Pricing</a></li>
                  <li><a class="nav-link" href="components-statistic.html">Statistic</a></li>
                  <li><a class="nav-link" href="components-tab.html">Tab</a></li>
                  <li><a class="nav-link" href="components-table.html">Table</a></li>
                  <li><a class="nav-link" href="components-user.html">User</a></li>
                  <li><a class="nav-link beep beep-sidebar" href="components-wizard.html">Wizard</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                  <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                  <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
                <ul class="dropdown-menu">
                  <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                  <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                  <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                  <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                  <li><a href="gmaps-marker.html">Marker</a></li>
                  <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                  <li><a href="gmaps-route.html">Route</a></li>
                  <li><a href="gmaps-simple.html">Simple</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
                  <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                  <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                  <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                  <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                  <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                  <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                  <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                  <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                  <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                  <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                  <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
                </ul>
              </li> -->
              <!-- <li class="menu-header">Pages</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                <ul class="dropdown-menu">
                  <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                  <li><a href="auth-login.html">Login</a></li>
                  <li><a class="beep beep-sidebar" href="auth-login-2.html">Login 2</a></li>
                  <li><a href="auth-register.html">Register</a></li>
                  <li><a href="auth-reset-password.html">Reset Password</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Errors</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="errors-503.html">503</a></li>
                  <li><a class="nav-link" href="errors-403.html">403</a></li>
                  <li><a class="nav-link" href="errors-404.html">404</a></li>
                  <li><a class="nav-link" href="errors-500.html">500</a></li>
                </ul>
              </li> -->
              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                  <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                  <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                  <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                  <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                  <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                  <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                </ul>
              </li> -->
              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
                <ul class="dropdown-menu">
                  <li><a href="utilities-contact.html">Contact</a></li>
                  <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                  <li><a href="utilities-subscribe.html">Subscribe</a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
            </ul> -->

            <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
              </a>
            </div> -->
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
          <?= $contents ?>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> Created By <a href="https://fastabiqsehat.com/">FASTMU PATI</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  
  <script src="<?= base_url()?>assets/dashboard/node_modules/popper.js/dist/popper.min.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/nicescroll/jquery.nicescroll.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/moment/min/moment.min.js"></script>
  <script src="<?= base_url()?>assets/dashboard/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <!-- <script src="<?= base_url()?>assets/dashboard/node_modules/fortawesome/fontawesome-free/js/all.js"></script> -->
  <script src="<?= base_url()?>assets/dashboard/node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/izitoast/dist/js/iziToast.min.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?= base_url()?>assets/select23/dist/js/select2.min.js"></script>
  <script src="<?= base_url()?>assets/chained/jquery.chained.js"></script>
  <script src="<?= base_url()?>assets/chained/jquery.chained.remote.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url()?>assets/dashboard/assets/js/scripts.js"></script>
  <script src="<?= base_url()?>assets/dashboard/assets/js/custom.js"></script>
  <script src="<?= base_url()?>assets/jquery-ui/jquery-ui.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url()?>assets/dashboard/assets/js/page/index-0.js"></script>
</body>
</html>

<!-- alert -->
<?php if ($this->session->has_userdata('success')) {?>   
        <script type="text/javascript">
            iziToast.success({
                title: 'Success',
                message: '<?=$_SESSION['success']?>',
                position: 'topRight'
            });
      </script>
    <?php }?>

    <?php if ($this->session->has_userdata('failed')) {?>
        <script type="text/javascript">
              iziToast.error({
                  title: 'Error',
                  message: '<?=$_SESSION['failed']?>',
                  position: 'topRight'
              });
      </script>
    <?php }?>

    <?php if ($this->session->has_userdata('avaible')) {?>   
      <script type="text/javascript">
              iziToast.info({
                  title: 'Avaible',
                  message: '<?=$_SESSION['avaible']?>',
                  position: 'topRight'
              });
      </script>
<?php }?>

<script>
  $(document).ready( function () {
    $('#table1').DataTable();
    $.fn.select2.defaults.set( "theme", "clasic" );
    $('.js-example-basic-single').select2();

  } );
</script>


