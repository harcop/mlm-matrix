

<!DOCTYPE html>
<html>

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
           
            <div class="row">
                <div class="col-xl-12 order-xl-2">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">My Profile</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                                <div class="alert alert-info">
                                    <h6 class="heading-small text-muted text-white mb-4">Personal information</h6>
                                </div>
                                <div class="pl-lg-4">
                                    <div style="">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">First name</label>
                                                    <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" name="f_name" value="{f_name}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-last-name">Last name</label>
                                                    <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" name="l_name" value="{l_name}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-phone">Phone Number</label>
                                                    <input type="text" id="input-phone" class="form-control form-control-alternative" placeholder="eg +2348030123456" name="phone" value="{phone}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Email address</label>
                                                    <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="myemail@email.com" name="new_email" value="{user_email}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-dob">Dob</label>
                                                    <input type="text" id="input-dob" class="form-control form-control-alternative" placeholder="Dob" name="dob" value="{dob}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-gender">Gender</label>
                                                    <input type="text" id="input-gender" class="form-control form-control-alternative" placeholder="Gender" name="gender" value="{gender}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="alert alert-info">
                                        <h6 class="heading-small text-muted text-white mb-4">Contact information</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Address</label>
                                                <input type="text" id="input-address" class="form-control form-control-alternative" placeholder="Address" name="address" value="{address}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">City</label>
                                                <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" name="city" value="{city}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-state">State</label>
                                                <input type="text" id="input-state" class="form-control form-control-alternative" placeholder="State" name="state" value="{state}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Country</label>
                                                <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" name="country" value="{country}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-4" />
                                    <div class="alert alert-info">
                                        <h6 class="heading-small text-muted text-white mb-4">Bank Account Details</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-bank-name">Bank Name</label>
                                                <input type="text" id="input-bank-name" class="form-control form-control-alternative" placeholder="Bank Name" name="bank_name" value="{bank_name}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-acc-no">Account No</label>
                                                <input type="number" id="input-acc-no" class="form-control form-control-alternative" placeholder="Account Number" name="acc_no" value="{account_no}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-acc-name">Account Holder's Name</label>
                                                <input type="text" id="input-acc-name" class="form-control form-control-alternative" placeholder="Account Holder's Name" name="acc_name" value="{account_name}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-4" />
                                    <div class="alert alert-info">
                                        <h6 class="heading-small text-muted text-white mb-4">Next of Kin's Detail</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-nok">Name</label>
                                                <input type="text" id="input-nok" class="form-control form-control-alternative" placeholder="Next of Kin" name="kin_name" value="{next_of_kin}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-nok-r">Relationship</label>
                                                <input type="text" id="input-nok-r" class="form-control form-control-alternative" placeholder="Relationship" name="kin_rel" value="{relationship}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-nok-dob">Dob</label>
                                                <input type="text" id="input-nok-dob" class="form-control form-control-alternative" placeholder="Dob" name="kin_dob" value="{kin_dob}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-nok-phone">Phone Number</label>
                                                <input type="text" id="input-nok-phone" class="form-control form-control-alternative" placeholder="Phone Number" name="kin_phone" value="{kin_phone}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-nok-address">Address</label>
                                                <input type="text" id="input-nok-address" class="form-control form-control-alternative" placeholder="Address" name="kin_address" value="{kin_address}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-4" />
                                    <div class="row">
                                        <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-username">Username</label>
                                                    <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" name="username" value="{username}" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">

                                    </div>
                                </div>
                                <hr class="my-4" />
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="alert alert-warning">
                                                <h6 class="heading-small text-muted text-white mb-4">Sponship's Information</h6>
                                            </div>
                                            <input type="text" id="ref" class="form-control form-control-alternative" placeholder="sponsor's username" name="referral" value="{referral}" disabled>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('include/footer.php');?>
        </div>
    </div>
</body>

</html>
