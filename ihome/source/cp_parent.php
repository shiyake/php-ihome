<?php
/*Project PHP-ihome
This script is responsible for inviting parents.
@author : shaoxinhao
*/

@include_once('cp_parent_func.php');
if(!defined('iBUAA')) {
    exit('Access Denied');
}

if($_GET['op'] == 'invite'){
    $username = empty($_POST['username'])? null :trim($_POST['username']);
    if(!preg_match('/^[A-Za-z0-9]+$/',$username)){
        showmessage("用户名格式错误，请使用字母或数字，3位以上","cp.php?ac=parent");
    }
    $_PARENT['username'] = $username;
    if(!empty($username) && !empty($_POST['realname']) && !empty($_POST['password1']) && !empty($_POST['password2'])){
        if(strlen($_POST['password1']) >=6){
            if($_POST['password1'] == $_POST['password2']){
                //add user
                $_PARENT['email'] = $username."_default@ihome.com";
                $_PARENT['realname'] = $_POST['realname'];
                $_PARENT['uid'] = addUserManually($username, $_POST['password1'], $_PARENT['email']);
                //add user-parent relation
                newParent($_PARENT['uid'],$_SGLOBAL['supe_uid'],$username,$_PARENT['realname'],$_PARENT['email']);
                //followAcademy
                //$q = $_SGLOBAL['db']->query("select uid,username from ".tname('space')." where name = '".$_SGLOBAL['supe_academy']."'");
                //$r = $_SGLOBAL['db']->fetch_array($q);
                //if($r){
                    //      $acid = $r['uid'];
                    //      $acname = $r['username'];
                    //      followManually($_PARENT['uid'],$username,$acid,$acname);
                    //}

                $_SGLOBAL['db']->query("insert into ".tname("space")." set uid=".$_PARENT['uid'].", groupid=5, username='".$_PARENT['username']."'");
                $_SGLOBAL['db']->query("insert into ".tname("spacefield")." set uid=".$_PARENT['uid']);
                $q = $_SGLOBAL['db']->query("select feedfriend from ".tname("spacefield")." where uid=".$_SGLOBAL['supe_uid']);
                $r = $_SGLOBAL['db']->fetch_array($q);
                if($r){
                    $feed = $r['feedfriend'];
                    $q1 = $_SGLOBAL['db']->query("select uid from ihome_space where uid in(".$feed.") and groupid = 3");
                    $r1 = $_SGLOBAL['db']->fetch_array($q1);
                    $feedpublic = "";
                    $i = 0;
                    while($r1){
                        if($i > 0){
                            $feedpublic = $feedpublic . ",";
                        }
                        $feedpublic = $feedpublic . $r1['uid'];
                        $i++;
                        $r1 = $_SGLOBAL['db']->fetch_array($q1);
                    }
                    if($i>0){
                        $_SGLOBAL['db']->query("update ".tname("spacefield")." set feedfriend='$feedpublic' where uid=".$_PARENT['uid']);
                    }
                }

                 //mutualFriendManually
                 mutualFriendManually($_SGLOBAL['supe_uid'],$_SGLOBAL['supe_username'],$_PARENT['uid'],$_PARENT['username']);

            }else{
                showmessage("password_inconsistency","cp.php?ac=parent");
            }
        }else{
            showmessage("设置密码至少六位","cp.php?ac=parent");
        }
    }else{
        showmessage("用户名、密码不可为空","cp.php?ac=parent");
    }
}else if($_GET['op'] == 'reset'){
    if(!empty($_POST['password1']) && !empty($_POST['password2'])){
        if($_POST['password1'] == $_POST['password2']){
            if(strlen($_POST['password1']) >=6){
                @include_once(S_ROOT.'uc_client/client.php');
                uc_user_edit($_PARENT['username'],'',$_POST['password1'],$_PARENT['email'],1);
            }else{
                showmessage("设置密码至少六位","cp.php?ac=parent");
            }
        }else{
            showmessage("password_inconsistency","cp.php?ac=parent");
        }
    }else{
        showmessage("密码不可为空！","cp.php?ac=parent");
    }
    showmessage('密码修改成功',"cp.php?ac=parent");
}else{

}
include template('cp_parent');

?>
