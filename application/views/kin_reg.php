

<!DOCTYPE html>
<html>
<style>
    .bg_pry{
        background:rgba(2,95,46,.5);
    }
    .bg-diam{
        background:rgba(2,95,46,.5)!important;
        background-image:url('<?php echo base_url('assets/img/dil_bg.jpg')?>')!important;
        background-blend-mode:overlay;
    }
    .form-control-label{
        color:#fff!important;
    }
    </style>
<?php include('include/head.php');?>

<body>
    <!-- Sidenav -->
    <?php 
        include('include/sidebar.php');
    ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index-2.html">New User</a>
                <!-- Form -->

                <!-- User -->
            </div>
        </nav>
        <!-- Header -->
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 200px; background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->

        </div>
        <!-- Page content -->
        <div class="container-fluid mt--9">
            <?php
                if($this->session->flashdata('msg')){
                    echo $this->session->flashdata('msg');
                }
              ?>
            <div class="row">
                <div class="col-xl-12 order-xl-2">
                    <div class="card bg-secondar bg-diam shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Next of Kin</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="<?php echo base_url('kin')?>" class="btn btn-sm btn-primary">Clear</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo form_open('kin/reg')?>
                                <div class="alert bg_pry">
                                    <h6 class="heading-small text-muted text-white mb-4">Next of Kin Information</h6>
                                </div>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-nok">Name</label>
                                                <input type="text" id="input-nok" class="form-control form-control-alternative" placeholder="Next of Kin" name="kin_name" value="<?=set_value('kin_name')?>" required>
                                                <?php echo form_error('kin_name')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-nok-r">Relationship</label>
                                                <input type="text" id="input-nok-r" class="form-control form-control-alternative" placeholder="Relationship" name="kin_rel" value="<?=set_value('kin_rel')?>" required>
                                                <?php echo form_error('kin_rel')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-nok-dob">Dob</label>
                                                <input type="date" id="input-nok-dob" class="form-control form-control-alternative" placeholder="Dob" name="kin_dob" value="<?=set_value('kin_dob')?>" required>
                                                <?php echo form_error('kin_dob')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-nok-phone">Phone Number</label>
                                                <input type="text" id="input-nok-phone" class="form-control form-control-alternative" placeholder="Phone Number" name="kin_phone" value="<?=set_value('kin_phone')?>" required>
                                                <?php echo form_error('kin_phone')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-nok-address">Address</label>
                                                <input type="text" id="input-nok-address" class="form-control form-control-alternative" placeholder="Address" name="kin_address" value="<?=set_value('kin_address')?>" required>
                                                <?php echo form_error('kin_address')?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="reg_new_user">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('include/footer.php');?>
        </div>
    </div>
</body>

</html>
