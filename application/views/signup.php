<!DOCTYPE html>
<html>
<style>
    .bg_pry{
        background:#F4F4F4;
        
    }
    .bg_pry p{
        font-size:30px;
        margin:0px;
        color:#000;
    }
    .bg-diam{
/*        background:rgba(3,119,255,.5) !important;*/
        background:rgba(3,119,255,.8)!important;
        background-image:url('<?php echo base_url('assets/img/dil_bg.jpg')?>')!important;
        background-blend-mode:overlay;
    }
/*
    .form-control-label{
        color:#fff!important;
    }
*/
    .text-head{
        font-weight : bold;
        color:rgba(3,119,255,.8)!important;
    }
    label{
        font-weight:bold;
        color:red;
    }
    </style>
<?php include('include/head.php');?>

<body>
    <!-- Sidenav -->
    <?php 
    if(isset($_SESSION['username'])){
        include('include/sidebar.php');
    }
    ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-lg-inline-block" href="#">New User</a>
                <!-- Form -->
                <?php
                if(!isset($_SESSION['username'])){
                    echo '<a class="h4 mb-0 text-white text-uppercase d-lg-inline-block" href="'.base_url('login').'">Login</a>'; 
                }
                    ?>
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
                                    <h3 class="mb-0">Register new account</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="<?php echo base_url('signup')?>" class="btn btn-sm btn-primary">Clear</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo form_open('signup/reg')?>

                            <div class="">
                                <div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="p-3 bg_pry mb-2">
                                                <p class="text-head">Personal information</p>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Username</label>
                                                <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" name="username" value="<?=set_value('username')?>" required>
                                                <?php echo form_error('username')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">First name</label>
                                                <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" name="f_name" value="<?php echo set_value('f_name')?>" required>
                                                <?php echo form_error('f_name')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">Last name</label>
                                                <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" name="l_name" value="<?=set_value('l_name')?>" required>
                                                <?php echo form_error('l_name')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Phone Number</label>
                                                <input type="text" id="input-phone" class="form-control form-control-alternative" placeholder="eg +2348030123456" name="phone" value="<?=set_value('phone')?>" required>
                                                <?php echo form_error('phone')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email address</label>
                                                <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="myemail@email.com" name="new_email" value="<?=set_value('new_email')?>" required>
                                                <?php echo form_error('new_email')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-dob">Dob</label>
                                                <input type="date" id="input-dob" class="form-control form-control-alternative" placeholder="Dob" name="dob" value="<?=set_value('dob')?>" required>
                                                <?php echo form_error('dob')?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-gender">Gender</label>
                                                <select id="input-gender" class="form-control form-control-alternative" name="gender">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-password">Password</label>
                                            <input type="password" id="input-password" class="form-control form-control-alternative" placeholder="Password" name="password" value="<?=set_value('password')?>" required>
                                            <?php echo form_error('password')?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-password_a">Password Again</label>
                                            <input type="password" id="input-password_a" class="form-control form-control-alternative" placeholder="Password Again" name="password_a" value="<?=set_value('password_a')?>" required>
                                            <?php echo form_error('password_a')?>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="alert bg_pry">
                                            <p class="text-head">Contact information</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Address</label>
                                            <input type="text" id="input-address" class="form-control form-control-alternative" placeholder="Address" name="address" value="<?=set_value('address')?>" required>
                                            <?php echo form_error('address')?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-city">City</label>
                                            <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" name="city" value="<?=set_value('city')?>" required>
                                            <?php echo form_error('city')?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-state">State</label>
                                            <input type="text" id="input-state" class="form-control form-control-alternative" placeholder="State" name="state" value="<?=set_value('state')?>" required>
                                            <?php echo form_error('state')?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Country</label>
                                            <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" name="country" value="<?=set_value('country')?>" required>
                                            <?php echo form_error('country')?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <hr class="my-4" />
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert bg_pry">
                                            <p class="text-head">Referral Information</p>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username-p">Referral Username</label>
                                        <input type="text" id="ref" class="form-control form-control-alternative" placeholder="Referral's username" name="referral" value="<?=set_value('referral')?>" required>
                                        <?php echo form_error('referral')?>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4" />
                            <div class="alert bg_pry">
                                <p class="text-head">Payment</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username-p">Sponsor's Username</label>
                                        <input type="text" id="input-username-p" class="form-control form-control-alternative" placeholder="Sponsor's Username" name="payeer_username" value="<?=set_value('payeer_username')?>" required>
                                        <?php echo form_error('payeer_username')?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-pin-p">Sponsor's Pin</label>
                                        <input type="password" id="input-pin-p" class="form-control form-control-alternative" placeholder="Sponsor's Pin" name="payeer_pin" value="<?=set_value('payeer_pin')?>" required>
                                        <?php echo form_error('payeer_pin')?>
                                    </div>
                                </div>
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
