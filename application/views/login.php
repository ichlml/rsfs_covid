<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>LOGIN SICOVID</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/node_modules/@fontawesome/fontawesome-free/css/all.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/node_modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/node_modules/izitoast/dist/css/iziToast.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dashboard/assets/css/components.css">
</head>

<body style="background: url(<?=base_url('img/symphony.png')?>)">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?= base_url()?>img/login2.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header justify-content-center"><h4>SICOVID FASTMU</h4></div>

              <div class="card-body">
                <form method="POST" action="<?= base_url('auth/auth')?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Username</label>
                    <input id="email" type="text" class="form-control" name="email" tabindex="1" required autofocus autocomplete="off">
                    <div class="invalid-feedback">
                      Masukan username dengan benar!
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Masukan password dengan benar!
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>

              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; FASTMU PATI 2020
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url()?>assets/dashboard/node_modules/jquery/dist/jquery.min.js" ></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/popper.js/dist/popper.min.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/nicescroll/jquery.nicescroll.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/moment/min/moment.min.js"></script>
  <script src="<?= base_url()?>assets/dashboard/assets/js/stisla.js"></script>
  <script src="<?= base_url()?>assets/dashboard/node_modules/izitoast/dist/js/iziToast.min.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?= base_url()?>assets/dashboard/assets/js/scripts.js"></script>
  <script src="<?= base_url()?>assets/dashboard/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
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
