<!DOCTYPE html>
<html>

<?php include('include/head.php');?>
<style>
    .gemColor {
        color: #505D82;
    }

    .fadeColor {
        color: grey;
    }

    .table td {

        padding: 0px !important;
        padding-top: 20px !important;
    }

    .card {

        margin: 10px
    }
    
    td a{
        position: relative;
    }
    .user_det{
        position: absolute;
        top: -10px;
        right: 0;
        display: none;
        background:#fff;
        border-radius:5px;
        box-shadow: 0px 1px 5px 0px red;
        padding:5px;
        z-index:99;
    }

</style>

<body>
    <!-- Sidenav -->
    <?php 
    include('include/sidebar.php');
    ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <?php include('include/navbar.php');?>
        <!-- Header -->
        <?php 
            include('include/tree_header.php');
      ?>
        <!-- Page content -->
        <div class="container-fluid mt-5">
            <!-- Table -->
            <div class="row">
                <div class="table-responsive col-12 card">
                    <table class="table" align="center" style="text-align:center">
                        <?php $data = $conn->tree_data($m_username,$tree)?>
                        <tr height="10">
                            <td>
                                <?php echo ($data['left_count']>0)?$data['left_count']:0;?>
                            </td>
                            <td colspan="2">
                                <i class="fa-4x <?php echo ($data['user'] != NULL)?'fa fa-user gemColor':'fad fa-diamond fadeColor'?>"></i>
                                <p>
                                    <?php echo $data['user']?>
                                </p>
                                <div>|</div>
                            </td>
                            <td>
                                <?php echo ($data['right_count']>0)?$data['right_count']:0;?>
                            </td>
                        </tr>

                        <tr height="10">
                            <?php
                                if($data['user'] != ''){
                                    $t1 = $data['left_user'];
                                    $t2 = $data['right_user'];
                                    
                                    $t1_ref_ask = $data['left_user_this_ref'];
                                    $t2_ref_ask = $data['right_user_this_ref'];
                                    
                                    $t1_ref = $data['left_user_ref'];
                                    $t2_ref = $data['right_user_ref'];
                                }else{
                                    $t1 = '';
                                    $t2 = '';
                                    $t1_ref_ask = $t2_ref_ask = false;
                                    $t1_ref = $t2_ref = '';
                                }
                            ?>
                            <td colspan="2">
                                
                                <a href="<?php echo ($t1 != NULL)?base_url("tree/gem/$t1"):'' ?>">
                                    
                                    <div class="user_det">
                                        Referral: <?php echo ($t1_ref != '')? $t1_ref : 'Empty' ?>
                                    </div>
                                    
                                    <div>|</div>
                                    <i class="fa-4x <?php echo ($t1 != NULL)?'fa fa-user gemColor':'fad fa-diamond fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t1 !='')?$t1:'' ?>
                                        <?php echo $t1_ref_ask ? '*' : ''  ?>
                                    </p>
                                    <div>|</div>
                                </a>
                            </td>

                            <td colspan="2">
                                
                                <a href="<?php echo ($t2 != NULL)?base_url("tree/gem/$t2"):'' ?>">
                                    
                                    <div class="user_det">
                                        Referral: <?php echo ($t2_ref != '')? $t2_ref : 'Empty' ?>
                                    </div>
                                    
                                    <div>|</div>
                                    <i class="fa-4x <?php echo ($t2 != NULL)?'fa fa-user gemColor':'fad fa-diamond fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t2 !='')?$t2:'' ?>
                                        <?php echo $t2_ref_ask ? '*' : ''  ?>
                                    </p>
                                    <div>|</div>
                                </a></td>
                        </tr>
                        <tr height="10">
                            <?php
                                if($t1 != ''){
                                    $data_t1 = $conn->tree_data($t1,$tree);
                                    $t3 = $data_t1['left_user'];
                                    $t4 = $data_t1['right_user'];
                                    
                                    $t3_ref_ask = $data_t1['left_user_this_ref'];
                                    $t4_ref_ask = $data_t1['right_user_this_ref'];
                                    
                                    $t3_ref = $data_t1['left_user_ref'];
                                    $t4_ref = $data_t1['right_user_ref'];
                                }else{
                                    $t3 = $t4 = '';
                                    $t3_ref_ask = $t4_ref_ask = false;
                                    $t3_ref = $t4_ref = '';
                                }
                                if($t2 != ''){
                                    $data_t2 = $conn->tree_data($t2,$tree);
                                    $t5 = $data_t2['left_user'];
                                    $t6 = $data_t2['right_user'];
                                    
                                    $t5_ref_ask = $data_t2['left_user_this_ref'];
                                    $t6_ref_ask = $data_t2['right_user_this_ref'];
                                    
                                    $t5_ref = $data_t2['left_user_ref'];
                                    $t6_ref = $data_t2['right_user_ref'];
                                }else{
                                    $t5 = $t6 = '';
                                    $t5_ref_ask = $t6_ref_ask = false;
                                    $t5_ref = $t6_ref = '';
                                }
                            ?>
                            <td><a href="<?php echo ($t3 != NULL)?base_url("tree/gem/$t3"):'' ?>">
                                
                                    <div class="user_det">
                                        Referral: <?php echo ($t3_ref != '')? $t3_ref : 'Empty' ?>
                                    </div>
                                
                                    <div>|</div>
                                    <i class="fa-4x <?php echo ($t3 != NULL)?'fa fa-user gemColor':'fad fa-diamond fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t3 !='')?$t3:'' ?>
                                        <?php echo $t3_ref_ask ? '*' : ''  ?>
                                    </p>
                                </a></td>

                            <td><a href="<?php echo ($t4 != NULL)?base_url("tree/gem/$t4"):'' ?>">
                                
                                    <div class="user_det">
                                        Referral: <?php echo ($t4_ref != '')? $t4_ref : 'Empty' ?>
                                    </div>
                                
                                    <div>|</div>
                                    <i class="fa-4x <?php echo ($t4 != NULL)?'fa fa-user gemColor':'fad fa-diamond fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t4 !='')?$t4:'' ?>
                                        <?php echo $t4_ref_ask ? '*' : ''  ?>
                                    </p>
                                </a></td>

                            <td><a href="<?php echo ($t5 != NULL)?base_url("tree/gem/$t5"):'' ?>">
                                
                                    <div class="user_det">
                                        Referral: <?php echo ($t5_ref != '')? $t5_ref : 'Empty' ?>
                                    </div>    
                                
                                    <div>|</div>
                                    <i class="fa-4x <?php echo ($t5 != NULL)?'fa fa-user gemColor':'fad fa-diamond fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t5 !='')?$t5:'' ?>
                                        <?php echo $t5_ref_ask ? '*' : ''  ?>
                                    </p>
                                </a></td>

                            <td>
                                
                                <a href="<?php echo ($t6 != NULL)?base_url("tree/gem/$t6"):'' ?>">
                                    
                                    <div class="user_det">
                                        Referral: <?php echo ($t6_ref != '')? $t6_ref : 'Empty' ?>
                                    </div>
                                    
                                    <div>|</div>
                                    <i class="fa-4x <?php echo ($t6 != NULL)?'fa fa-user gemColor':'fad fa-diamond fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t6 !='')?$t6:'' ?>
                                        <?php echo $t6_ref_ask ? '*' : ''  ?>
                                    </p>
                                </a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php include('include/footer.php');?>
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script>
        $('td > a > i').hover(function(){
                $(this).parent('a').children('.user_det').css('display','block');
        })
    </script>

</body>

</html>
