<!DOCTYPE html>
<html>

<?php include('include/head.php');?>
<style>
    p{
        font-size:10px;
        color:#000;
        font-weight:bold;
    }
    .fadeColor{
        color:gray;
    }
    .table td{
            padding:0px !important;
        }
    .card{
        margin:10px;
    }
    </style>
    <?php
        switch($level_name){
            case 'jasper':
                $gemColor = '#742733';
                $gemShape = 'dice-d4';
                break;
            case 'opal':
                $gemColor = '#83BB45';
                $gemShape = 'dice-d6';
                break;
            case 'topaz':
                $gemColor = '#FFD500';
                $gemShape = 'dice-d8';
                break;
            case 'jadeite':
                $gemColor = '#009241';
                $gemShape = 'dice-d10';
                break;
            case 'gernet':
                $gemColor = '#F65700';
                $gemShape = 'dice-d12';
                break;
            case 'sapphire':
                $gemColor = '#15007E';
                $gemShape = 'dice-d20';
                break;
            case 'diamond':
                $gemColor = 'black';
                $gemShape = 'gem';
                break;
            case 'Diamond':
                $gemColor = '#83BB45';
                break;
            default:
                $level = 1;
                break;
            
        }
    ?>
    <style>
        .gemColor{
            color: <?php echo $gemColor?>
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
        <div class="container-fluid mt-2">
            <!-- Table -->
            <div class="row">
                <div class="table-responsive col-12 card">
                    <table class="table" align="center" style="text-align:center">
                        <?php $data = $conn->tree_data($m_username,$tree)?>
                        <tr height="10">
                            <td>
                                <?php echo ($data['left_count']>0)?$data['left_count']:0;?>
                            </td>
                            <td colspan="6">
                                <i class="fa-2x <?php echo ($data['user'] != NULL)?'fa fa-user gemColor':'fa fa-user fadeColor'?>"></i>
                                <p>
                                    <?php echo ($data['user'] != '')?$data['user']:'' ?>
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
                            <td colspan="4">
                                <a href="<?php echo ($t1 != NULL)?base_url("tree/stage/$level_name/$t1"):''?>"> 
                                    
                                    <div class="user_det">
                                        Referral: <?php echo ($t1_ref != '')? $t1_ref : 'Empty' ?>
                                    </div>
                                    
                                    <div>|</div>
                                    <i class="fa-2x <?php echo ($t1 != NULL)?'fa fa-user gemColor':'fa fa-user fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t1 !='')?$t1:'' ?>
                                        <?php echo $t1_ref_ask ? '*' : ''  ?>
                                    </p>
                                    <div>|</div>
                                </a>
                            </td>

                            <td colspan="4"><a href="<?php echo ($t2 != NULL)?base_url("tree/stage/$level_name/$t2"):''?>">
                                <div class="user_det">
                                        Referral: <?php echo ($t2_ref != '')? $t2_ref : 'Empty' ?>
                                    </div>
                                
                                <div>|</div>
                                <i class="fa-2x <?php echo ($t2 != NULL)?'fa fa-user gemColor':'fa fa-user fadeColor'?>"></i>
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
                            <td colspan="2"><a href="<?php echo ($t3 != NULL)?base_url("tree/stage/$level_name/$t3"):''?>">
                                
                                <div class="user_det">
                                        Referral: <?php echo ($t3_ref != '')? $t3_ref : 'Empty' ?>
                                    </div>
                                
                                <div>|</div>
                                <i class="fa-2x <?php echo ($t3 != NULL)?'fa fa-user gemColor':'fa fa-user fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t3 !='')?$t3:'' ?>
                                        <?php echo $t3_ref_ask ? '*' : ''  ?>
                                    </p>
                                <div>|</div>
                                </a></td>

                            <td colspan="2"><a href="<?php echo ($t4 != NULL)?base_url("tree/stage/$level_name/$t4"):''?>">
                                
                                
                                <div class="user_det">
                                        Referral: <?php echo ($t4_ref != '')? $t4_ref : 'Empty' ?>
                                    </div>
                                
                                <div>|</div>
                                <i class="fa-2x <?php echo ($t4 != NULL)?'fa fa-user gemColor':'fa fa-user fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t4 !='')?$t4:'' ?>
                                        <?php echo $t4_ref_ask ? '*' : ''  ?>
                                    </p>
                                <div>|</div>
                                </a></td>

                            <td colspan="2"><a href="<?php echo ($t5 != NULL)?base_url("tree/stage/$level_name/$t5"):''?>">
                                
                                
                                <div class="user_det">
                                        Referral: <?php echo ($t5_ref != '')? $t5_ref : 'Empty' ?>
                                    </div>
                                
                                <div>|</div>
                                <i class="fa-2x <?php echo ($t5 != NULL)?'fa fa-user gemColor':'fa fa-user fadeColor'?>"></i>
                                
                                    <p>
                                        <?php echo ($t5 !='')?$t5:'' ?>
                                        <?php echo $t5_ref_ask ? '*' : ''  ?>
                                    </p>
                                <div>|</div>
                                </a></td>

                            <td colspan="2"><a href="<?php echo ($t6 != NULL)?base_url("tree/stage/$level_name/$t6"):''?>">
                                <div class="user_det">
                                        Referral: <?php echo ($t6_ref != '')? $t6_ref : 'Empty' ?>
                                    </div>
                                
                                <div>|</div>
                                <i class="fa-2x <?php echo ($t6 != NULL)?'fa fa-user gemColor':'fa fa-user fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t6 !='')?$t6:'' ?>
                                        <?php echo $t6_ref_ask ? '*' : ''  ?>
                                    </p>
                                <div>|</div>
                                </a></td>
                        </tr>
                        <tr height="10">
                            <?php
                                if($t3 != ''){
                                    $data_t3 = $conn->tree_data($t3,$tree);
                                    $t7 = $data_t3['left_user'];
                                    $t8 = $data_t3['right_user'];
                                    
                                    $t7_ref_ask = $data_t3['left_user_this_ref'];
                                    $t8_ref_ask = $data_t3['right_user_this_ref'];
                                    
                                    $t7_ref = $data_t3['left_user_ref'];
                                    $t8_ref = $data_t3['right_user_ref'];
                                }else{
                                    $t7 = $t8 = '';
                                    $t7_ref_ask = $t8_ref_ask = false;
                                    $t7_ref = $t8_ref = '';
                                }
                                   
                                if($t4 != ''){
                                    $data_t4 = $conn->tree_data($t4,$tree);
                                    $t9 = $data_t4['left_user'];
                                    $t10 = $data_t4['right_user'];
                                    
                                    $t9_ref_ask = $data_t4['left_user_this_ref'];
                                    $t10_ref_ask = $data_t4['right_user_this_ref'];
                                    
                                    $t9_ref = $data_t4['left_user_ref'];
                                    $t10_ref = $data_t4['right_user_ref'];
                                    
                                }else{
                                    $t9 = $t10 = '';
                                    $t9_ref_ask = $t10_ref_ask = false;
                                    $t9_ref = $t10_ref = '';
                                }
                                  
                                if($t5 != ''){
                                    $data_t5 = $conn->tree_data($t5,$tree);
                                    $t11 = $data_t5['left_user'];
                                    $t12 = $data_t5['right_user'];
                                    
                                    $t11_ref_ask = $data_t5['left_user_this_ref'];
                                    $t12_ref_ask = $data_t5['right_user_this_ref'];
                                    
                                    $t11_ref = $data_t5['left_user_ref'];
                                    $t12_ref = $data_t5['right_user_ref'];
                                }else{
                                    $t11 = $t12 = '';
                                    $t11_ref_ask = $t12_ref_ask = false;
                                    $t11_ref = $t12_ref = '';
                                }
                                
                                if($t6 != ''){
                                    $data_t6 = $conn->tree_data($t6,$tree);
                                    $t13 = $data_t6['left_user'];
                                    $t14 = $data_t6['right_user'];
                                    
                                    $t13_ref_ask = $data_t6['left_user_this_ref'];
                                    $t14_ref_ask = $data_t6['right_user_this_ref'];
                                    
                                    $t13_ref = $data_t6['left_user_ref'];
                                    $t14_ref = $data_t6['right_user_ref'];
                                }else{
                                     $t13 = $t14 = '';
                                    $t13_ref_ask = $t14_ref_ask = false;
                                    $t13_ref = $t14_ref = '';
                                }
                            ?>
                            <td><a href="<?php echo ($t7 != NULL)?base_url("tree/stage/$level_name/$t7"):''?>">
                                
                                <div class="user_det">
                                        Referral: <?php echo ($t7_ref != '')? $t7_ref : 'Empty' ?>
                                    </div>
                                
                                <div>|</div>
                                <i class="fa-2x <?php echo ($t7 != NULL)?'fa fa-user gemColor':'fa fa-user fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t7 !='')?$t7:'' ?>
                                        <?php echo $t7_ref_ask ? '*' : ''  ?>
                                    </p>
                                </a>
                            </td>

                            <td><a href="<?php echo ($t8 != NULL)?base_url("tree/stage/$level_name/$t8"):''?>">
                                
                                <div class="user_det">
                                        Referral: <?php echo ($t8_ref != '')? $t8_ref : 'Empty' ?>
                                    </div>
                                
                                <div>|</div>
                                <i class="fa-2x <?php echo ($t8 != NULL)?'fa fa-user gemColor':'fa fa-user fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t8 !='')?$t8:'' ?>
                                        <?php echo $t8_ref_ask ? '*' : ''  ?>
                                    </p>
                                </a>
                            </td>

                            <td><a href="<?php echo ($t9 != NULL)?base_url("tree/stage/$level_name/$t9"):''?>">
                                
                                <div class="user_det">
                                        Referral: <?php echo ($t9_ref != '')? $t9_ref : 'Empty' ?>
                                    </div>
                                
                                <div>|</div>
                                <i class="fa-2x <?php echo ($t9 != NULL)?'fa fa-user gemColor':'fa fa-user fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t9 !='')?$t9:'' ?>
                                       <?php echo $t9_ref_ask ? '*' : ''  ?>
                                    </p>
                                </a>
                            </td>

                            <td><a href="<?php echo ($t10 != NULL)?base_url("tree/stage/$level_name/$t10"):''?>">
                                
                                <div class="user_det">
                                        Referral: <?php echo ($t10_ref != '')? $t10_ref : 'Empty' ?>
                                    </div>
                                
                                <div>|</div>
                                <i class="fa-2x <?php echo ($t10 != NULL)?'fa fa-user gemColor':'fa fa-user fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t10 !='')?$t10:'' ?>
                                       <?php echo $t10_ref_ask ? '*' : ''  ?>
                                    </p>
                                </a>
                            </td>
                            <td><a href="<?php echo ($t11 != NULL)?base_url("tree/stage/$level_name/$t11"):''?>">
                                
                                <div class="user_det">
                                        Referral: <?php echo ($t11_ref != '')? $t11_ref : 'Empty' ?>
                                    </div>
                                
                                <div>|</div>
                                <i class="fa-2x <?php echo ($t11 != NULL)?'fa fa-user gemColor':'fa fa-user fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t11 !='')?$t11:'' ?>
                                        <?php echo $t11_ref_ask ? '*' : ''  ?>
                                    </p>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo ($t12 != NULL)?base_url("tree/stage/$level_name/$t12"):''?>">
                                    
                                    <div class="user_det">
                                        Referral: <?php echo ($t12_ref != '')? $t12_ref : 'Empty' ?>
                                    </div>
                                    
                                <div>|</div>
                                <i class="fa-2x <?php echo ($t12 != NULL)?'fa fa-user gemColor':'fa fa-user fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t12 !='')?$t12:'' ?>
                                        <?php echo $t12_ref_ask ? '*' : ''  ?>
                                    </p>
                                </a>
                            </td>
                            <td><a href="<?php echo ($t13 != NULL)?base_url("tree/stage/$level_name/$t13"):''?>">
                                
                                <div class="user_det">
                                        Referral: <?php echo ($t13_ref != '')? $t13_ref : 'Empty' ?>
                                    </div>
                                
                                <div>|</div>
                                <i class="fa-2x <?php echo ($t13 != NULL)?'fa fa-user gemColor':'fa fa-user fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t13 !='')?$t13:'' ?>
                                        <?php echo $t13_ref_ask ? '*' : ''  ?>
                                    </p>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo ($t14 != NULL)?base_url("tree/stage/$level_name/$t14"):''?>">
                                    
                                    <div class="user_det">
                                        Referral: <?php echo ($t14_ref != '')? $t14_ref : 'Empty' ?>
                                    </div>
                                    
                                <div>|</div>
                                <i class="fa-2x <?php echo ($t14 != NULL)?'fa fa-user gemColor':'fa fa-user fadeColor'?>"></i>
                                    <p>
                                        <?php echo ($t14 !='')?$t14:'' ?>
                                        <?php echo $t14_ref_ask ? '*' : ''  ?>
                                    </p>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php include('include/footer.php');?>
        </div>
    </div>
    
<script>
        $('td > a > i').hover(function(){
            $(this).parent('a').children('.user_det').css('display','block');
        })
    </script>

</body>

</html>
