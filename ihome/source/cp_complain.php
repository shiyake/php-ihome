<?php

if (!defined('iBUAA')) {
    exit('Access Denied');
}

$doid = empty($_GET['doid'])?0:intval($_GET['doid']);
$opid = empty($_GET['opid'])?0:intval($_GET['opid']);
if ($_GET['op'] == 'delete') {
    if (submitcheck('deletesubmit')) {
        include_once(S_ROOT.'./source/function_delete.php');
        deletedoings(array($doid));
        showmessage('do_success', $_POST['refer'], 0);
    }
} elseif ($_GET['op'] == 'down') {
    if (submitcheck('down')) {
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain_op")." where id = $opid");
        $op = $_SGLOBAL['db']->fetch_array($query);
        if (empty($op)) {
            showmessage('error_op');
        }
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain")." where doid = $doid");
        $complain = $_SGLOBAL['db']->fetch_array($query);
        if (empty($complain)) {
            showmessage('error_op');
        }
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain_op_updown")." where opid = $op[id] and uid = $_SGLOBAL[supe_uid] and updown = 2");
        $down = $_SGLOBAL['db']->fetch_array($query);
        if (!empty($down)) {
            showmessage('updown_again', $_POST['refer'], 1);
        }
        $downarr = array();
        $downarr['opid'] = $opid;
        $downarr['uid'] = $_SGLOBAL['supe_uid'];
        $downarr['updown'] = 2;
        $downarr['username'] = $_SGLOBAL['supe_username'];
        $downarr['dateline'] = $_SGLOBAL['timestamp'];
        inserttable("complain_op_updown", $downarr);
        $_SGLOBAL['db']->query("update ".tname('complain_op')." set downnum=downnum+1 where id=$opid");
        if ($complain['uid'] == $_SGLOBAL['supe_uid'] && $complain['lastopid'] == $opid && $complain['status'] == 1) {
            updatetable('complain', array('status' => 0), array('id'=>$complain['id']));
            $oparr = array();
            $oparr['doid'] = $doid;
            $oparr['message'] = '';
            $oparr['uid'] = $_SGLOBAL['supe_uid'];
            $oparr['username'] = $_SGLOBAL['supe_username'];
            $oparr['optype'] = 5;
            $oparr['dateline'] = $_SGLOBAL['timestamp'];
            inserttable("complain_op", $oparr);
        }
        showmessage('do_success', $_POST['refer'], 0);
    }
} elseif ($_GET['op'] == 'up') {
    if (submitcheck('up')) {
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain_op")." where id = $opid");
        $op = $_SGLOBAL['db']->fetch_array($query);
        if (empty($op)) {
            showmessage('error_op');
        }
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain_op_updown")." where opid = $op[id] and uid = $_SGLOBAL[supe_uid] and updown = 1");
        $up = $_SGLOBAL['db']->fetch_array($query);
        if (!empty($up)) {
            showmessage('updown_again', $_POST['refer'], 1);
        }
        $downarr = array();
        $downarr['opid'] = $opid;
        $downarr['uid'] = $_SGLOBAL['supe_uid'];
        $downarr['updown'] = 1;
        $downarr['username'] = $_SGLOBAL['supe_username'];
        $downarr['dateline'] = $_SGLOBAL['timestamp'];
        inserttable("complain_op_updown", $downarr);
        $_SGLOBAL['db']->query("update ".tname('complain_op')." set upnum=upnum+1 where id=$opid");
        showmessage('do_success', $_POST['refer'], 0);
    }
} elseif ($_GET['op'] == 'continue') {
    if (submitcheck('continuesubmit')) {
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain")." where doid = $doid");
        $complain = $_SGLOBAL['db']->fetch_array($query);
        if (empty($complain)) {
            showmessage('error_op');
        }
        preg_match("/\[em\:(\d+)\:\]/s", $_POST['message'], $ms);
        $message = rawurldecode(getstr($_POST['message'], 1000, 1, 1, 1, 2));
        preg_match_all("/[@](.*)[(]([\d]+)[)]\s*/U",$message, $matches, PREG_SET_ORDER);
        foreach($matches as $value){
            $TmpString = $value[0]; 
            $TmpName = $value[1]; 
            $UserId = $value[2];
            $result = $_SGLOBAL['db']->query("select uid,username,name from ".tname('space')." where uid=$UserId");
            if($rs = $_SGLOBAL['db']->fetch_array($result)){
                $realname = $rs['name'];
                if(empty($realname)){
                    $realname = $rs['username'];
                }
                $ValidValue = getAtName($TmpString, $TmpName, $realname);
                $ValidValue = trim($ValidValue);
                $at_friend= "space.php?uid=".$UserId;
                if($ValidValue != false){
                    $message = str_replace($ValidValue, "<a href=$at_friend>@".$realname."</a> ", $message);
                    $UserIds[] = $UserId;
                }
            }
        }	
        //Ìæ»»±íÇé
        $message = preg_replace("/\[em:(\d+):]/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $message);
        $message = preg_replace("/\<br.*?\>/is", ' ', $message);
        $optype = empty($_POST['optype'])?2:intval($_POST['optype']);
        $doid = intval($_POST['doid']);
        $oparr = array();
        $oparr['doid'] = $doid;
        $oparr['message'] = $message;
        $oparr['uid'] = $_SGLOBAL['supe_uid'];
        $oparr['username'] = $_SGLOBAL['supe_username'];
        $oparr['optype'] = 4;
        $oparr['dateline'] = $_SGLOBAL['timestamp'];
        if ($complain['status'] == 1) {
            if ($optype == 4) {
                updatetable('complain', array('status'=>0), array('doid'=>$doid));
            } else {
                showmessage('error_op');
            }
            inserttable('complain_op', $oparr);
            showmessage('do_success', $_POST['refer'], 0);
        }
    }
    showmessage('error_op');
} elseif ($_GET['op'] == 'add') {
    if (submitcheck('addsubmit')) {
        $query = $_SGLOBAL['db']->query("select * from ".tname("complain")." where doid = $doid");
        $complain = $_SGLOBAL['db']->fetch_array($query);
        if (empty($complain)) {
            showmessage('error_op');
        }
        preg_match("/\[em\:(\d+)\:\]/s", $_POST['message'], $ms);
        $message = rawurldecode(getstr($_POST['message'], 1000, 1, 1, 1, 2));
        preg_match_all("/[@](.*)[(]([\d]+)[)]\s*/U",$message, $matches, PREG_SET_ORDER);
        foreach($matches as $value){
            $TmpString = $value[0]; 
            $TmpName = $value[1]; 
            $UserId = $value[2];
            $result = $_SGLOBAL['db']->query("select uid,username,name from ".tname('space')." where uid=$UserId");
            if($rs = $_SGLOBAL['db']->fetch_array($result)){
                $realname = $rs['name'];
                if(empty($realname)){
                    $realname = $rs['username'];
                }
                $ValidValue = getAtName($TmpString, $TmpName, $realname);
                $ValidValue = trim($ValidValue);
                $at_friend= "space.php?uid=".$UserId;
                if($ValidValue != false){
                    $message = str_replace($ValidValue, "<a href=$at_friend>@".$realname."</a> ", $message);
                    $UserIds[] = $UserId;
                }
            }
        }	
        //Ìæ»»±íÇé
        $message = preg_replace("/\[em:(\d+):]/is", "<img src=\"image/face/\\1.gif\" class=\"face\">", $message);
        $message = preg_replace("/\<br.*?\>/is", ' ', $message);
        $optype = empty($_POST['optype'])?2:intval($_POST['optype']);
        $doid = intval($_POST['doid']);
        $oparr = array();
        $oparr['doid'] = $doid;
        $oparr['message'] = $message;
        $oparr['uid'] = $_SGLOBAL['supe_uid'];
        $oparr['username'] = $_SGLOBAL['supe_username'];
        $oparr['optype'] = $optype;
        $oparr['dateline'] = $_SGLOBAL['timestamp'];
        if ($complain['status'] == 0) {
            if ($optype != 3 && $optype != 2) {
                showmessage('error_op');
            }
            $opid = inserttable('complain_op', $oparr, true);
            if ($optype == 3) {
                if ($complain["curuid"] != $_SGLOBAL['supe_uid']) {
                    showmessage('error_op');
                }
                updatetable('complain', array('curuid'=>$_POST['relay_depid'], 'lastopid'=>$opid), array('doid'=>$doid));
            } elseif ($optype == 2 && $_SGLOBAL['supe_uid'] == $complain['curuid']) {
                updatetable('complain', array('status'=>1, 'lastopid'=>$opid), array('doid'=>$doid));
                if ($complain['lastopid'] == 0) {
                    $result = $_SGLOBAL['db']->query("select * from ".tname('complain_dep')." where uid = $_SGLOBAL[supe_uid]");
                    $dep = $_SGLOBAL['db']->fetch_array($result);
                    if (empty($dep)) {
                        $arr = array();
                        $arr['uid'] = $_SGLOBAL['supe_uid'];
                        $arr['username'] = $_SGLOBAL['supe_username'];
                        $arr['upnum'] = 0;
                        $arr['downnum'] = 0;
                        $arr['allreplynum'] = 1;
                        $arr['allreplysecs'] = $_SGLOBAL['timestamp'] - $complain['addtime'];
                        $arr['score'] = 0;
                        $arr['aversecs'] = 0;
                        $arr['lastupdate'] = 0;
                        inserttable('complain_dep', $arr);
                    } else {
                        $arr['allreplynum'] = $dep['allreplynum'] + 1;
                        $arr['allreplysecs'] = $dep['allreplysecs'] + $_SGLOBAL['timestamp'] - $complain['addtime'];
                        updatetable("complain_dep", $arr, array('uid'=>$_SGLOBAL['supe_uid']));
                    }
                }
            }
            showmessage('do_success', $_POST['refer'], 0);
        }
    }
    showmessage('error_op');
}
include template("cp_complain");
?>
