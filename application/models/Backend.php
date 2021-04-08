<?php

class Backend extends CI_Model{
    public $user;
    public $a = [];
    public $b = [];
    public $all_upline = ',';
    public $amount = 8;
    public $perHead = 0.8;
    public $offerUp = 'open'; //this is offer for giving upline bonus;
    
    
    function __construct($user){
        $this->user = $user;
    }
    
    
//    user confirm
    function checkUser($user){
        $usersChk = $this->db->query("SELECT * FROM `users` WHERE `username`='$user'");
        if($usersChk->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
//    check for user
    function getUser($user){
        return $users = $this->db->query("SELECT * FROM `users` WHERE `username`='$user'")->row_array();
    }
    
    function getUserCol($user,$col){
        $users = $this->db->query("SELECT `$col` FROM `users` WHERE `username`='$user'")->row_array();
        return $users[$col];
    }
    
//    check if user already exist
    function checkDouble($user){
        $users = $this->db->query("SELECT * FROM `users` WHERE `username`='$user'");
        if($users->num_rows() > 0){
            return false;
        }
        else{
            return true;
        }
    }
    
    function upgradeLevel($user){
        $upd_level = $this->db->query("UPDATE `users` SET `level` = `level`+1 WHERE `users`.`username` = '$user'");
    }
    
    
//    only tree1
    function getTree1($user){
       return $users = $this->db->query("SELECT * FROM `tree1` WHERE `username`='$user'")->row_array();
    } 
    
    
//    any tree
    function getTreeUp($user,$tree){
        return $users = $this->db->query("SELECT * FROM `$tree` WHERE `username`='$user'")->row_array();
    }
    
//    specific column of a tree
    function getTreeCol($user,$col,$tree){
        $users = $this->db->query("SELECT `$col` FROM `$tree` WHERE `username`='$user'")->row_array();
        return $users[$col];
    }
    
    function addAdminInfo(){
        $amount = $this->amount;
        $add = $this->db->query("UPDATE `admin_info` SET `t_user` = `t_user`+1, `t_money` = `t_money`+'$amount', `all_money` = `all_money`+'$amount' WHERE `admin_info`.`id` = 1");
    }
    
//    record achievements
    function rec_ach($user,$level){
        
        switch($level){
            case 1:
                $incentive = 0;
                $level_name = 'GEM';
                break;
            case 2:
                $incentive = 9.1;
                $level_name = 'JASPER';
                break;
            case 3:
                $incentive = 47.5;
                $level_name = 'OPAL';
                break;
            case 4:
                $incentive = 382;
                $level_name = 'TOPAZ';
                break;
            case 5:
                $incentive = 2700;
                $level_name = 'JADEITE';
                break;
            case 6:
                $incentive = 25320;
                $level_name = 'GERNET';
                break;
            case 7:
                $incentive = 123400;
                $level_name = 'SAPPHIRE';
                break;
            case 8:
                $incentive = 851000;
                $level_name = 'DIAMOND';
                break;
        }
        $rec_ach = $this->db->query("INSERT INTO `achievements` (`username`, `level`,`incentive`) VALUES ('$user', '$level_name','$incentive')");
        $this->RemoveBonusMoney($incentive);
    }
    
    function RemoveBonusMoney($amount){
        $rem = $this->db->query("UPDATE `admin_info` SET `t_money` = `t_money`-'$amount', `bonus` = `bonus`+'$amount', `bonus_left` = `bonus_left`+'$amount' WHERE `admin_info`.`id` = 1");
    }
    
    
//    check for next father ==> for multiple overtaking
    function checkNextFather($child_level,$father){
        
        $father_level = $this->getUserCol($father,'level');
        if($father_level > $child_level){
            return $father;
        }else{
            $new_father = $this->getTreeCol($father,'father','tree1');
            return $this->checkNextFather($child_level,$new_father);
        }
    }
    
//    check for next father ==> single overtake;
    function checkNextFatherUp($child_level,$father,$tree){
        
        $father_level = $this->getUser($father,'level');
        if($father_level > $child_level){
            return $father;
        }else{
            $new_father = $this->getTreeCol($father,'father',$tree);
            return $this->checkNextFather($child_level,$new_father,$tree);
        }
    }
    
//    money/bonus from new user
    function moneyInUp($ref,$new_downline,$amount){
        
        $ref_father = $this->getTreeCol($ref,'father','tree1');
        
        $up_ref = $this->db->query("UPDATE `users` SET `earnings` = `earnings`+'$amount', `bonus`=`bonus`+'$amount' WHERE `users`.`username` = '$ref'");
        
        $ins_ref_tra = $this->db->query("INSERT INTO `transaction` (`username_to`, `amount`, `status`, `username_from`) VALUES ('$ref', '$amount', 'approved', '$new_downline')");
        
//        remove the money given from admin total money
        $this->RemoveBonusMoney($amount);
        
        
        if($ref_father != 'f_admin'){
            
            $up_ref_father = $this->db->query("UPDATE `users` SET `earnings` = `earnings`+'$amount', `bonus`=`bonus`+'$amount' WHERE `users`.`username` = '$ref_father'");

            $ins_ref_father_tra = $this->db->query("INSERT INTO `transaction` (`username_to`, `amount`, `status`, `username_from`) VALUES ('$ref_father', '$amount', 'approved', '$new_downline')");
            
//                    remove the money given from admin total money
            $this->RemoveBonusMoney($amount);
        }
    }
    
    
//    $ref_downline is the downline with the new downline
    function moneyInDown($ref,$ref_downline,$new_downline,$amount){
        $ref_level = $this->getUserCol($ref,'level'); //get level of user
        
        $ref_downline_father = $this->getTreeCol($ref_downline,'father','tree1');
//        direct amount bonus and indirect bonus
            switch($ref_level){
                case 1:
                    $dir_amount = ($amount * (16/100));
                    $indir_amount = ($amount * (4/100));
                    break;
                case 2:
                    $dir_amount = ($amount * (5/100));
                    $indir_amount = ($amount * (5/100));
                    $father_indir_amount = ($amount * (10/100));
                    break;
                case 3:
                    $dir_amount = ($amount * (4/100));
                    $indir_amount = ($amount * (6/100));
                    $father_indir_amount = ($amount * (10/100));
                    break;
                case 4:
                    $dir_amount = ($amount * (3/100));
                    $indir_amount = ($amount * (7/100));
                    $father_indir_amount = ($amount * (10/100));
                    break;
                case 5:
                    $dir_amount = ($amount * (2/100));
                    $indir_amount = ($amount * (8/100));
                    $father_indir_amount = ($amount * (10/100));
                    break;
                case 6:
                    $dir_amount = ($amount * (1/100));
                    $indir_amount = ($amount * (9/100));
                    $father_indir_amount = ($amount * (10/100));
                    break;
                case 7:
                    $dir_amount = ($amount * (0.5/100));
                    $indir_amount = ($amount * (9.5/100));
                    $father_indir_amount = ($amount * (10/100));
                    break;
                case 8:
                    $dir_amount = ($amount * (0.1/100));
                    $indir_amount = ($amount * (9.9/100));
                    $father_indir_amount = ($amount * (10/100));
                    break;
            };
        
//            from referral|v
            $ins_ref = $this->db->query("UPDATE `users` SET `earnings` = `earnings`+'$dir_amount', `bonus`=`bonus`+'$dir_amount' WHERE `users`.`username` = '$ref'");

            $ins_ref_tra = $this->db->query("INSERT INTO `transaction` (`username_to`, `amount`, `status`, `username_from`) VALUES ('$ref', '$dir_amount', 'approved', '$new_downline')");
        
//                    remove the money given from admin total money
            $this->RemoveBonusMoney($dir_amount);

//            from indirect referral|v
            $ins_ref_downline = $this->db->query("UPDATE `users` SET `earnings` = `earnings`+'$indir_amount', `bonus`=`bonus`+'$indir_amount' WHERE `users`.`username` = '$ref_downline'");

            $ins_ref_downline_tra = $this->db->query("INSERT INTO `transaction` (`username_to`, `amount`, `status`, `username_from`) VALUES ('$ref_downline', '$indir_amount', 'approved', '$new_downline')");
        
//                remove the money given from admin total money
            $this->RemoveBonusMoney($indir_amount);
        
        
            if($ref_level != 1){
//                from father of the indirect referral|v
                $ins_ref_downline_father = $this->db->query("UPDATE `users` SET `earnings` = `earnings`+'$father_indir_amount', `bonus`=`bonus`+'$father_indir_amount' WHERE `users`.`username` = '$ref_downline_father'");

                $ins_ref_downline_father_tra = $this->db->query("INSERT INTO `transaction` (`username_to`, `amount`, `status`, `username_from`) VALUES ('$ref_downline_father', '$father_indir_amount', 'approved', '$new_downline')");

//                    remove the money given from admin total money
                $this->RemoveBonusMoney($father_indir_amount);
            }
        
    }
    
    function moneyUpgraded($old_ref, $tree, $tree_level,$new_downline){
//        the logics here is getting the father and g_father of the user with the new user upgraded
//        using prefix - old means nothing, just to indicate that they were there before
        $old_ref_father = $this->getTreeCol($old_ref,'father',$tree);
        $old_ref_g_father = $this->getTreeCol($old_ref,'g_father',$tree);
        
        switch($tree_level){
            case 1:
                $bonus = 0.8;
                break;
            case 2:
                $bonus = 1.75;
                break;
            case 3:
                $bonus = 12.5;
                break;
            case 4:
                $bonus = 75;
                break;
            case 5:
                $bonus = 350;
                break;
            case 6:
                $bonus = 1000;
                break;
            case 7:
                $bonus = 4500;
                break;
            case 8:
                $bonus = 25000;
                break;
            case 9:
                $bonus = 25000;
                break;
        };
        
        $ins_old_ref = $this->db->query("UPDATE `users` SET `earnings` = `earnings`+'$bonus', `bonus`=`bonus`+'$bonus' WHERE `users`.`username` = '$old_ref'");
        
        $ins_old_ref_tra = $this->db->query("INSERT INTO `transaction` (`username_to`, `amount`, `status`, `username_from`) VALUES ('$old_ref', '$bonus', 'approved', '$new_downline')");
        
//                remove the money given from admin total money
        $this->RemoveBonusMoney($bonus);
        
        
        if($old_ref_father != 'f_admin' && $old_ref_father != 'f_admin'){
//            add money to the new g_father
            $ins_old_ref_father = $this->db->query("UPDATE `users` SET `earnings` = `earnings`+'$bonus', `bonus`=`bonus`+'$bonus' WHERE `users`.`username` = '$old_ref_father'");

            $ins_old_ref_father_tra = $this->db->query("INSERT INTO `transaction` (`username_to`, `amount`, `status`, `username_from`) VALUES ('$old_ref_father', '$bonus', 'approved', '$new_downline')");
            
//                    remove the money given from admin total money
            $this->RemoveBonusMoney($bonus);
        }
        
        if($old_ref_g_father != 'f_admin' && $old_ref_g_father != 'f_admin' && $old_ref_g_father != 'g_admin' && $old_ref_g_father != 'g_admin' ){
//            add money to the new g_father
            $ins_old_ref_g_father_tra = $this->db->query("INSERT INTO `transaction` (`username_to`, `amount`, `status`, `username_from`) VALUES ('$old_ref_g_father', '$bonus', 'approved', '$new_downline')");

            $ins_old_ref_g_father = $this->db->query("UPDATE `users` SET `earnings` = `earnings`+'$bonus', `bonus`=`bonus`+'$bonus' WHERE `users`.`username` = '$old_ref_g_father'");
            
//                    remove the money given from admin total money
            $this->RemoveBonusMoney($bonus);
        }
    }
    
    function insNotification($new_user,$all_upline){
        $ins_note = $this->db->query("INSERT INTO `new_user_notification` (`new_username`, `all_upline`,`referral`) VALUES ('$new_user', '$all_upline','$this->user')");
    }
    
//    insert side count and notification
    function fillSide($new_user,$old_user,$tree,$new_user_c){
        
//        if($new_user != 'admin'){
            $this->all_upline .= $old_user.',';
            
            $old_row = $this->getTreeUp($old_user,$tree);
            $new_row = $this->getTreeUp($new_user,$tree);
            
            
            $right_user = $old_row['right_user'];
            $left_user = $old_row['left_user'];
//            $father = $this->getTree1($new_user)
            if($new_row['father'] != 'f_admin'){
                if($left_user == $new_user){
                $upd_left = $this->db->query("UPDATE `$tree` SET `left_count` = `left_count`+1 WHERE `username` = '$old_user'");

                   
                    $upd_total_left = $this->db->query("UPDATE `users` SET `total_left` = `total_left`+1 WHERE `username` = '$old_user'");
                    
                }
                else if($right_user == $new_user){
                    
                $upd_right = $this->db->query("UPDATE `$tree` SET `right_count` = `right_count`+1 WHERE `username` = '$old_user'");

                
                    $upd_total_right = $this->db->query("UPDATE `users` SET `total_right` = `total_right`+1 WHERE `username` = '$old_user'");
                    
                }
            $new_father = $old_row['father'];
                return $this->fillSide($old_user,$new_father,$tree,$new_user_c);
            }
            if($tree == 'tree1'){
                $this->insNotification($new_user_c, $this->all_upline);
            }
//        }
        
    }
    
    
    function tree1($new_user,$old_user){
        $row = $this->getTree1($old_user);
        $this->a[] = $row['left_user'];
        $this->a[] = $row['right_user'];
        
 //            insert new user into tree1
            $g_father_row = $this->getTree1($old_user); //get father of old user from tree1
            $g_father = $g_father_row['father'];      
        
        if($row['left_user'] == ''){
            
//            update old user left
            $upd = $this->db->query("UPDATE `tree1` SET `left_user` = '$new_user' WHERE `tree1`.`username` = '$old_user'");
            
            
//            insert new user into tree1
            $ins_new = $this->db->query("INSERT INTO `tree1` (`username`,`father`,`g_father`) VALUES ('$new_user','$old_user','$g_father')");
            
//            increment the number of user by right or left and notification
            $this->fillSide($new_user,$old_user,'tree1',$new_user);
            
//            money/bonus payment
            if($this->offerUp == 'open'){
                $this->moneyInUp($old_user, $new_user, $this->perHead); //money per head
            }else{
                $this->moneyInDown($this->user, $old_user, $new_user, $this->amount); //money per person registered
            }
            
        }
        else if($row['right_user'] == ''){
            
//            update old user right
            $upd = $this->db->query("UPDATE `tree1` SET `right_user` = '$new_user' WHERE `tree1`.`username` = '$old_user'");
            
//            insert new user into tree1
            $ins_new = $this->db->query("INSERT INTO `tree1` (`username`,`father`,`g_father`) VALUES ('$new_user','$old_user','$g_father')");
            
//            increment the number of user by right or left and notification
            $this->fillSide($new_user,$old_user,'tree1',$new_user);
            
//            money/bonus payment
            if($this->offerUp == 'open'){
                $this->moneyInUp($old_user, $new_user, $this->perHead); //money per head
            }else{
                $this->moneyInDown($this->user, $old_user, $new_user, $this->amount); //money per person registered
            }
            
//            count g_father children
            $cnt_row = $this->db->query("SELECT COUNT(*) AS `total_children` FROM `tree1` WHERE `g_father` = '$g_father'")->row_array();
            $cnt = $cnt_row['total_children'];
            
//            check if total_children = 4
            if($cnt == 4){
                
                if($g_father != 'admin' && $g_father != 'f_admin' && $g_father != 'g_admin'){
                    
//                    check for g_father father
                   $father = $this->getTreeCol($g_father,'father','tree1');
                    
//                    check for g_father level(remove joor|v)
//                    $child_level = $this->getUserCol($g_father,'level');
                    
//                    convert the $g_father to a new child for next level
                    $child_new = $this->getUser($g_father);
                    
                    $child_level = $child_new['level']; //get child level
                    $child_ref = $child_new['referral']; //get child referral
                    
//                    get the referral level
                    $child_ref_level = $this->getUserCol($child_ref, 'level');
                    
                    if($child_ref_level > $child_level){
//                        use the referral as the father for next level
                        $new_father = $child_ref;
                    }else{
//                    check for new upline in next level
                      $new_father = $this->checkNextFather($child_level,$father);
                    }
                    
                
                    
//                    upgrade user
                    $this->upgrade($g_father, $new_father,1);
                    $this->upgradeLevel($g_father);
                    
                    $this->rec_ach($g_father, 1);
                    
                }else{
//                    do nothing
                }
            }
        }else{
            $this->offerUp = 'closed';
            $old_user = $this->a[0];
            array_shift($this->a);
            $this->tree1($new_user,$old_user);
        }
    }
    
    function upgrade($new_upgraded_user,$old_upgraded_user,$tree_level){
        $new_tree_level = $tree_level + 1;
        $tree_level = $tree_level + 1;
        switch($new_tree_level){
            case 2:
                $tree = 'tree2';
                break;
            case 3:
                $tree = 'tree3';
                break;
            case 4:
                $tree = 'tree4';
                break;
            case 5:
                $tree = 'tree5';
                break;
            case 6:
                $tree = 'tree6';
                break;
            case 7:
                $tree = 'tree7';
                break;
            case 8:
                $tree = 'tree8';
                break;
        }
        
        $this->treeUp($new_upgraded_user, $old_upgraded_user, $tree, $tree_level);
    }
    
//    tree upgrade for other tree levels
    function treeUp($new_upgraded_user,$old_upgraded_user,$tree,$tree_level){
        $row = $this->getTreeUp($old_upgraded_user,$tree);
        $this->b[] = $row['left_user'];
        $this->b[] = $row['right_user'];
        
 //            insert new user into tree1
        
//          get g_father
            $g_father_row = $this->getTreeUp($old_upgraded_user,$tree); //get father of old user from treeup
            $g_father = $g_father_row['father']; 
            $ancestor = $g_father_row['g_father']; 
        
        if($row['left_user'] == ''){
            
//            update old user left
            $upd = $this->db->query("UPDATE `$tree` SET `left_user` = '$new_upgraded_user' WHERE `$tree`.`username` = '$old_upgraded_user'");
            
            
//            insert new user into treeUp
            $ins_new = $this->db->query("INSERT INTO `$tree` (`username`,`father`,`g_father`,`ancestor`) VALUES ('$new_upgraded_user','$old_upgraded_user','$g_father','$ancestor')");
            
//             increment the number of user by right or left
            $this->fillSide($new_upgraded_user,$old_upgraded_user,$tree,$new_upgraded_user);
            
//            add new level bonus to uplines
            $this->moneyUpgraded($old_upgraded_user, $tree, $tree_level, $new_upgraded_user);
            
        }
        else if($row['right_user'] == ''){
//            update old user right
            $upd = $this->db->query("UPDATE `$tree` SET `right_user` = '$new_upgraded_user' WHERE `$tree`.`username` = '$old_upgraded_user'");
            
            
//            insert new user into treeUp
            $ins_new = $this->db->query("INSERT INTO `$tree` (`username`,`father`,`g_father`,`ancestor`) VALUES ('$new_upgraded_user','$old_upgraded_user','$g_father','$ancestor')");
            
            //            count ancestor children
            $cnt_row = $this->db->query("SELECT COUNT(*) AS `total_children` FROM `$tree` WHERE `ancestor` = '$ancestor'")->row_array();
            $cnt = $cnt_row['total_children'];
            
//             increment the number of user by right or left
            $this->fillSide($new_upgraded_user,$old_upgraded_user,$tree,$new_upgraded_user);
            
//            add new level bonus to uplines
            $this->moneyUpgraded($old_upgraded_user, $tree, $tree_level, $new_upgraded_user);
            
            if($cnt == 8){
                if($ancestor != 'admin' && $ancestor != 'f_admin' && $ancestor != 'g_admin'){
//                    check for ancestor father
                   $father = $this->getTreeCol($ancestor,'father','tree1');
                    
//                    check for ancestor level(Remove|v)
//                    $child_level = $this->getUserCol($ancestor,'level');
                    
//                    check for new upline in next level
//                   $new_father = $this->checkNextFatherUp($child_level,$father,$tree);
                    
                    
//                    START HERE
                    
//                    convert the $g_father to a new child for next level
                    $child_new = $this->getUser($ancestor);
                    
                    $child_level = $child_new['level']; //get child level
                    $child_ref = $child_new['referral']; //get child referral
                    
//                    get the referral level
                    $child_ref_level = $this->getUserCol($child_ref, 'level');
                    
                    if($child_ref_level > $child_level){
//                        use the referral as the father for next level
                        $new_father = $child_ref;
                    }else{
//                    check for new upline in next level
                      $new_father = $this->checkNextFather($child_level,$father);
                    }
                        
                        
//                    END HERE
                    
                    
                    
//                    upgrade user
                    $this->upgrade($ancestor, $new_father, $tree_level);
                    $this->upgradeLevel($ancestor);
                    $this->rec_ach($g_father, $tree_level);
                }else{
//                    echo 'I cannot enter...am already here';
                }
            }
            
        }
        else{
            $old_upgraded_user = $this->b[0];
            array_shift($this->b);
            $this->treeUp($new_upgraded_user,$old_upgraded_user,$tree,$tree_level);
        }
    }
}

?>
