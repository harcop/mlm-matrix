

<!DOCTYPE html>
<html>

<?php include('include/head.php')?>
<style>
    .bg-grad{
        background:rgba(012,95,245,1);
        background-image:url('<?php echo base_url('assets/img/dil_bg.jpg')?>')!important;
        background-blend-mode:overlay;
    }
    
</style>
<body class="bg-default">

  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
            <div class="container px-4">
                <a class="navbar-brand" href="<?=base_url('login')?>">
                    <img src="<?=base_url("assets/img/brand/white.png")?>" />
                </a>
                <a class="nav-link nav-link-icon text-white" href="<?=base_url("login")?>">
                    <i class="ni ni-circle-08"></i>
                    <span class="nav-link-inner--text">Login</span>
                </a>

            </div>
        </nav>
    <!-- Header -->
    <div class="header bg-gradient-primar bg-grad py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-3">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <p class="text-lead text-light">
                  <a href="<?=base_url('login')?>">
                  <img src="<?php echo base_url("assets/img/brand/white_hh.png")?>" width="60%"/>
                    </a>
                </p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <?php
                if($this->session->flashdata('msg')){
                    echo $this->session->flashdata('msg');
                }
              ?>
          <div class="card bg-secondary shadow border-0">
              
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Retrive Password with credentials</small>
              </div>
              <?=form_open('forget/send')?>
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" value="<?=set_value('username')?>" placeholder="Username" type="text" name="username" required>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4" name="login">Retrive Password</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>