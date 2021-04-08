
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
                                    <h3 class="mb-0">Change Pin</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo form_open('change/pin')?>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-pin">Old Pin</label>
                                                <input type="password" id="input-pin" class="form-control form-control-alternative" placeholder="Old Pin" name="old_pin" required>
                                                <?php echo form_error('old_pin')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-new-pin">New Pin</label>
                                                <input type="password" id="input-new-pass" class="form-control form-control-alternative" placeholder="New Pin" name="new_pin" required>
                                                <?php echo form_error('new_pin')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-pin">Confirm New Pin</label>
                                                <input type="password" id="input-pass-c" class="form-control form-control-alternative" placeholder="Confirm Pin" name="pin_c" required>
                                                <?php echo form_error('pin_c')?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <div class="row">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="change_pin">Change Pin</button>
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
