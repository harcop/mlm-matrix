
<!DOCTYPE html>
<html>

<?php include('include/head.php');?>

<body>
    <!-- Sidenav -->
    <?php include('include/sidebar.php');?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
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
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Change Password</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo form_open('change/password')?>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-pass">Old Password</label>
                                                <input type="password" id="input-pass" class="form-control form-control-alternative" placeholder="Old Password" name="old_pass" required>
                                                <?php echo form_error('old_pass')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-pass">New Password</label>
                                                <input type="password" id="input-pass" class="form-control form-control-alternative" placeholder="New Password" name="new_pass" required>
                                                <?php echo form_error('new_pass')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-pass">Confirm New Password</label>
                                                <input type="password" id="input-pass" class="form-control form-control-alternative" placeholder="Confirm Password" name="pass_c" required>
                                                <?php echo form_error('pass_c')?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <div class="row">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="change_pass">Change Password</button>
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
