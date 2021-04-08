

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
                                <div class="col-12">
                                    <h3 class="mb-0">Transfer Fund <?php echo '<div class="alert alert-success"><h1 class="text-white">$'.$mon->earnings.'</h1> maximum transfer</div>'?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo form_open('transfer/transfer')?>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-pin">Amount</label>
                                                <input type="text" id="input-pin" class="form-control form-control-alternative" placeholder="e.g 20" name="amount" required>
                                                <?php echo form_error('amount')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-pin">Recipient Username</label>
                                                <input type="text" id="input-pin" class="form-control form-control-alternative" placeholder="Recipient Username" name="recipient" required>
                                                <?php echo form_error('recipient')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-pin">Wallet Pin</label>
                                                <input type="password" id="input-pin" class="form-control form-control-alternative" placeholder="Wallet Pin" name="pin" required>
                                                <?php echo form_error('pin')?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <div class="row">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="transfer_fund">Transfer fund</button>
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
