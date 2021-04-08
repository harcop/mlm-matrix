<?php $username = $_SESSION['username'];?>
<style>
    #sidenav-main{
        background:url("<?php echo base_url('assets/img/dil_bg.jpg')?>" );
        background-blend-mode:overlay;
        background-color:rgba(229,223,237,.9)!important;
    }
    #sidenav-main li{
        font-weight:bold;
        font-size:18px;
    }
    #trees .nav{
        display:block;
    }
    
</style>

<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="<?=base_url('dashboard')?>">
            <img src="<?php echo base_url('assets/img/brand/blue.png')?>" class="navbar-brand-img" alt="...">
        </a>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="<?=base_url('dashboard')?>">
                            <img src="<?php echo base_url('assets/img/brand/blue.png')?>"> 
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center"><span>Welcome <?=$username?></span></div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('dashboard')?>">
                        <i class="fa fa-tv"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" data-toggle="collapse" href="#profile" aria-expanded="false">
                        <i class="fa fa-user-circle"></i>Profile<b class="caret"></b>
                    </a>
                    <div class="collapse" id="profile">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('profile')?>">
                                    <i class="fa fa-user text-red"></i> Personal Detail
                                </a>
                            </li>
                            <?php
                            if($this->session->bank_detail != 'bnk'){
                                echo
                                    '
                                    <li class="nav-item">
                                        <a class="nav-link" href="'.base_url('bank').'">
                                            <i class="fa fa-coins text-black"></i> Bank Detail
                                        </a>
                                    </li>';
                                }
                                ?>
                            <?php
                                if($this->session->user_kin != 'kinner'){
                                    echo'
                                        <li class="nav-item">
                                            <a class="nav-link" href="'.base_url('kin').'">
                                                <i class="fa fa-user-shield text-black"></i> Next of Kin
                                            </a>
                                        </li>';
                                }
                                ?>
                            
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" data-toggle="collapse" href="#accom" aria-expanded="false">
                        <i class="fa fa-certificate"></i>Achievements<b class="caret"></b>
                    </a>
                    <div class="collapse" id="accom">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('achievement')?>">
                                    <i class="fa fa-certificate text-red"></i> Achievements
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('signup')?>">
                        <i class="ni ni-single-02 text-primary"></i> Register New User
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" data-toggle="collapse" href="#down" aria-expanded="false">
                        <i class="fad fa-users-crown"></i>Downline<b class="caret"></b>
                    </a>
                    <div class="collapse" id="down">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('downline/direct')?>">
                                    <i class="fa fa-users text-red"></i> Direct
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('downline/indirect')?>">
                                    <i class="fa fa-users text-black"></i> In Direct
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" data-toggle="collapse" href="#wallet" aria-expanded="false">
                        <i class="fa fa-money-check-alt"></i>Wallet<b class="caret"></b>
                    </a>
                    <div class="collapse" id="wallet" style="">
                        <ul class="nav">
                            <?php
                                if($this->session->user_pin == 'pinner'){
                                    echo'
                                        <li class="nav-item">
                                            <a class="nav-link" href="'.base_url('wallet').'">
                                                <i class="fa fa-user-shield text-black"></i> Wallet Pin
                                            </a>
                                        </li>';
                                }
                                ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('transaction')?>">
                                    <i class="fa fa-receipt text-red"></i> Transaction
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('change/pin')?>">
                                    <i class="fab fa-whmcs text-red"></i> Pin
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('change')?>">
                                    <i class="fab fa-whmcs text-red"></i> Password
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('transfer')?>">
                                    <i class="fa fa-percent text-red"></i> Transfer Fund
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('withdraw')?>">
                                    <i class="fa fa-money-bill text-red"></i> Withdraw Fund
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <style>
                    .onyx{
                        color:black;
                    }
                    .jasper{color:#742733}
                    .opal{color:#83BB45}
                    .topaz{color:#FFD500}
                    .jade{color:#009241}
                    .gernet{color:#F65700}
                    .sapphire{color:#15007E}
                </style>
                <li class="nav-item">
                    <a class="nav-link collapsed" data-toggle="collapse" href="#trees" aria-expanded="false">
                        <i class="fa fa-bezier-curve"></i>Network<b class="caret"></b>
                    </a>
                    <div class="collapse" id="trees" style="">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('tree')?>">
                                    <i class="fa fa-user text-black"></i> Gem
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('tree/stage/jasper')?>">
                                    <i class="fa fa-user jasper"></i> Jasper
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('tree/stage/opal')?>">
                                    <i class="fa fa-user opal"></i> Opal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('tree/stage/topaz')?>">
                                    <i class="fa fa-user topaz"></i> Topaz
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('tree/stage/jadeite')?>">
                                    <i class="fa fa-user jade"></i> Jadeite
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('tree/stage/gernet')?>">
                                    <i class="fa fa-user gernet"></i> Gernet
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('tree/stage/sapphire')?>">
                                    <i class="fa fa-user sapphire"></i> Sapphire
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('tree/stage/diamond')?>">
                                    <i class="fa fa-user text-black"></i> Diamond
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('logout')?>">
                        <i class="fa fa-arrow-left text-pink"></i> Logout
                    </a>
                </li>
            </ul>
            <!-- Divider -->
        </div>
    </div>
</nav>
